
<html>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<head>
    
    <link type="text/css" rel="stylesheet" href="../css/estilos_formularios.css" />
    <script type="text/javascript" src="../include/js/funciones.js"></script>
    <script type="text/javascript" src="../include/js/venta.js"></script>
     
</head>

<!--<body>-->

   	<!-- capa del encabezado de pagina-->
	<div id="encabezadoDePaginaInicio">
    	<h1>ESTADISTICA DE VENTA</h1>
        <p>Reporte grafico anual de venta.</p>
    </div>
    
    <!-- capa del contenedor de pagina-->
    <div id="contenedorInicio">
    
    	<!-- capa del contenedor de etiqueta-->
    	<div id="contenedorEtiqueta" style="margin-left:29px;">
    		<div id="tituloDeEtiqueta">
            	Grafico de barras
            </div>
        </div>
        
    	<!-- capa del contenido de pagina-->
    	<div id="contenidoDePaginaInicio" style="width:1052px; margin:0px auto;">
        	<form id="frm-grafico-venta" class="form" style="margin-bottom:28px;" onSubmit="graficoVenta(event)">
            <!--<form id="frm-grafico-venta" class="form" style="min-height:350px;" onSubmit="graficoVenta(event)">-->
            	<div class="field">
                <label style="width:478px;">Año:
                <span class="field-help">*</span>
                </label>
                <select id="anio" title="Año" style="width:83px; margin-bottom:12px;">
                	<script>llenarCombo('anio', 'anio')</script>
            	</select>               
            	</div>
            	<!-------------------------------------------------------------------------------------------------------------------->
            	<input type="submit" class="button" value="Generar Grafico"  title="Generar Grafico" />
                 <div id="cargar-grafico" style="margin-top:1em; text-align:center;"></div> 
            </form>
             <script>graficoVenta()
       		 </script>
           
        </div>
        
         
    </div>
  
  
    
<!--</body>-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</html>
<!-------------------------------------------------------------------------------------------------------------------------------->