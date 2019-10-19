function mensaje(modulo)
{
	var titulo, texto,a1=null, a2, at1=null, at2;
	
	switch(modulo)
	{
		case "empleado":
			titulo = "EMPLEADO REGISTRADO";
			texto = "El empleado ha sido agregado con éxito.";
			a1 = "registrarEmpleado";
			a2 = "consultarEmpleado";
			at1 = "Registrar otro empleado";
			at2 = "Consultar el listado de empleados";
		break;
		
		case "empleado_edit":
			titulo = "EMPLEADO ACTUALIZADO";
			texto = "Los datos del empleado han sido actualizados con éxito.";
			a2 = "consultarEmpleado";
			at2 = "Consultar el listado de empleados";
		break;
		
		case "usuario":
			titulo = "USUARIO REGISTRADO";
			texto = "El usuario ha sido agregado con éxito.";
			a1 = "registrarUsuario";
			a2 = "consultarUsuario";
			at1 = "Registrar otro usuario";
			at2 = "Consultar el listado de usuarios";
		break;
		
		case "usuario_edit":
			titulo = "USUARIO ACTUALIZADO";
			texto = "Los datos del usuario han sido actualizados con éxito.";
			a2 = "consultarUsuario";
			at2 = "Consultar el listado de usuarios";
		break;
		
		case "cliente":
			titulo = "CLIENTE REGISTRADO";
			texto = "El cliente ha sido agregado con éxito.";
			a1 = "registrarCliente";
			a2 = "consultarCliente";
			at1 = "Registrar otro cliente";
			at2 = "Consultar el listado de clientes";
		break;
		
		case "cliente_edit":
			titulo = "CLIENTE ACTUALIZADO";
			texto = "Los datos del cliente han sido actualizados con éxito.";
			a2 = "consultarCliente";
			at2 = "Consultar el listado de clientes";
		break;
				
		case "producto":
			titulo = "PRODUCTO REGISTRADO";
			texto = "El producto ha sido agregado con éxito.";
			a1 = "registrarProducto";
			a2 = "consultarProducto";
			at1 = "Registrar otro producto";
			at2 = "Consultar el listado de productos";
		break;
		
		case "producto_edit":
			titulo = "PRODUCTO ACTUALIZADO";
			texto = "Los datos del producto han sido actualizados con éxito.";
			a2 = "consultarProducto";
			at2 = "Consultar el listado de productos";
		break;
		
		case "venta":
			titulo = "VENTA REGISTRADA";
			texto = "La venta ha sido agregado con éxito.";
			a1 = "registrarVenta";
			a2 = "consultarVenta";
			at1 = "Registrar otra venta";
			at2 = "Consultar el listado de ventas";
		break;
				  
		default: return;
	}
	
	$("#texto-estatico h2").html(titulo);
	$("#texto").html(texto);
	if(a1 != null && at1 != null )
	{
		$(".opcion-modulo a").eq(0).attr({ href:"?modulo="+a1});
		$(".opcion-modulo a").eq(0).html(at1);
	}
	$(".opcion-modulo a").eq(1).attr({ href:"?modulo="+a2});
	$(".opcion-modulo a").eq(1).html(at2)
}