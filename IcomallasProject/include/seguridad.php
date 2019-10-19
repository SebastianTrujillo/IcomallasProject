<?php
session_start();
$u = $_SESSION['usIcomallas']; 
if($u["online"]!= 1){
	?>
    	<script type="text/javascript">window.location="../html/login.php";  </script>
	<?php		
	 
	 exit();
}
/*$privilegio = ($u["idtipoPermiso"] == "1");
$vendedor = ($u["idtipoPermiso"] == "2");*/

$permiso = $u["idtipoPermiso"];


?>