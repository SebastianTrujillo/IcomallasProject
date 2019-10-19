<?php

require_once "usuario.class.php";

$conn->abrirConexion();

if($conn->link == NULL)
{
	echo "Conexion Fallo!!";
	exit();
}
	
if(! isset($_POST['tipo']))
{
	
	exit();
	
}
	
$tipo= $_POST['tipo'];

$usuario = new Usuario;
	
switch($tipo)
{
	case 1://insertar
		   $respuesta = $usuario->insertarUsuario($_POST['idempleado-usuario'],$_POST['tipoDePermiso'],$_POST['Usuario'],$_POST['contrasenia']);
		   echo $respuesta;
	break;
		
	case 2:// consultar
		   $usuario->seleccionarUsuario(1,NULL,NULL,NULL,"");
		   $respuesta = $usuario->getListado();
		   require_once '../html/formularioListadoDeUsuario.php';
		   //$respuesta = json_encode($respuesta);
	break;
	
	case 3: //consultar por id
	   	   $usuario->seleccionarUsuario(1,$_POST['id'],NULL,NULL,"id");
	   	   $datos = $usuario->getListado();
		   $respuesta = $datos[0];
		   $accion = $_POST['accion'];
		   $file = ($accion == 1) ? "../html/formularioEditarDeUsuario.php" : "../html/formularioConsultarDeUsuario.php";
		   require_once $file;
	break;
	
	
	
	case 4://actualizar datos
	       $respuesta = $usuario->modificarUsuario($_POST['idUsuario'],$_POST["Usuario"],$_POST["tipoDePermiso"],$_POST["cambioUsu"]); 
		   echo $respuesta;
	break;
	
	case 5://eliminar cliente
		   $respuesta = $usuario->eliminarUsuario($_POST['id'],$_POST['estado']);
		   echo $respuesta;
	break;
	
	
}

$conn->cerrarConexion();

//echo $respuesta;

?>