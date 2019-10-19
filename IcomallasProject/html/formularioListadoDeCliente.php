<!-------------------------------------------------------------------------------------------------------------------------------->
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
    <script type="text/javascript" src="../include/js/cliente.js"></script>
 
</head>

<body>

	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>LISTADO DE CLIENTES</h1>
    	<p>Consulte un dato en particular.</p>        
	</div>

	<!-- capa de listado de clientes-->
	<div id="tablaListado">

    	<table class="display" id="listadoCliente">
        	<thead>
            	<tr>
                	<td width="30" ><b>ID</b></td>
                	<td width="160"><b>Nombre</b></td>
                	<td width="80"><b>Documento</b></td>
                	<td width="110"><b>Tipo De Documento</b></td>
                	<td width="70"><b>Teléfono</b></td>
                	<td width="160"><b>Dirección</b></td>
                	<td width="70"><b>Acción</b></td>
            	</tr>
        	</thead>
        	<?php
            	for($i=0; $i < count($respuesta); $i++)
				{
					$id = $respuesta[$i]["id"];
                	echo '<tr>
                        	<td>'.$id.'</td>
                        	<td>'.$respuesta[$i]["nombreCompleto"].'</td>
                        	<td>'.$respuesta[$i]["numeroDocumento"].'</td>
                        	<td>'.$respuesta[$i]["tipoDocumento"].'</td>
                        	<td>'.$respuesta[$i]["telefono"].'</td>
                        	<td>'.$respuesta[$i]["direccion"].'</td>';
			?>
                        	<td>
                        		<span class="accion-usuario" title="Consultar Cliente" onClick="accionCliente('<?php echo $id ?>', '2')">
                           			<img src="../images/consultar.png" />
                         		</span>
                        		<span class="accion-usuario" title="Editar Cliente" onClick="accionCliente('<?php echo $id ?>', '1')">
                           			<img src="../images/document.png" />
                         		</span>
                         		<span class="accion-usuario" title="Eliminar Cliente" onClick="accionCliente('<?php echo $id ?>', '3', this)">
                           			<img src="../images/delete3.png" />
                         		</span>
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