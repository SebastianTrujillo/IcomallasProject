<!-------------------------------------------------------------------------------------------------------------------------------->
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    
    <link type="text/css" rel="stylesheet" href="../css/estilos_formularios.css" />
     <link type="text/css" rel="stylesheet" href="../include/libs/jquery/css/jquery.css" />
    <script type="text/javascript" src="../include/libs/jquery numeric/jquery.numeric.js"></script>
     <script type="text/javascript" src="../include/libs/jquery/jquery-ui-1.8.17.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/empleado.js"></script>
    <script type="text/javascript"> validarNumericos()</script>
    <!--<script>setDatePicker("fechaDeNacimiento");</script>-->
    <script type="text/javascript">
			var datos = <?php echo json_encode($respuesta) ?>;
    		iniciarCamposEditar(datos);
    </script>
    
</head>

<body>

   	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>CONSULTAR EMPLEADO</h1>
        <p>Consulte el siguiente formulario.</p>
    </div>
    
    <!-- Atras/Adelante-->
 	<div id="atrasAdelante">
    	<img id="atras" src="../images/atras.png" title="Atrás" onClick="window.location = '?modulo=consultarEmpleado'" />
    </div>
    
    <!-- capa del contenedor de pagina-->
    <div id="contenedorInicio">
    
    	<!-- capa del contenedor de etiqueta-->
    	<div id="contenedorEtiqueta">
    		<div id="tituloDeEtiqueta">
            	Datos de empleado
            </div>
        </div>
        
    	<!-- capa del contenido de pagina-->
    	<div id="contenidoDePaginaInicio">
        	<form id="frm-empleado" class="form">
            <input type="hidden" id="idEmpleado" name="idEmpleado"/>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="nombreCompleto">Nombre Completo:</label>
                <input type="text" name="nombreCompleto" id="nombres" title="Nombre Completo" readonly style="background-color:rgb(249,249,249); border:none;"/>                
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="numeroDeDocumento">Numero De Documento:</label>
                <input type="text" name="numeroDeDocumento" id="documento" title="Numero De Documento" readonly style="background-color:rgb(249,249,249); border:none;"/>                
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="tipoCargo">Tipo De Cargo:</label>
                <select name="tipoCargo" id="tipoCargo" title="Tipo De Cargo" disabled="disabled" style="background-color:rgb(249,249,249); border:none;"></select>               
            </div>    
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="fechaDeNacimiento">Fecha De Nacimiento:</label>
                <input type="text" name="fechaDeNacimiento" id="fechaDeNacimiento" title="Fecha De Nacimiento" readonly style="background-color:rgb(249,249,249); border:none;"/>  
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" title="Teléfono" readonly style="background-color:rgb(249,249,249); border:none;"/>              
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="celular">Celular:</label>
                <input type="text" name="celular" id="celular" title="Celular" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="correoElectronico">E-mail:</label>
                <input type="text" name="correoElectronico" id="correoElectronico" title="E-mail" readonly style="background-color:rgb(249,249,249); border:none;"/>                
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" title="Dirección" readonly style="background-color:rgb(249,249,249); border:none;"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="ciudad">Ciudad:</label>
                <select name="ciudad" id="ciudad" title="Ciudad" disabled="disabled" style="background-color:rgb(249,249,249); border:none;"/> 
                </select>    
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