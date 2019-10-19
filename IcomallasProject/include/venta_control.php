<?php	
	require_once 'ventas.class.php';
	
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
	$venta = new Venta;
	$tipo = $_POST['tipo'];
	switch($tipo){
		
		
		case 1:
			//insertar pedido
			$repuesta = $venta->insertarVenta($_POST['idcliente'],$_POST['usuario'],$_POST['totalBruto'],$_POST['impuesto'],
											$_POST['neto'],$_POST['productos'],$_POST['precios'],$_POST['cantidad'],$_POST['vrparcial']);
						
			echo $repuesta;		 	
			
		
		break;
		
		case 2:// consultar
		   $venta->seleccionarVenta(1);
		   $respuesta = $venta->getListado();
		   require_once '../html/formularioListadoDeVenta.php';
		break;
		
		case 3: //consultar por id
	   	   $venta->seleccionarVenta(1,$_POST['id']);
	   	   $datos = $venta->getListado();
		   $venta->seleccionarDetalle($_POST['id']);
		   $detalle = $venta->getDetalle();
		   $respuesta = $datos[0];
		 
		  
		   require_once "../html/formularioConsultarDeVenta.php";
	break;
	
	
	
	case 4://eliminar cliente
		   $respuesta = $venta->eliminarVenta($_POST['id'],$_POST['estado']);
		   echo $respuesta;
	break;
		
				
		
	}

	$conn->cerrarConexion();
	

?>