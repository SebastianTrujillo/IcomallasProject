<?php
	include_once "../include/seguridad.php";
	$modulo = (isset($_GET["modulo"])) ? $_GET["modulo"] : "" ;
?>
<!-------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-------------------------------------------------------------------------------------------------------------------------------->
<html xmlns="http://www.w3.org/1999/xhtml">
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
	<title>
    	ICOMALLAS ®
    </title>
    
    <link rel="shortcut icon" href="../images/wall_yellow.ico">
    <link type="text/css" rel="stylesheet" href="../css/estilos_index.css" />
    <link type="text/css" rel="stylesheet" href="menu/menu.css" />
    <script type="text/javascript" src="../include/libs/jquery/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="../include/js/acceso_menu.js"></script>
    
	<script type="text/javascript">
		$(document).ready(function()
		{
			cargarContenido('<?php echo $modulo ?>', '<?php echo $permiso ?>');
			
		});
    </script>
    
    <script type="text/javascript">
		$(function()
		{
			$('#navigation a').stop().animate({'marginLeft':'-85px'},1000);
			$('#navigation > li').hover
			(
				function(){$('a',$(this)).stop().animate({'marginLeft':'-2px'},200);},
				function(){$('a',$(this)).stop().animate({'marginLeft':'-85px'},200);}
			);
		});
	</script> 
        
</head>

<body>
	
    <!-- capa del encabezado de usuario-->
    <div id="usuario">
    	<div id="textoUsuario">
           	Usuario: 
            <label> <?php echo $u["nombreCompleto"]?>
            </label>
        </div>
    </div>
    
    <!-- menu lateral-->
	<ul id="navigation">
		<li class="imagen1"><a href="?modulo=ayuda" title="Ayuda"></a></li>
		<li class="imagen2"><a href="javascript:logOut()" title="Cerrar Sesion"></a></li>
	</ul>
	
    <!-- capa del encabezado de pagina-->
	<div id="encabezadoDePagina">
        <!--<object type="application/x-shockwave-flash" data="../images/cab.swf" width="694" height="166" align="left">
        </object>-->
    </div>
    
    <!-- capa del contenedor de pagina-->
    <div id="contenedor">
    	<!-- capa del menu de pagina-->
    	<div id="menuDePagina" align="center">
        </div>
        <!-- capa del contenido de pagina-->
    	<div id="contenidoDePagina">
        </div>
    </div>
    
    <!-- capa del pie de pagina-->
    <div id="pieDePagina" align="center">
    	<a href="makross.php" target="_blank">Makross ©</a>
    </div>	
</body>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->