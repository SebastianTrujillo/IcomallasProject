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
 
</head>

<body>

   	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>REGISTRAR CLIENTE</h1>
        <p>Diligencie el siguiente formulario.</p>
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
        	<form id="frm-cliente" class="form" onSubmit="enviarDatosCliente('insertar', event)">
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="nombreCompleto">Nombre Completo:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="nombreCompleto" id="nombres" maxlength="60" title="Nombre Completo" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="numeroDeDocumento">Numero De Documento:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="numeroDeDocumento" id="documento" maxlength="15" title="Numero De Documento" class="requerido positive-integer"/>            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="tipoDeDocumento">Tipo De Documento:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <select name="tipoDeDocumento" id="tipoDocumento" title="Tipo De Documento" class="requerido">
                	
            		<script>llenarCombo('tipoDocumento', 'tipoDocumento');</script>
            	</select>    
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="telefono">Teléfono:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="telefono" id="telefono" maxlength="7" title="Teléfono" class="requerido positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="celular">Celular:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="celular" id="celular" maxlength="10" title="Celular" class="positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="fax">Fax:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="fax" id="fax" maxlength="7" title="Fax" class="positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="correoElectronico">E-mail:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="correoElectronico" id="correoElectronico" maxlength="60" title="E-mail"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="direccion">Dirección:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="direccion" id="direccion" maxlength="60" title="Dirección" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="ciudad">Ciudad:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <select name="ciudad" id="ciudad" title="Ciudad" class="requerido">
                	
            		<script>llenarCombo('ciudad', 'ciudad');</script>
            	</select>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <input type="submit" class="button" value="Guardar" title="Guardar"/>
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