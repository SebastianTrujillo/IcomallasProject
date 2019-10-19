<?php 
	require_once 'autocomplete.php';
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
	$auto = new Autocomplete;
	
	switch($tipo){
		
		case 1:
			$respuesta = $auto->autucompletarCliente($_POST['term']);
		break;
		
		case 2:
			$respuesta = $auto->autucompletarProducto($_POST['term']);
		break;
		
		case 3:
			$respuesta = $auto->autucompletarEmpleado($_POST['term']);
		break;
	}
	
	$conn->cerrarConexion();
	
	echo json_encode($respuesta);

?>