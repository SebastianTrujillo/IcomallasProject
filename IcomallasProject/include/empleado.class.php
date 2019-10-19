<?php

require_once 'sql.class.php';
require_once 'cadenas.class.php';
	
class Empleado
{
	private $empleado_lista = NULL;
	private $empleado_count = 0;
				
	public function insertarEmpleado($nombres, $documento, $tipoCargo, $fechaDeNacimiento, $telefono, $celular, $correoElectronico, $direccion, $ciudad)
	{
		
		$documento = Cadenas::vaccinateStr($documento);
		
		//comprobamos la cedula ya esta registrada
		$this->comprobarCedula($documento);
		
		if($this->empleado_count == -1) return -1;
		
		if($this->empleado_count > 0 ) return 2;
		
		$nombres = Cadenas::vaccinateStr($nombres, true);
		$correoElectronico = Cadenas::vaccinateStr($correoElectronico);	
		$fechaDeNacimiento = Cadenas::vaccinateStr($fechaDeNacimiento);	
		$direccion = Cadenas::vaccinateStr($direccion, true);
		
		$telefono = Cadenas::vaccinateStr($telefono);
		$celular = Cadenas::vaccinateStr($celular);
		$fax = Cadenas::vaccinateStr($fax);
		
		$tipoCargo = intval($tipoCargo);
		$ciudad = intval($ciudad);
		
		($celular == "") ? $celular = "NULL" : $cel = "'$celular'";	
		($correoElectronico == "") ? $correoElectronico = "NULL" : $correoElectronico = "'$correoElectronico'";	
				
		$sql = "insert into tb_empleado(id_tipoCargo,id_ciudad,nombreCompleto,numeroDocumento,fechaDeNacimiento,telefono,celular,
									   correoElectronico,direccion,estado)
		        values($tipoCargo,$ciudad,'$nombres','$documento','$fechaDeNacimiento','$telefono',$celular,$correoElectronico,'$direccion',1)";
			   
	    $exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
	
	public function comprobarCedula($cedula)
	{
		$sql = "SELECT count(1) FROM tb_empleado WHERE numeroDocumento='$cedula'";
		if(!SQL::execQuery($sql)) $this->empleado_count = -1;
		else $this->empleado_count = SQL::singleColumn();
	}
	
	public function modificarEmpleado($id,$nombres, $documento, $tipoCargo, $fechaDeNacimiento, $telefono, $celular,
									 $correoElectronico, $direccion, $ciudad,$cambioCedula)
	{
		if($cambioCedula)
		{
			$documento =  Cadenas::vaccinateStr($documento);
			//comprobamos la cedula ya esta registrada
			$this->comprobarCedula($documento);
			if($this->empleado_count == -1) return -1;
			if($this->empleado_count > 0 ) return 2; // 2 indicara que la cedula ya existe
			$cambiar = ",numeroDocumento='$documento'";
	    }
		
		$id = intval($id);
		$nombres = Cadenas::vaccinateStr($nombres, true);
		$correoElectronico = Cadenas::vaccinateStr($correoElectronico);	
		$fechaDeNacimiento = Cadenas::vaccinateStr($fechaDeNacimiento);		
		$direccion = Cadenas::vaccinateStr($direccion, true);
		
		$telefono = Cadenas::vaccinateStr($telefono);
		$celular = Cadenas::vaccinateStr($celular);
		$fax = Cadenas::vaccinateStr($fax);
		
		$tipoCargo = intval($tipoCargo);
		$ciudad = intval($ciudad);
		
		($celular == "") ? $celular = "NULL" : $cel = "'$celular'";	
		($correoElectronico == "") ? $correoElectronico = "NULL" : $correoElectronico = "'$correoElectronico'";
			
		$sql = "UPDATE tb_empleado SET 
				nombreCompleto='$nombres',direccion='$direccion',telefono='$telefono',celular=$celular,fechaDeNacimiento='$fechaDeNacimiento',
				correoElectronico=$correoElectronico,id_tipoCargo=$tipoCargo,id_ciudad=$ciudad"
				.$cambiar." WHERE id_empleado=$id";
									  
		$exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
		
	public function seleccionarEmpleado($estado,$id=NULL)
	{
		$sql = "SELECT 
				B.id_empleado,A.tipoCargo,C.ciudad,B.nombreCompleto,B.numeroDocumento,B.fechaDeNacimiento,B.telefono,
				B.celular,B.correoElectronico,B.direccion,B.estado,B.id_tipoCargo,B.id_ciudad
				FROM tb_tipo_cargo A  
				INNER JOIN tb_empleado B 
				ON A.id_tipoCargo = B.id_tipoCargo 
				INNER JOIN tb_ciudad C 
				ON C.id_ciudad = B.id_ciudad
				WHERE B.estado=$estado";
				
		if($id != NULL) $sql.= "  AND B.id_empleado=$id";
		
		$ejecuto = SQL::execQuery($sql);
		
		if(! $ejecuto)
		{
			$this->empleado_lista = NULL;
			return;
		}
		
		$this->empleado_lista = array();
		
		while($fila = SQL::fetchArray())
		{
			 $this->empleado_lista[] = array("id"=>$fila['id_empleado'],
									 "tipoCargo"=>$fila['tipoCargo'],
									 "ciudad"=>$fila['ciudad'],
									 "nombreCompleto"=>$fila['nombreCompleto'],
									 "numeroDocumento"=>$fila['numeroDocumento'],
									 "telefono"=>$fila['telefono'],
									 "celular"=>$fila['celular'],
									 "fechaDeNacimiento"=>$fila['fechaDeNacimiento'],
									 "correoElectronico"=>$fila['correoElectronico'],
									 "direccion"=>$fila['direccion'],
									 "idtipocargo"=>$fila['id_tipoCargo'],
									 "idciudad"=>$fila['id_ciudad']);
		}
		
	}
	
	public function eliminarEmpleado($id,$estado)
	{
		$sql = "UPDATE tb_empleado SET estado=$estado WHERE id_empleado=$id";
		$exec = SQL::execQuery($sql);
		return SQL::respuesta($exec); 
    }
	
	public function getListado()
	{
		return $this->empleado_lista;
	}
}

?>