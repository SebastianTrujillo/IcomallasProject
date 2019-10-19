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
    <script type="text/javascript"> validarNumericos()</script>
    <script type="text/javascript">iniciarForm()</script>
    
    
<!--<script type="text/javascript">
jQuery(function($){
	//variables
	var pass1 = $('[name=contrasenia]');
	var pass2 = $('[name=confirmarContrasenia]');
	var confirmacion = "Las contraseñas si coinciden";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span style="color:#FF4500;font-size:12px;display:block;float:right;text-align:left;width:238px;"></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor1.length==0 || valor1==""){
	span.text(vacio).addClass('negacion');	
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).addClass('confirmacion');
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
</script>-->
 
</head>

<body>

   	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>REGISTRAR USUARIO</h1>
        <p>Diligencie el siguiente formulario.</p>
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
        	<form id="frm-usuario" class="form" onSubmit="enviarDatosUsuario('insertar', event)">
                        
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
                	<label>Buscar Documento:
                		<span class="field-help">
                    		*
                    	</span>
                	</label>
                    <label for="idempleado-usuario" style="display:none">y Seleccione un Empleado:</label>
                    <input type="hidden" id="idempleado-usuario" name="idempleado-usuario" class="requerido"/>  
                	<input type="text" name="numeroDeDocumento" id="empleado-buscar" title="Buscar Documento" 
                    style="margin-right:4px;"/>  
                                
            	</div>    
        			<div id="detalleEmpleado"></div>
                	<div id="empleado-sel"></div>
            </div>  
            <!-------------------------------------------------------------------------------------------------------------------->
        	<!-------------------------------------------------------------------------------------------------------------------->
        	<!-------------------------------------------------------------------------------------------------------------------->
            
            <div class="field">
                <label for="tipoDePermiso">Tipo De Permiso:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <select name="tipoDePermiso" id="tipoPermiso" title="Tipo De Permiso" class="requerido">
                	
            		<script>llenarCombo('tipoPermiso', 'tipoPermiso');</script>
            	</select>    
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="Usuario">Usuario:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="text" name="Usuario" id="Usuario" maxlength="16" title="Usuario" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="contrasenia">Contraseña:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="password" name="contrasenia" id="contrasenia" maxlength="16" title="Contraseña" class="requerido"/>               
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <div class="field">
                <label for="confirmarContrasenia">Confirmar Contraseña:
                	<span class="field-help">
                    	*
                    </span>
                </label>
                <input type="password" name="confirmarContrasenia" id="confirmarContrasenia" maxlength="16" title="Confirmar Contraseña" class="requerido"/>            
            </div>
            <!-------------------------------------------------------------------------------------------------------------------->
            <input type="submit" class="button" value="Guardar" title="Guardar"/>
            </form> 
        </div>
    </div>
    
   
    
</body>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->