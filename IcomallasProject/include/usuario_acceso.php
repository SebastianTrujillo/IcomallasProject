<?php
session_start();
// ARCHIVO CONTROL AUTENTICAR USUARIO
if(!isset($_SESSION['usIcomallas'])){
	require_once('usuario.class.php');
	
	if(!isset($_POST['nick']) || !isset($_POST['clave'])){
		?><script type="text/javascript">window.location="../html/index_icomallas.php";  </script><?php
	}	
	$nick=$_POST['nick'];
	$pass=$_POST['clave'];
	$conn->abrirConexion();
	$usr = new Usuario;
	$usr->autenticar($nick,$pass);
	$data = $usr->getListado();
	$response = NULL;
	
	if($data == NULL) $response = 0;	
	else{
		
		$data = $data[0];
		$data["online"] = 1;//se asigna 1 en la clave enlinea para indicar que el usuario esta conectado correctamente		
		$_SESSION['usIcomallas']=$data;
        $response = 1;  
	}
	$conn->cerrarConexion();
	echo $response;	
}
else{
?><script type="text/javascript">window.location="../html/index_icomallas.php";  </script><?php
}
?>