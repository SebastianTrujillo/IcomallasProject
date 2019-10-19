<?php
	include_once "../include/seguridad.php";
?>

<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>

    <link type="text/css" rel="stylesheet" href="../include/libs/datatable/table.css" />
    <link type="text/css" rel="stylesheet" href="../include/libs/datatable/table_jui.css" />
    <link type="text/css" rel="stylesheet" href="../css/estilos_listados.css" />
    <script type="text/javascript" src="../include/libs/jquery/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="../include/libs/datatable/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/producto.js"></script>
 
</head>

<body>

	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>LISTADO DE PRODUCTOS</h1>
        <p>Consulte un dato en particular.</p>        
    </div>
    
    <!-- capa de listado de clientes-->
    <div id="tablaListado">
    
    	<table class="display" id="listadoProducto">
        <thead>
            <tr>
                <td width="30" ><b>ID</b></td>
                <td width="160"><b>Nombre</b></td>
                <td width="80"><b>Codigo</b></td>
                <td width="80"><b>Stock</b></td>
                <td width="90"><b>Unidad De Medida</b></td>
                <td width="80"><b>Valor Unitario</b></td>
                <td width="70"><b>Acción</b></td>
            </tr>
        </thead>
        <?php
            for($i=0; $i < count($respuesta); $i++)
			{
				$id = $respuesta[$i]["id"];
                echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$respuesta[$i]["nombre"].'</td>
                        <td>'.$respuesta[$i]["codigo"].'</td>
                        <td>'.$respuesta[$i]["stock"].'</td>
                        <td>'.$respuesta[$i]["tipoUnidadMedida"].'</td>
                        <td>'.$respuesta[$i]["valor_unitario"].'</td>';
		?>
                        <td>
                        	<span class="accion-usuario" title="Consultar Producto" onClick="accionProducto('<?php echo $id ?>', '2')">
                           		<img src="../images/consultar.png" />
                         	</span>
                       <?php if($permiso == 1 || $permiso == 2){ ?>
                        	<span class="accion-usuario" title="Editar Producto" onClick="accionProducto('<?php echo $id ?>', '1')">
                           		<img src="../images/document.png" />
                         	</span>
                         	<span class="accion-usuario" title="Eliminar Producto" onClick="accionProducto('<?php echo $id ?>', '3', this)">
                           		<img src="../images/delete3.png" />
                         	</span>
                    <?php   } ?>
                        </td>
                     </tr>
        <?php	}
        ?>
        
    </table>
    
    <script type="text/javascript">
        mostrarListado();
    </script>
        
    </div>	
    
</body>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->