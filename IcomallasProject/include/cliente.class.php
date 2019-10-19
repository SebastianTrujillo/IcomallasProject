<?php

require_once 'sql.class.php';
require_once 'cadenas.class.php';
	
class Cliente
{
	private $cliente_lista = NULL;
	private $cliente_count = 0;
				
	public function insertarCliente($nombres, $documento, $tipoDocumento, $telefono, $celular, $fax, $correoElectronico, $direccion, $ciudad)
	{
		
		$documento = Cadenas::vaccinateStr($documento);
		
		//comprobamos la cedula ya esta registrada
		$this->comprobarCedula($documento);
		
		if($this->cliente_count == -1) return -1;
		
		if($this->cliente_count > 0 ) return 2;
		
		$nombres = Cadenas::vaccinateStr($nombres, true);
		$correoElectronico = Cadenas::vaccinateStr($correoElectronico, true);		
		$direccion = Cadenas::vaccinateStr($direccion, true);
		
		$telefono = Cadenas::vaccinateStr($telefono);
		$celular = Cadenas::vaccinateStr($celular);
		$fax = Cadenas::vaccinateStr($fax);
		
		$tipoDocumento = intval($tipoDocumento);
		$ciudad = intval($ciudad);
		
		($celular == "") ? $celular = "NULL" : $cel = "'$celular'";	
		($fax == "") ? $fax = "NULL" : $fax = "'$fax'";	
		($correoElectronico == "") ? $correoElectronico = "NULL" : $correoElectronico = "'$correoElectronico'";	
				
		$sql = "insert into tb_cliente(id_tipoDocumento,id_ciudad,nombreCompleto,numeroDocumento,telefono,celular,fax,correoElectronico,direccion,estado)
		        values($tipoDocumento,$ciudad,'$nombres','$documento','$telefono',$celular,$fax,$correoElectronico,'$direccion',1)";
			   
	    $exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
	
	public function comprobarCedula($cedula)
	{
		$sql = "SELECT count(1) FROM tb_cliente WHERE numeroDocumento='$cedula'";
		if(!SQL::execQuery($sql)) $this->cliente_count = -1;
		else $this->cliente_count = SQL::singleColumn();
	}
	
	public function modificarCliente($id,$nombres, $documento, $tipoDocumento, $telefono, $celular, 
									 $fax,$correoElectronico, $direccion, $ciudad,$cambioCedula)
	{
		if($cambioCedula)
		{
			$documento =  Cadenas::vaccinateStr($documento);
			//comprobamos la cedula ya esta registrada
			$this->comprobarCedula($documento);
			if($this->cliente_count == -1) return -1;
			if($this->cliente_count > 0 ) return 2; // 2 indicara que la cedula ya existe
			$cambiar = ",numeroDocumento='$documento'";
	    }
		
		$id = intval($id);
		$nombres = Cadenas::vaccinateStr($nombres, true);
		$correoElectronico = Cadenas::vaccinateStr($correoElectronico, true);		
		$direccion = Cadenas::vaccinateStr($direccion, true);
		
		$telefono = Cadenas::vaccinateStr($telefono);
		$celular = Cadenas::vaccinateStr($celular);
		$fax = Cadenas::vaccinateStr($fax);
		
		$tipoDocumento = intval($tipoDocumento);
		$ciudad = intval($ciudad);
		
		($celular == "") ? $celular = "NULL" : $cel = "'$celular'";	
		($fax == "") ? $fax = "NULL" : $fax = "'$fax'";	
		($correoElectronico == "") ? $correoElectronico = "NULL" : $correoElectronico = "'$correoElectronico'";
			
		$sql = "UPDATE tb_cliente SET 
				nombreCompleto='$nombres',direccion='$direccion',telefono='$telefono',celular=$celular,fax=$fax,
				correoElectronico=$correoElectronico,id_tipoDocumento=$tipoDocumento,id_ciudad=$ciudad"
				.$cambiar." WHERE id_cliente=$id";
									  
		$exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
		
	public function seleccionarCliente($estado,$id=NULL)
	{
		$sql = "SELECT 
				B.id_cliente,A.tipoDocumento,C.ciudad,B.nombreCompleto,B.numeroDocumento,B.telefono,
				B.celular,B.fax,B.correoElectronico,B.direccion,B.id_ciudad, B.id_tipoDocumento 
				FROM tb_tipo_documento A  
				INNER JOIN tb_cliente B 
				ON A.id_tipoDocumento = B.id_tipoDocumento 
				INNER JOIN tb_ciudad C 
				ON C.id_ciudad = B.id_ciudad  
				WHERE B.estado=$estado";
				
		if($id != NULL) $sql.= "  AND B.id_cliente=$id";
		
		$ejecuto = SQL::execQuery($sql);
		
		if(! $ejecuto)
		{
			$this->cliente_lista = NULL;
			return;
		}
		
		$this->cliente_lista = array();
		
		while($fila = SQL::fetchArray())
		{
			 $this->cliente_lista[] = array("id"=>$fila['id_cliente'],
									 "tipoDocumento"=>$fila['tipoDocumento'],
									 "ciudad"=>$fila['ciudad'],
									 "nombreCompleto"=>$fila['nombreCompleto'],
									 "numeroDocumento"=>$fila['numeroDocumento'],
									 "telefono"=>$fila['telefono'],
									 "celular"=>$fila['celular'],
									 "fax"=>$fila['fax'],
									 "correoElectronico"=>$fila['correoElectronico'],
									 "direccion"=>$fila['direccion'],
									 "idtipodocumento"=>$fila['id_tipoDocumento'],
									 "idciudad"=>$fila['id_ciudad']);
		}
		
	}
	
	public function eliminarCliente($id,$estado)
	{
		$sql = "UPDATE tb_cliente SET estado=$estado WHERE id_cliente=$id";
		$exec = SQL::execQuery($sql);
		return SQL::respuesta($exec); 
    }
	
	public function getListado()
	{
		return $this->cliente_lista;
	}
	
	
}

?>