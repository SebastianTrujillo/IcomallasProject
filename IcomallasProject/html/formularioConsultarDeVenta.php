<!-------------------------------------------------------------------------------------------------------------------------------->
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    
    <link type="text/css" rel="stylesheet" href="../css/estilos_venta.css" />
    <!--<link type="text/css" rel="stylesheet" href="../include/libs/jquery/css/jquery.css"/>-->
   <!-- <script type="text/javascript" src="../include/libs/jquery/jquery-ui-1.8.17.js"></script>-->
    <script type="text/javascript" src="../include/libs/jquery numeric/jquery.numeric.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/venta.js"></script>
    <script type="text/javascript"> validarNumericos()</script>
    <script type="text/javascript">
    	var datos = <?php echo json_encode($respuesta) ?>;
    	verCampos(datos);
    </script>
 
</head>



<!-- capa del encabezado de pagina-->
<div id="encabezadoDePaginaVenta">
    <h1>CONSULTAR VENTA</h1>
    <p>Consulte el siguiente formulario.</p>
</div>

<!-- Atras/Adelante-->
 	<div id="atrasAdelante">
    	<img id="atras" src="../images/atras.png" title="Atrás" onClick="window.location = '?modulo=consultarVenta'" />
    </div>

<!-- capa del contenedor de pagina-->
<div id="contenedorVenta">

    <!-- capa del contenedor de etiqueta-->
    <div id="contenedorEtiqueta">
        <div id="tituloDeEtiqueta">
            Datos de venta
        </div>
    </div>
    
    <!-- capa del contenido de pagina-->
    <div id="contenidoDePaginaVenta">
        <form id="frm-venta" class="form">
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <div id="capaFecha">
            <div class="field">
                <input type="text" id="fecha" />
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <div id="contenedorEtiquetaCliente">
            <div id="tituloDeEtiquetaCliente">
                Datos de cliente
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------->                        
        <div id="cliente">
        
        
            	<table width="966px" align="center" class="tabla-ver-cliente" cellspacing="0">
					<tr>
						<td width="483px">
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <div class="field">
                            <label style="width:200px;">Nombre:</label>
                			<span style="margin-left:8px;" id="nombre"></span>  
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
            			</td>
                        <td width="483px">
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <div class="field">
                            <label style="width:200px;" >Telefono:</label>
                			<span style="margin-left:8px;" id="tel">0.00</span>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
                        </td>
					</tr>
                    <tr>
						<td width="483px">
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <div class="field">
                            <label style="width:200px;">N° De Documento:</label>
                			<span style="margin-left:8px;" id="documento">0.00</span>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
            			</td>
                        <td width="483px">
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <div class="field">
                            <label style="width:200px;">Direccion:</label>
                			<span style="margin-left:8px;" id="direccion">0.00</span>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
                        </td>
					</tr>
                    <tr>
						<td width="483px" style="border-bottom:none;">
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <div class="field">
                            <label style="width:200px;">Tipo De Documento:</label>
                			<span style="margin-left:8px;" id="tipodoc">0.00</span>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
            			</td>
                        <td width="483px" style="border-bottom:none;">
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <div class="field">
                            <label style="width:200px;">Ciudad:</label>
                			<span style="margin-left:8px;" id="ciudad">0.00</span>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
                        </td>
					</tr>
				</table>
            </div>        
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <div id="contenedorEtiquetaDetalle">
            <div id="tituloDeEtiquetaDetalle">
                Detalle de venta
            </div>
        </div>
        
        <div id="detalle">
        <div style="background-color:#FFF; width:966px; margin:0px auto;">
            <table width="966px"  border="1" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" 
             align="center" style="margin-bottom:12px; border-collapse:collapse;" id="tabla-detalle">
                <tr align="center">
                	<td width="20" style="background-color:#333; color:#FFF; font-weight:bold;">Item</td>
                    <td width="80" style="background-color:#333; color:#FFF; font-weight:bold;">Código</td>
                    <td width="100" style="background-color:#333; color:#FFF; font-weight:bold;">Producto</td> 
                    <td width="20" style="background-color:#333; color:#FFF; font-weight:bold;">Cantidad</td>
                    <td width="80" style="background-color:#333; color:#FFF; font-weight:bold;">Valor Unidad</td>
                    <td width="80" style="background-color:#333; color:#FFF; font-weight:bold;">SubTotal</td>
                </tr>
                <?php
					for($i=0;$i<count($detalle);$i++){
						echo '<tr class="fila">
								<td>'.($i+1).'</td>
								  <td>'.$detalle[$i]["idproducto"].'</td>
								  <td>'.$detalle[$i]["producto"].'</td>
								  <td>'.$detalle[$i]["cantidad"].'</td>
								  <td>'.$detalle[$i]["precio"].'</td>
								  <td>'.$detalle[$i]["subtotal"].'</td>
							  </tr>';
					}
				?>
                
            </table>
            </div>
            <div id="area-valor-total">
                <table width="966px" align="center" style="margin-bottom:-4px;">
                <tr>
                    <td align="right">
                    <div class="field">
                        <label>Total Bruto:</label>
                        <span id="totalBruto">0.00</span>               
                    </div>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                    <div class="field">
                        <label>Impuesto:</label>
                        <span id="valorImpuesto">0.00</span>               
                    </div>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                    <div class="field">
                        <label>Valor Neto:</label>
                        <span id="valorNeto">0.00</span>
                    </div>
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <input type="button" value="Generar PDF" class="button" title="Generar PDF" onClick="generarPDF('<?php echo $respuesta["id"];?>')" />
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        
        </form> 
    </div>
</div>

<!-- capa del pie de pagina-->
<div id="pieDePaginaVenta">
</div>	
    


<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->