<!-------------------------------------------------------------------------------------------------------------------------------->
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    
    <link type="text/css" rel="stylesheet" href="../css/estilos_formularios.css" />
    <script type="text/javascript" src="../include/libs/jquery numeric/jquery.numeric.js"></script>
    <link type="text/css" rel="stylesheet" href="../include/libs/jquery/css/jquery.css"/>
    <script type="text/javascript" src="../include/libs/jquery/jquery-ui-1.8.17.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/usuario.js"></script>
    <script type="text/javascript">
			var datos = <?php echo json_encode($respuesta) ?>;
    		iniciarCamposEditar(datos);
    </script>
 
</head>

<body>

   	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>CONSULTAR USUARIO</h1>
        <p>Consulte el siguiente formulario.</p>
    </div>
    
    <!-- Atras/Adelante-->
 	<div id="atrasAdelante">
    	<img id="atras" src="../images/atras.png" title="Atrás" onClick="window.location = '?modulo=consultarUsuario'" />
    </div>
    
    <!-- capa del contenedor de pagina-->
    <div id="contenedorInicio">
    
    	<!-- capa del contenedor de etiqueta-->
    	<div id="contenedorEtiqueta">
    		<div id="tituloDeEtiqueta">
            	Datos de usuario
            </div>
        </div>
        
    	<!-- capa del contenido de pagina-->
    	<div id="contenidoDePaginaInicio">
        	<form id="frm-usuario" class="form">
            <input type="hidden" id="idUsuario" name="idUsuario"/>
                        
            <!-------------------------------------------------------------------------------------------------------------------->
        	<!-------------------------------------------------------------------------------------------------------------------->
        	<!-------------------------------------------------------------------------------------------------------------------->
        	<div id="contenedorEtiquetaEmpleado">
            	<div id="tituloDeEtiquetaEmpleado">
               		Datos de empleado
            	</div>
        	</div>
            
            <div id="empleado">
            	
        
       		 <div class="field">
                <label for="nombres">Nombre Completo:</label>
                <input type="text" name="nombres" id="nombres"title="Nombre Completo:" readonly style="background-color:#FFF;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="documento">Numero De Documento:</label>
                <input type="text" name="documento" id="documento"title="Numero De Documento" readonly style="background-color:#FFF;"/>               
            </div>
            	
             
            </div>  
            <!-------------------------------------------------------------------------------------------------------------------->
        	<!-------------------------------------------------------------------------------------------------------------------->
        	<!-------------------------------------------------------------------------------------------------------------------->
            
            <div class="field">
                <label for="tipoDePermiso">Tipo De Permiso:</label>
                <select name="tipoDePermiso" id="tipoPermiso" title="Tipo De Permiso" disabled="disabled" style="background-color:#FFF; color:#000;"></select>    
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="Usuario">Usuario:</label>
                <input type="text" name="Usuario" id="Usuario"title="Usuario" readonly style="background-color:#FFF;"/>               
            </div>
            
            </form> 
        </div>
    </div>
    
   
    
</body>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->