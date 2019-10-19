var url_producto = "../include/producto_control.php";
var codigo;


function enviarDatosProducto(accion, e)
{	
	e.preventDefault();
	removerMensajes();
	appendLoading("frm-producto");
	validarForm("frm-producto");
		
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
			var cambiocodigo;
			tipo = 4;
			cambiocodigo = (codigo == $('#codigo').val() ) ? 0 : 1;
			dato_add = "&cambioCod="+ cambiocodigo;
		}
		datos = "tipo="+tipo+"&"+ $("#frm-producto").serialize() + dato_add;
		
		$.post( url_producto, datos, function(data)
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
			        			if(accion == 'insertar') modulo = "producto";
			   					else if(accion == 'modificar') modulo = "producto_edit";
			        			$("#contenidoDePagina").load("mensajes.php",{ mod:modulo});
			   					break;
			   
			   					case 2:
			     				$submit.after(warning_error("El numero de codigo ya existe, por favor ingrese otro.", 1));
			   					break;
		   					}
						}
			   },700);
}

function mostrarListado()
{
	crearTabla("listadoProducto", 0, "desc");
	appendLoadingBig();
	 
	 setTimeout(function()
	 			{
		 			mostrarCapaListado();
		        },1000)
}

function accionProducto(id,accion, elemento)
{
	var tipo = (accion == 1 || accion == 2) ? 3 : 5;
	var fila = null;
	if(! elemento) var elemento = null;
	else fila = elemento.parentNode.parentNode;
		
	accionUsuario({url:url_producto, datos: { tipo:tipo, id:id, accion:accion, estado:2 }, fila:fila})
}

function iniciarCamposEditar(datos)
{
	codigo = datos.codigo;
	document.getElementById('idProducto').value = datos.id;
	document.getElementById('nombres').value = datos.nombre;
	document.getElementById('codigo').value = datos.codigo;
	document.getElementById('descripcion').value = datos.descripcion;
	document.getElementById('fabricante').value = datos.fabricante;
	document.getElementById('stock').value = datos.stock;
	document.getElementById('valorUnitario').value = datos.valor_unitario;
	
	llenarCombo('unidadMedida', 'unidadMedida', datos.idunidadmedida)
}
