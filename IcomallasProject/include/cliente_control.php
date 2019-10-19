<?php

require_once "cliente.class.php";

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

$cliente = new Cliente;
	
switch($tipo)
{
	case 1://insertar
		   $respuesta = $cliente->insertarCliente($_POST['nombreCompleto'],$_POST['numeroDeDocumento'],$_POST['tipoDeDocumento'],$_POST['telefono'],
										          $_POST['celular'],$_POST['fax'],$_POST['correoElectronico'],$_POST['direccion'],
												  $_POST['ciudad'] );
		   echo $respuesta;
	break;
		
	case 2:// consultar
		   $cliente->seleccionarCliente(1);
		   $respuesta = $cliente->getListado();
		   require_once '../html/formularioListadoDeCliente.php';
		   //$respuesta = json_encode($respuesta);
	break;
	
	case 3: //consultar por id
	   	   $cliente->seleccionarCliente(1,$_POST['id']);
	   	   $datos = $cliente->getListado();
		   $respuesta = $datos[0];
		   $accion = $_POST['accion'];
		   $file = ($accion == 1) ? "../html/formularioEditarDeCliente.php" : "../html/formularioConsultarDeCliente.php";
		   require_once $file;
	break;
	
	
	
	case 4://actualizar datos
	       $respuesta = $cliente->modificarCliente($_POST['idCliente'],$_POST['nombreCompleto'],$_POST['numeroDeDocumento'],$_POST['tipoDeDocumento'],
	   										       $_POST['telefono'],$_POST['celular'],$_POST['fax'],$_POST['correoElectronico'],$_POST['direccion'],
											       $_POST['ciudad'],$_POST['cambioCed']); 
		   echo $respuesta;
	break;
	
	case 5://eliminar cliente
		   $respuesta = $cliente->eliminarCliente($_POST['id'],$_POST['estado']);
		   echo $respuesta;
	break;
	
	
}

$conn->cerrarConexion();

//echo $respuesta;

?>