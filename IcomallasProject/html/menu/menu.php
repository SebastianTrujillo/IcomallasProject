<?php $vista = (isset($_POST["permiso"])) ? $_POST["permiso"] : NULL?>

<!-------------------------------------------------------------------------------------------------------------------------------->
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <!--<script type="text/javascript">
		$(function()
		{
			$('#navigation a').stop().animate({'marginLeft':'-85px'},1000);
			$('#navigation > li').hover
			(
				function(){$('a',$(this)).stop().animate({'marginLeft':'-2px'},200);},
				function(){$('a',$(this)).stop().animate({'marginLeft':'-85px'},200);}
			);
		});
	</script>--> 
</head>

<body>

	<!-- menu lateral-->
	<!--<ul id="navigation">
		<li class="imagen1"><a href="?modulo=ayuda" title="Ayuda"></a></li>
		<li class="imagen2"><a href="javascript:logOut()" title="Cerrar Sesion"></a></li>
	</ul>-->
    
    <div id="menu">
        <ul class="menu" id='menuPrincipal'>
        	<!------------------------------------------------------------------------------------------------------------------->
        	<li>
            	<a href="?modulo=inicio" class="parent"><span id='Inicio' title="Inicio">Inicio</span></a>
            </li>  
            <!-------------------------------------------------------------------------------------------------------------------> 
           <?php if($vista==1){ ?>
            <li>
               	<a href="#" ><span id='Empleado' title="Empleado">Empleado</span></a>
                <div><ul>
                   	<li><a href="?modulo=registrarEmpleado"><span title="Registrar Empleado">Registrar Empleado</span></a></li>
                   	<li><a href="?modulo=consultarEmpleado"><span title="Listado De Empleados">Listado De Empleados</span></a></li>
               	</ul></div>
            </li> 
            
            <!-------------------------------------------------------------------------------------------------------------------> 
            <li>
               	<a href="#" ><span id='Usuarioo' title="Usuario">Usuario</span></a>
                <div><ul>
                   	<li><a href="?modulo=registrarUsuario"><span title="Registrar Usuario">Registrar Usuario</span></a></li>
                   	<li><a href="?modulo=consultarUsuario"><span title="Listado De Usuarios">Listado De Usuarios</span></a></li>
               	</ul></div>
            </li> 
            <!------------------------------------------------------------------------------------------------------------------->
           <?php }?>
            <?php if($vista==1 || $vista == 2){ ?>
            <li>
                <a href="#" ><span id='Clientes' title="Clientes">Clientes</span></a>
                <div><ul>
                    <li><a href="?modulo=registrarCliente"><span title="Registrar Cliente">Registrar Cliente</span></a></li>
                    <li><a href="?modulo=consultarCliente"><span title="Listado De Clientes">Listado De Clientes</span></a></li>
                </ul></div>
            </li>
        <?php }?>
            <!-------------------------------------------------------------------------------------------------------------------> 
            <li>
               	<a href="#" ><span id='Productos' title="Productos">Productos</span></a>
                <div><ul>
                 <?php if($vista==1 || $vista == 2){ ?>
                   	<li><a href="?modulo=registrarProducto"><span title="Registrar Producto">Registrar Producto</span></a></li>
                 <?php }?>
                    <li><a href="?modulo=consultarProducto"><span title="Listado De Productos">Listado De Productos</span></a></li>
                </ul></div>
                
            </li>
            
            <!------------------------------------------------------------------------------------------------------------------->    
           <?php if($vista==1 || $vista == 2){ ?>    
            <li>
                <a href="#" ><span id='Ventas' title="Ventas">Ventas</span></a>
                <div><ul>
                    <li><a href="?modulo=registrarVenta"><span title="Registrar Venta">Registrar Venta</span></a></li>
                    <li><a href="?modulo=consultarVenta"><span title="Listado De Ventas">Listado De Ventas</span></a></li>
                </ul></div>
            </li>
            <?php }?>
            
            <!------------------------------------------------------------------------------------------------------------------->    
            <?php if($vista==1){ ?>      
            <li>
            	<a href="#"><span id='Estadisticas' title="Estadisticas">Estadisticas</span></a>
                <div><ul>
                    <li><a href="?modulo=estadisticaDeVenta"><span title="Estadistica De Venta">Estadistica De Venta</span></a></li>
                </ul></div>
            </li>
            <?php }?>
            <!-------------------------------------------------------------------------------------------------------------------> 
            <!--<li>
            	<a href="#"><span id='Agenda' title="Agenda">Agenda</span></a>
                <div><ul>
                    <li><a href="?modulo=registrarAgenda"><span title="Registrar Agenda">Registrar Agenda</span></a></li>
                    <li><a href="?modulo=consultarAgenda"><span title="Consultar Agenda">Consultar Agenda</span></a></li>
                </ul></div>
            </li>-->
            <!------------------------------------------------------------------------------------------------------------------->	
            <!--<li>
            	<a href="?modulo=catalogo" class="parent"><span id='Catalogo' title="Catalogo">Catalogo</span></a>
            </li> -->
            <li>
            	<a href="#"><span id='Catalogo' title="Catalogo">Catalogo</span></a>
                <div><ul>
                    <li><a href="?modulo=catalogo"><span title="Catalogo De Venta">Catalogo De Venta</span></a></li>
                </ul></div>
            </li>
            <!------------------------------------------------------------------------------------------------------------------->  
            <li>
            	<a></a>
            </li>
            
        </ul>
    </div>
</body>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->
