<?php
	include_once "../include/seguridad.php";
?>

<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    
    <link type="text/css" rel="stylesheet" href="../css/estilos_venta.css" />
    <link type="text/css" rel="stylesheet" href="../include/libs/jquery/css/jquery.css"/>
    <script type="text/javascript" src="../include/libs/jquery/jquery-ui-1.8.17.js"></script>
    <script type="text/javascript" src="../include/libs/jquery numeric/jquery.numeric.js"></script>
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/venta.js"></script>
    <script type="text/javascript"> validarNumericos()</script>
    <script type="text/javascript">iniciarForm()</script>
 
</head>



<!-- capa del encabezado de pagina-->
<div id="encabezadoDePaginaVenta">
    <h1>REGISTRAR VENTA</h1>
    <p>Diligencie el siguiente formulario.</p>
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
        <form id="frm-venta" class="form" onSubmit="enviarDatosVenta(event)">
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <div id="capaFecha">
            <div class="field">
                <input type="text" id="diaMesAnio" title="Fecha"/>
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
            
            <div class="field">
            <label for="numeroDeDocumento">Buscar Documento:
                <span class="field-help">
                    *
                </span>
            </label>
            <input type="text" name="numeroDeDocumento" id="cliente-buscar" maxlength="15" title="Buscar Documento" 
                  class="requerido positive-integer"/>   
             <input type="hidden" id="idcliente_venta" name="idcliente-venta" /> 
             <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $u["id"]; ?>"/> 
            </div>
            <div id="detalleCliente"></div>
            <div id="cliente-sel"></div>
        </div>        
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <div id="contenedorEtiquetaProducto">
            <div id="tituloDeEtiquetaProducto">
                Datos de producto
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------->
        <div id="producto">
            
            <div class="field">
            <label for="codigo">Buscar Codigo:
                <span class="field-help">
                    *
                </span>
            </label>
            <input type="text" name="codigo" id="codigo-buscar" maxlength="15" title="Buscar Codigo" class="requerido positive-integer"/>            	
            </div>
            <div id="detalleProducto">
                
               <div id="datos-procuto">
               
               </div>
                
                <div class="field">
                    
                        <label for="cantidad">Cantidad:
                        <span class="field-help">
                            *
                        </span>
                        </label>
                        <input type="text" name="cantidad" id="cantidadInput" maxlength="3" title="Cantidad" class="requerido positive-integer"/> 
                                      
                </div>
                
                <input type="button" class="button" value="Agregar Producto" title="Agregar Producto" onClick="seleccionarProducto()"/>
            </div>
        </div> 
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
             align="center" style="margin-bottom:12px; border-collapse:collapse;" id="tabla-detalle" class="table">
                <tr align="center">
                	<td width="20" class="columna-oculta">ID</td>
                    <td width="80" style="background-color:#333; color:#FFF; font-weight:bold;">Código</td>
                    <td width="100" style="background-color:#333; color:#FFF; font-weight:bold;">Producto</td> 
                    <td width="20" style="background-color:#333; color:#FFF; font-weight:bold;">Cantidad</td>
                    <td width="60" style="background-color:#333; color:#FFF; font-weight:bold;">Stock Parcial</td>
                    <td width="80" style="background-color:#333; color:#FFF; font-weight:bold;">Valor Unidad</td>
                    <td width="80" style="background-color:#333; color:#FFF; font-weight:bold;">SubTotal</td>
                    <td width="20" style="background-color:#333; color:#FFF; font-weight:bold;">Borrar</td>
                </tr>
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
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------->
        <input type="submit" class="button" value="Registrar Venta" title="Registrar Venta"/>
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