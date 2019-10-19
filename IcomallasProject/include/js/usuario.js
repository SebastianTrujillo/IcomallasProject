var url_usuario = "../include/usuario_control.php";
var usuario,idempleadoSel,empleadoSeleccionado;


function enviarDatosUsuario(accion, e)
{	
	e.preventDefault();
	removerMensajes();
	appendLoading("frm-usuario");
	
	validarForm("frm-usuario");
	
	if(accion == "insertar"){
		
		campoMinLengt("contrasenia",5);
		campoPass("contrasenia", "confirmarContrasenia");
	}
	
	if(response)
	{
		//enviar la informacion al servidor
		var datos, tipo, dato_add = "";
		if(accion == 'insertar')
		{
			tipo = 1;		
		}
		else if(accion == 'modificar')
		{
			var cambiousuario;
			tipo = 4;
			cambiousuario = (usuario == $('#Usuario').val() ) ? 0 : 1;
			dato_add = "&cambioUsu="+ cambiousuario;
		}
		datos = "tipo="+tipo+"&"+ $("#frm-usuario").serialize() + dato_add;
		$.post( url_usuario, datos, function(data)
									{
										respuesta_servidor = parseInt(data);
									}
			  )
	} 
	
	setTimeout(function()
			   {
				   removeLoading();
				   
				   if(! response)
				   {
					   var msg;
					   if(tipo_validacion == 1)msg = null;
					   else if(tipo_validacion == 2)msg = "La contraseña debe tener mínimo 5 Caracteres";
					   else if(tipo_validacion == 3) msg = "La contraseñas deben coincidir.";
					   mostrarErrorCampo(msg);
				   }
				   else{
					        switch(respuesta_servidor)
							{
								case -1:
			     				$submit.after(warning_error("", 2));
			   					break;
			   
			   					case 1:
			        			var modulo;
			        			if(accion == 'insertar') modulo = "usuario";
			   					else if(accion == 'modificar') modulo = "usuario_edit";
			        			$("#contenidoDePagina").load("mensajes.php",{ mod:modulo});
			   					break;
			   
			   					case 2:
			     				$submit.after(warning_error("El empleado seleccionado ya se le ha asignado una Cuenta de Usuario", 1));
			   					break;
								
								case 3:
			     				$submit.after(warning_error("El nombre de Usuario ya existe, por favor ingrese otro.", 1));
			   					break;
		   					}
						}
			   },700);
}

function mostrarListado()
{
	crearTabla("listadoUsuario", 0, "desc");
	appendLoadingBig();
	 
	 setTimeout(function()
	 			{
		 			mostrarCapaListado();
		        },1000)
}

function accionPerfil(id,accion, elemento)
{
	var tipo = (accion == 1 || accion == 2) ? 3 : 5;
	var fila = null;
	if(! elemento) var elemento = null;
	else fila = elemento.parentNode.parentNode;
		
	accionUsuario({url:url_usuario, datos: { tipo:tipo, id:id, accion:accion, estado:2 }, fila:fila})
}

function iniciarCamposEditar(datos)
{
	usuario = datos.nombreUsuario;
	
	document.getElementById('idUsuario').value = datos.id;
	document.getElementById('documento').value = datos.documento;
	document.getElementById('Usuario').value = datos.nombreUsuario;
	document.getElementById('nombres').value = datos.nombreCompleto;
		
	llenarCombo('tipoPermiso', 'tipoPermiso', datos.idtipoPermiso);
}

function seleccionarEmpleado(){
	
	if($(".fail").length > 0) $(".fail").remove();
	$("#empleado-sel").hide("fast");
	$("#idempleado-usuario").val(idempleadoSel);
	$("#empleado-sel").html(empleadoSeleccionado);
	$("#empleado-sel").show("fast");
	$("#detalleEmpleado").hide("fast");
}

function iniciarForm()
{
	autocompletar("empleado-buscar","../include/ajax_autocompletar.php",3);
	$("#empleado-buscar").autocomplete
	({	
		   select : function(event,ui)
		   {
			   $("#idempleado-usuario").val("");
			   $("#empleado-sel").hide("fast");
			   $("#empleado-sel").html("");
			   $("#detalleEmpleado").hide("fast");
			   $("#detalleEmpleado").html("<div class='field'>" +
			   							  		"<label>Nombre Completo:</label>"+
			   							  		" <span class='item'>"+ ui.item.nombreCompleto+"</span>"+
										  "</div>"+
										
										  "<div class='field'>" +
			   									"<label>Numero De Documento:</label>"+
			   									" <span class='item'>"+ ui.item.value+"</span>"+
										  "</div>"+
										
										  "<div class='field'>" +
			   									"<label>Teléfono:</label>"+
			   									" <span class='item'>"+ ui.item.telefono+"</span>"+
										  "</div>"+								
										  "<input type='button' value='Agregar Empleado' title='Agregar Empleado'class='button'                     																																onclick='seleccionarEmpleado()' />");
			   
			   empleadoSeleccionado = "<hr id='linea'/>"+
			    					  "<h3 id='subTitulos'>Empleado Seleccionado</h3>"+
									  "<div class='field'>" +
			   								"<label>Nombre Completo:</label>"+
			   								" <span class='item'>"+ ui.item.nombreCompleto+"</span>"+
									  "</div>"+
									  "<div class='field'>" +
			   						  		"<label>Numero De Documento:</label>"+
			   								" <span class='item'>"+ ui.item.value+"</span>"+
									  "</div>";
																	  									
			   idempleadoSel = ui.item.ID;	   
			   $("#detalleEmpleado").show("fast");
		   }
	})
}

/*empleadoSeleccionado = "<hr width='450px'/>"+
			   						  "<h3 id='subTitulos'>Empleado Seleccionado</h3>"+
									  "<div class='field'>" +
			   								"<label>Nombre Completo:</label>"+
			   								" <span class='item'>"+ ui.item.nombreCompleto+"</span>"+
									  "</div>"+
									  "<div class='field'>" +
			   						  		"<label>Numero De Documento:</label>"+
			   								" <span class='item'>"+ ui.item.value+"</span>"+
									  "</div>";*/

