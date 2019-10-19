var url_cliente = "../include/cliente_control.php";
var documento;


function enviarDatosCliente(accion, e)
{	
	e.preventDefault();
	removerMensajes();
	appendLoading("frm-cliente");
	validarForm("frm-cliente");
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
		datos = "tipo="+tipo+"&"+ $("#frm-cliente").serialize() + dato_add;
		
		$.post( url_cliente, datos, function(data)
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
			        			if(accion == 'insertar') modulo = "cliente";
			   					else if(accion == 'modificar') modulo = "cliente_edit";
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
	crearTabla("listadoCliente", 0, "desc");
	appendLoadingBig();
	 
	 setTimeout(function()
	 			{
		 			mostrarCapaListado();
		        },1000)
}

function accionCliente(id,accion, elemento)
{
	var tipo = (accion == 1 || accion == 2) ? 3 : 5;
	var fila = null;
	if(! elemento) var elemento = null;
	else fila = elemento.parentNode.parentNode;
		
	accionUsuario({url:url_cliente, datos: { tipo:tipo, id:id, accion:accion, estado:2 }, fila:fila})
}

function iniciarCamposEditar(datos)
{
	documento = datos.numeroDocumento;
	document.getElementById('idCliente').value = datos.id;
	document.getElementById('documento').value = datos.numeroDocumento;
	document.getElementById('nombres').value = datos.nombreCompleto;
	document.getElementById('telefono').value = datos.telefono;
	document.getElementById('celular').value = datos.celular;
	document.getElementById('fax').value = datos.fax;
	document.getElementById('correoElectronico').value = datos.correoElectronico;
	document.getElementById('direccion').value = datos.direccion;
	
	llenarCombo('tipoDocumento', 'tipoDocumento', datos.idtipodocumento)
	llenarCombo('ciudad', 'ciudad', datos.idciudad);
}

