<?php

require_once 'sql.class.php';
require_once 'cadenas.class.php';
	
class Usuario
{
	private $usuario_lista = NULL;
	private $usuario_count = 0;
	
	public function autenticar($login,$password)
	{
		$login = Cadenas::vaccinateStr($login);
		$password = Cadenas::vaccinateStr($password);
		$password = $this->ecriptarPassword($password);
		$this->seleccionarUsuario(1,0,$login,$password,"autenticar");
	}
					
	public function insertarUsuario($idEmpleado, $idPermiso, $nombreUsuario, $contrasenia)
	{
		$idEmpleado = intval($idEmpleado);
		
		
		$this->comprobarEmpleado($idEmpleado);
		if($this->usuario_count == -1) return -1;
		if($this->usuario_count > 0 ) return 2; //Este empleado ya tiene asignado un usuario
		$nombreUsuario = Cadenas::vaccinateStr($nombreUsuario);
		$this->comprobarNombreUsuario($nombreUsuario);
		if($this->usuario_count == -1) return -1;
		if($this->usuario_count > 0 ) return 3; //El nombre de usuario ya se encuentra registrado
		$contrasenia = Cadenas::vaccinateStr($contrasenia);
		$contrasenia = $this->ecriptarPassword($contrasenia);
		$idPermiso = intval($idPermiso);
						
		$sql = "insert into tb_usuario(id_empleado,id_tipoPermiso,nombreUsuario,contrasenia,estado)
		        values($idEmpleado,$idPermiso,'$nombreUsuario','$contrasenia',1)";
			   
	    $exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
	
	public function comprobarEmpleado($idEmpleado)
	{
		$sql = "SELECT count(1) FROM tb_usuario WHERE id_empleado=$idEmpleado";
		if(!SQL::execQuery($sql)) $this->usuario_count = -1;
		else $this->usuario_count = SQL::singleColumn();
	}
	
	public function comprobarNombreUsuario($nombreUsuario)
	{
		$sql = "SELECT count(1) FROM tb_usuario WHERE nombreUsuario='$nombreUsuario'";
		if(!SQL::execQuery($sql)) $this->usuario_count = -1;
		else $this->usuario_count = SQL::singleColumn();
	}
	
	private function ecriptarPassword($pass){
		
		return sha1(md5($pass));
	}
	
	public function modificarUsuario($id,$nick,$tipoPermiso,$cambioNick)
	{
		if($cambioNick)
		{
			$nick =  Cadenas::vaccinateStr($nick);
			//comprobamos la cedula ya esta registrada
			$this->comprobarNombreUsuario($nick);
			if($this->usuario_count == -1) return -1;
			if($this->usuario_count > 0 ) return 3;
			$cambiar = ",nombreUsuario='$nick'";
	    }
		
		$id = intval($id);
		
		$tipoPermiso = intval($tipoPermiso);
		
		
			
		$sql = "UPDATE tb_usuario SET id_tipoPermiso=$tipoPermiso"
				.$cambiar." WHERE id_usuario=$id";
									  
		$exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
		
	public function seleccionarUsuario($estado,$id,$nick, $password, $tipoconsulta)
	{
		$sql = "SELECT
				B.id_usuario,A.nombreCompleto,C.tipoPermiso,B.nombreUsuario,B.contrasenia,B.estado,
				B.id_empleado,B.id_tipoPermiso, A.numeroDocumento
				FROM tb_empleado A  
				INNER JOIN tb_usuario B 
				ON A.id_empleado = B.id_empleado 
				INNER JOIN tb_tipo_permiso C 
				ON C.id_tipoPermiso = B.id_tipoPermiso  
				WHERE B.estado=$estado";
				
		
		$filter = NULL;
		switch($tipoconsulta)
		{			
			case "autenticar":					
				$filter = " AND B.nombreUsuario='$nick' AND B.contrasenia='$password'";			
			break;
			
			case "id":
				$id = intval($id);
				$filter = " AND B.id_usuario=$id";
			break;
		}			
		if(SQL::execQuery($sql.$filter)) $this->obtenerDatos();
	    else $this->usuario_lista = NULL;
		
		
		
		
	}
	
	private function obtenerDatos()
		{	
			$this->usuario_count = SQL::numRows();
			if($this->usuario_count == 0){
				$this->usuario_lista = NULL;
				return;
			}
			$this->usuario_lista=array();
			while($fila = SQL::fetchArray())
			{
				 $this->usuario_lista[] = array("id"=>$fila['id_usuario'],
										 "nombreCompleto"=>$fila['nombreCompleto'],
										 "tipoPermiso"=>$fila['tipoPermiso'],
										 "documento"=>$fila['numeroDocumento'],
										 "idtipoPermiso"=>$fila['id_tipoPermiso'],
										 "nombreUsuario"=>$fila['nombreUsuario'],
										 "contrasenia"=>$fila['contrasenia'],
										 "estado"=>$fila['estado']);
										 
										
			}
    }
	
	public function eliminarUsuario($id,$estado)
	{
		$sql = "UPDATE tb_usuario SET estado=$estado WHERE id_usuario=$id";
		$exec = SQL::execQuery($sql);
		return SQL::respuesta($exec); 
    }
	
	public function getListado()
	{
		return $this->usuario_lista;
	}
	
	
}

?>