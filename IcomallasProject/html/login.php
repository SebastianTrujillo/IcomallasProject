<?php 	require_once '../include/verifica_sesion.php'; ?>

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
    <link type="text/css" rel="stylesheet" href="../css/estilos_login.css" />
    <script type="text/javascript" src="../include/libs/jquery/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/login.js"></script>
    
    
</head>

<body>

	<!-- capa del contenedor de pagina-->
    <div id="contenedor">
    	
        <!-- capa del encabezado de pagina-->
		<div id="encabezadoDePaginaLogin">
    		<h1>ICOMALLAS S.A.</h1>
        	<p>Gestor de facturación.</p>        
    	</div>
        
        <!-- capa del contenedor de etiqueta-->
    	<div id="contenedorEtiqueta">
    		<div id="tituloDeEtiqueta">
            	Inicio de sesión
            </div>
        </div>
        
    	<!-- capa del contenido de pagina-->
    	<div id="contenidoDePaginaLogin">
        	<form id="frm-logueo" class="form" style="margin-bottom:40px;" onSubmit="autenticar(event)">
            <!-------------------------------------------------------------------------------------------------------------------->
            <table width="570px">
            <tr>
            <td width="140px" >
            <div align="right"><img src="../images/usuarios.png" height="128" width="128" /></div> 
            </td>
            <td >
            <div class="field">
                <label for="nombreCompleto">Usuario:</label>
                <input type="text" name="nick" id="nick" maxlength="16" title="Usuario" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="numeroDeDocumento">Contraseña:</label>
                <input type="password" name="clave" id="clave" maxlength="16" title="Contraseña" class="requerido"/>               
            </div>
            </td>
            </tr>
            </table>
            <!-------------------------------------------------------------------------------------------------------------------->
            <input type="submit" class="button" value="Iniciar Sesión" title="Iniciar Sesión"/>
            <div id="contentError"></div>
            </form> 
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