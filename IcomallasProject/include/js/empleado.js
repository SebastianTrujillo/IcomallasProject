var url_empleado = "../include/empleado_control.php";
var documento;


function enviarDatosEmpleado(accion, e)
{	
	
	e.preventDefault();
	removerMensajes();
	appendLoading("frm-empleado");
	validarForm("frm-empleado");
	campoEmail("correoElectronico");
	
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
			var cambiocedula;
			tipo = 4;
			cambiocedula = (documento == $('#documento').val() ) ? 0 : 1;
			dato_add = "&cambioCed="+ cambiocedula;
		}
		datos = "tipo="+tipo+"&"+ $("#frm-empleado").serialize() + dato_add;
		
		$.post( url_empleado, datos, function(data)
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
					   else if(tipo_validacion == 2)msg = "E-mail No Valido";
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
			        			if(accion == 'insertar') modulo = "empleado";
			   					else if(accion == 'modificar') modulo = "empleado_edit";
			        			$("#contenidoDePagina").load("mensajes.php",{ mod:modulo});
			   					break;
			   
			   					case 2:
			     				$submit.after(warning_error("El numero de documento ya existe, por favor ingrese otro.", 1));
			   					break;
		   					}
						}
			   },700);
}

function mostrarListado()
{
	crearTabla("listadoEmpleado", 0, "desc");
	appendLoadingBig();
	 
	 setTimeout(function()
	 			{
		 			mostrarCapaListado();
		        },1000)
}

function accionEmpleado(id,accion, elemento)
{
	var tipo = (accion == 1 || accion == 2) ? 3 : 5;
	var fila = null;
	if(! elemento) var elemento = null;
	else fila = elemento.parentNode.parentNode;
		
	accionUsuario({url:url_empleado, datos: { tipo:tipo, id:id, accion:accion, estado:2 }, fila:fila})
}

function iniciarCamposEditar(datos)
{
	documento = datos.numeroDocumento;
	document.getElementById('idEmpleado').value = datos.id;
	document.getElementById('documento').value = datos.numeroDocumento;
	document.getElementById('nombres').value = datos.nombreCompleto;
	document.getElementById('telefono').value = datos.telefono;
	document.getElementById('celular').value = datos.celular;
	document.getElementById('fechaDeNacimiento').value = datos.fechaDeNacimiento;
	document.getElementById('correoElectronico').value = datos.correoElectronico;
	document.getElementById('direccion').value = datos.direccion;
	
	llenarCombo('tipoCargo', 'tipoCargo', datos.idtipocargo)
	llenarCombo('ciudad', 'ciudad', datos.idciudad);
}



