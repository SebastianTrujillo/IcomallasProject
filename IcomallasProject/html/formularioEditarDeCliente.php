<!-------------------------------------------------------------------------------------------------------------------------------->
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    <link type="text/css" rel="stylesheet" href="../css/estilos_formularios.css" />
    <script type="text/javascript" src="../include/libs/jquery numeric/jquery.numeric.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/cliente.js"></script>
    <script type="text/javascript"> validarNumericos()</script>
 	<script type="text/javascript">
			var datos = <?php echo json_encode($respuesta) ?>;
    		iniciarCamposEditar(datos);
    </script>
</head>

<body>

	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>EDITAR CLIENTE</h1>
        <p>Edite el siguiente formulario.</p>        
    </div>
    
    <!-- Atras/Adelante-->
 	<div id="atrasAdelante">
    	<img id="atras" src="../images/atras.png" title="Atrás" onClick="window.location = '?modulo=consultarCliente'" />
    </div>
    
    <!-- capa del contenedor de pagina-->
    <div id="contenedorInicio">
    
    	<!-- capa del contenedor de etiqueta-->
    	<div id="contenedorEtiqueta">
    		<div id="tituloDeEtiqueta">
            	Datos de cliente
            </div>
        </div>
        
    	<!-- capa del contenido de pagina-->
    	<div id="contenidoDePaginaInicio">
        	<form id="frm-cliente" class="form" onSubmit="enviarDatosCliente('modificar', event)">
            <!-------------------------------------------------------------------------------------------------------------------->
            <input type="hidden" id="idCliente" name="idCliente"/>
            <div class="field">
                <label for="nombreCompleto">Nombre Completo:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="nombreCompleto" id="nombres" maxlength="80" title="Nombre Completo" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="numeroDeDocumento">Numero De Documento:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="numeroDeDocumento" id="documento" maxlength="80" title="Numero De Documento" class="requerido positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="tipoDeDocumento">Tipo De Documento:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <select name="tipoDeDocumento" id="tipoDocumento" title="Tipo De Documento" class="requerido"></select>    
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="telefono">Teléfono:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="telefono" id="telefono" maxlength="80" title="Teléfono" class="requerido positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="celular">Celular:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="celular" id="celular" maxlength="80" title="Celular" class="positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="fax">Fax:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="fax" id="fax" maxlength="80" title="Fax" class="positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="correoElectronico">E-mail:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="correoElectronico" id="correoElectronico" maxlength="80" title="E-mail"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="direccion">Dirección:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="direccion" id="direccion" maxlength="80" title="Dirección" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="ciudad">Ciudad:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <select name="ciudad" id="ciudad" title="Ciudad" class="requerido"></select>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <input type="submit" class="button" value="Actualizar" title="Actualizar"/>
            
            </form> 
        </div>
    </div>
    
    <!-- capa del pie de pagina-->
    <div id="pieDePaginaInicio">
    </div>	
    
</body>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->