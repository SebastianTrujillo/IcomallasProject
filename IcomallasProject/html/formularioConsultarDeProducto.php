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
    <script type="text/javascript">
			var datos = <?php echo json_encode($respuesta) ?>;
    		iniciarCamposEditar(datos);
    </script>
           
</head>

<body>

	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>CONSULTAR PRODUCTO</h1>
        <p>Consulte el siguiente formulario.</p>        
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
        	<form id="frm-producto" class="form">
            <input type="hidden" id="idProducto" name="idProducto"/>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="nombreCompleto">Nombre:</label>
                <input type="text" name="nombreCompleto" id="nombres" title="Nombre" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="codigo">Código:</label>
                <input type="text" name="codigo" id="codigo" title="Código" readonly style="background-color:rgb(249,249,249); border:none;"/>              
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" title="Descripción" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="fabricante">Fabricante:</label>
                <input type="text" name="fabricante" id="fabricante" title="Fabricante" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="stock">Stock:</label>
                <input type="text" name="stock" id="stock" title="Stock" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="unidadMedida">Unidad De Medida:</label>
                <select name="unidadMedida" id="unidadMedida" title="Unidad De Medida" disabled="disabled" style="background-color:rgb(249,249,249); border:none;"></select>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="valorUnitario">Valor Unitario:</label>
                <input type="text" name="valorUnitario" id="valorUnitario" title="Valor Unitario" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
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