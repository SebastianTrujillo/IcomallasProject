<?php 
	session_start();
	if($newData == NULL || count($newData) == 0) exit();
	$newData["online"] = 1;
	$_SESSION['usermetalcom'] = $newData;
?>