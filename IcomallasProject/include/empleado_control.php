<?php

require_once "empleado.class.php";

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

$empleado = new Empleado;
	
switch($tipo)
{
	case 1://insertar
		   $respuesta = $empleado->insertarEmpleado($_POST['nombreCompleto'],$_POST['numeroDeDocumento'],$_POST['tipoCargo'],$_POST['fechaDeNacimiento'],
										            $_POST['telefono'],$_POST['celular'],$_POST['correoElectronico'],$_POST['direccion'],
												    $_POST['ciudad'] );
		   echo $respuesta;
	break;
		
	case 2:// consultar
		   $empleado->seleccionarEmpleado(1);
		   $respuesta = $empleado->getListado();
		   require_once '../html/formularioListadoDeEmpleado.php';
	break;
	
	case 3: //consultar por id
	   	   $empleado->seleccionarEmpleado(1,$_POST['id']);
	   	   $datos = $empleado->getListado();
		   $respuesta = $datos[0];
		   $accion = $_POST['accion'];
		   $file = ($accion == 1) ? "../html/formularioEditarDeEmpleado.php" : "../html/formularioConsultarDeEmpleado.php";
		   require_once $file;
	break;
		
	case 4://actualizar datos
	       $respuesta = $empleado->modificarEmpleado($_POST['idEmpleado'],$_POST['nombreCompleto'],$_POST['numeroDeDocumento'],$_POST['tipoCargo'],
		   											 $_POST['fechaDeNacimiento'],$_POST['telefono'],$_POST['celular'],$_POST['correoElectronico'],
													 $_POST['direccion'],$_POST['ciudad'],$_POST['cambioCed']);
		   echo $respuesta;
	break;
	
	case 5://eliminar empleado
		   $respuesta = $empleado->eliminarEmpleado($_POST['id'],$_POST['estado']);
		   echo $respuesta;
	break;
}

$conn->cerrarConexion();

?>