<?php

require_once "producto.class.php";

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

$producto = new Producto;
	
switch($tipo)
{
	case 1://insertar
		   $respuesta = $producto->insertarProducto($_POST['nombreCompleto'],$_POST['codigo'],$_POST['descripcion'],$_POST['fabricante'],
										            $_POST['stock'],$_POST['unidadMedida'],$_POST['valorUnitario']);
		   echo $respuesta;
	break;
		
	case 2:// consultar
		   $producto->seleccionarProducto(1);
		   $respuesta = $producto->getListado();
		   require_once '../html/formularioListadoDeProducto.php';
	break;
	
	case 3: //consultar por id
	   	   $producto->seleccionarProducto(1,$_POST['id']);
	   	   $datos = $producto->getListado();
		   $respuesta = $datos[0];
		   $accion = $_POST['accion'];
		   $file = ($accion == 1) ? "../html/formularioEditarDeProducto.php" : "../html/formularioConsultarDeProducto.php";
		   require_once $file;
	break;
		
	case 4://actualizar datos
	       $respuesta = $producto->modificarProducto($_POST['idProducto'],$_POST['nombreCompleto'],$_POST['codigo'],$_POST['descripcion'],
		   											 $_POST['fabricante'],$_POST['stock'],$_POST['unidadMedida'],$_POST['valorUnitario'],
													 $_POST['cambioCod']);
		   echo $respuesta;
	break;
	
	case 5://eliminar producto
		   $respuesta = $producto->eliminarProducto($_POST['id'],$_POST['estado']);
		   echo $respuesta;
	break;
	
	
}

$conn->cerrarConexion();

?>