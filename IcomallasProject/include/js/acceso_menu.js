function cargarContenido(modulo,permiso)
{	
	$("#menuDePagina").load("menu/menu.php", { permiso:permiso});
	
	switch(modulo)
	{		
		case "registrarEmpleado":
			$("#contenidoDePagina").load("formularioRegistroDeEmpleado.php");
		break;
			
		case "consultarEmpleado":
		   $("#contenidoDePagina").load("../include/empleado_control.php", { tipo:2});
		break;	
				
		case "registrarUsuario":
			$("#contenidoDePagina").load("formularioRegistroDeUsuario.php");
		break;
		
		case "consultarUsuario":
		   $("#contenidoDePagina").load("../include/usuario_control.php", { tipo:2});
		break;
		
		case "registrarCliente":
			$("#contenidoDePagina").load("formularioRegistroDeCliente.php");
		break;
		
		case "consultarCliente":
		   $("#contenidoDePagina").load("../include/cliente_control.php", { tipo:2});
		break;
		
		case "registrarProducto":
			$("#contenidoDePagina").load("formularioRegistroDeProducto.php");
		break;
		
		case "consultarProducto":
			$("#contenidoDePagina").load("../include/producto_control.php", { tipo:2});
		break;
		
		case "registrarVenta":
			$("#contenidoDePagina").load("formularioRegistroDeVenta.php");
		break;
		
		case "consultarVenta":
			$("#contenidoDePagina").load("../include/venta_control.php", { tipo:2});
		break;
		
		case "estadisticaDeVenta":
			$("#contenidoDePagina").load("estadisticas.php");
		break;
		
		case "catalogo":
			$("#contenidoDePagina").load("catalogo.php");
		break;
				
		case "ayuda":
			$("#contenidoDePagina").load("ayuda.php");
		break;		
				
		case "inicio": default:
			$("#contenidoDePagina").load("inicio.php");
		break;
	}
	
}


function logOut(){
	window.location = "../include/logout.php";
}