<?php
//este reporte grafica el top 5 de los clientes que mas compraron en un respectivo año y/o mes
// archivos incluidos. Librerías PHP para poder graficar.
require_once "../libs/fusionChart/FusionCharts.php";
require_once "../libs/fusionChart/Functions.php";
require_once "../ventas.class.php";
$conn->abrirConexion();
	if($conn->link == NULL){
		echo "Conexion Fallo!!";
		exit();
}

$anio = $_POST['anio'];
$v = new Venta;

$v->ventasPorAnio($anio);

$c_data=$v->getListado();
$conn->cerrarConexion();
if( $c_data == NULL) {
	no_graphic();
	
	exit();
}
// $strXML: Para concatenar los parámetros finales para el gráfico.
$strXML = "";
$strXML .= "<chart caption = 'VENTAS REALIZADAS EN EL $anio' 
		formatNumberScale='0' numberPrefix='' bgColor='#F9F9F9' baseFontSize='10' showValues='1' xAxisName='Ventas'		 
		exportEnabled='1' exportFileName='graficoPedido' exportHandler='../include/libs/fusionChart/FCExporter.php' 
		exportAtClient='0' exportAction='download' >";
$i=0;		
while($i<count($c_data)){			  
	$strXML .= "<set label = '". getNombreMes($c_data[$i]["mes"])."' value ='".$c_data[$i]["total"]."' />";
	$i++;
}
// Cerramos la etiqueta "chart".
$strXML .= "</chart>";
echo renderChartHTML($pathGraphic, "",$strXML, "chart1Id", 530, 450, false);
sleep(1);
?>
