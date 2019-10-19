<?php
	  require_once "combos.class.php";
	  
	  $conn->abrirConexion();
	  
	  if($conn->link == NULL)
	  {
		  echo -1;
		  exit();
	  }
	  
	  $combo = new combos;
	  $tipo = $_POST["tipo"];
	  $respuesta = NULL;
	  
	  switch($tipo)
	  {
		  
		  case "tipoDocumento";
		  	$combo->combosTipoDocumento();
			$respuesta = $combo->getDatos();
		  break;
		  
		  case "tipoCargo";
		  	$combo->combosTipoCargo();
			$respuesta = $combo->getDatos();
		  break;
		  
		  case "tipoPermiso";
		  	$combo->combosTipoPermiso();
			$respuesta = $combo->getDatos();
		  break;
		  
		  case "ciudad";
		  	$combo->combosCiudad();
			$respuesta = $combo->getDatos();
		  break;
		  
		  case "unidadMedida";
		  	$combo->combosUnidadMedida();
			$respuesta = $combo->getDatos();
		  break;
		  
		  case "anio":
		  	$combo->comboAnios();
		  break;
	  }
	  
	  $conn->cerrarConexion();
	  echo $respuesta;
	  
?>