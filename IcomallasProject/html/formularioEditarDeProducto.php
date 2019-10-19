<!-------------------------------------------------------------------------------------------------------------------------------->
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    
    <link type="text/css" rel="stylesheet" href="../css/estilos_formularios.css" />
    <script type="text/javascript" src="../include/libs/jquery numeric/jquery.numeric.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/producto.js"></script>
    <script type="text/javascript"> validarNumericos()</script>
    <script type="text/javascript">
			var datos = <?php echo json_encode($respuesta) ?>;
    		iniciarCamposEditar(datos);
    </script>
       
</head>

<body>

	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>EDITAR PRODUCTO</h1>
        <p>Edite el siguiente formulario.</p>        
    </div>
    
    <!-- Atras/Adelante-->
 	<div id="atrasAdelante">
    <img id="atras" src="../images/atras.png" title="Atrás" onClick="window.location = '?modulo=consultarProducto'" />
    </div>
    
    <!-- capa del contenedor de pagina-->
    <div id="contenedorInicio">
    
    	<!-- capa del contenedor de etiqueta-->
    	<div id="contenedorEtiqueta">
    		<div id="tituloDeEtiqueta">
            	Datos de producto
            </div>
        </div>
                
    	<!-- capa del contenido de pagina-->
    	<div id="contenidoDePaginaInicio">
        	<form id="frm-producto" class="form" onSubmit="enviarDatosProducto('modificar', event)">
            <input type="hidden" id="idProducto" name="idProducto"/>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="nombreCompleto">Nombre:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="nombreCompleto" id="nombres" maxlength="60" title="Nombre" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="codigo">Código:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="codigo" id="codigo" maxlength="15" title="Código" class="requerido positive-integer"/>              
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="descripcion">Descripción:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="descripcion" id="descripcion" maxlength="60" title="Descripción"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="fabricante">Fabricante:
                	<span class="field-help">
                    	
                    </span>
                </label>
                <input type="text" name="fabricante" id="fabricante" maxlength="60" title="Fabricante"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="stock">Stock:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="stock" id="stock" maxlength="3" title="Stock" class="requerido positive-integer"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="unidadMedida">Unidad De Medida:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <select name="unidadMedida" id="unidadMedida" title="Unidad De Medida" class="requerido"></select>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="valorUnitario">Valor Unitario:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="valorUnitario" id="valorUnitario" maxlength="60" title="Valor Unitario" class="requerido positive"/>               
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