<?php
$pathGraphic="../include/libs/fusionChart/Column3D.swf";//ruta del archivo swf para el tipo de grafico

function escapeXML($strItem, $forDataURL) {
	if ($forDataURL) {
		$strItem = str_replace("'","&apos;", $strItem);        
	} else {
		$findStr = array("%", "'", "&", "<", ">");
		$repStr  = array("%25", "%26apos;", "%26", "&lt;", "&gt;");
		$strItem = str_replace($findStr, $repStr, $strItem);        
	}
    $findStr = array("<", ">");
    $repStr  = array("&lt;", "&gt;");
    $strItem = str_replace($findStr, $repStr, $strItem);        
	return $strItem;
}

function obtenerPaleta() {
	return (((!isset($_SESSION['palette'])) || ($_SESSION['palette']=="")) ? "2" : $_SESSION['palette']);
}

function obtenerEstadoAnimacion() {
	return (($_SESSION['animation']<>"0") ? "1" : "0");
}

function obtenerColorFuente() {
    return "666666";
}

//funcion para establecer los anchos de un grafico, zoom->determina cuando la vista del reporte se realiza de forma ampliada
/*function set_width_graphic($zoom){
	if($zoom){
		$width=850;
	    $height=550; 
	}else{
		$width=510; 
        $height=400;
	}
	return array("w"=>$width,"h"=>$height);
}*/
//funcion que muestra un mensaje cuando se intenta generar un grafico que no ha hallado datos
function no_graphic(){
	echo "<br/><br />No se encontraron datos para generar el Gráfico.<br />Por favor utilice otros criterios para la gráfica.";
}

function getNombreMes($mes){
	
	switch(intval($mes)){
		case 1:
			return "Enero";
		case 2:
			return "Febrero";
		case 3:
			return "Marzo";	
		case 4:
			return "Abril";
		case 5:
			return "Mayo";
		case 6:
			return "Junio";
		case 7:
			return "Julio";
		case 8:
			return "Agosto";
		case 9:
			return "Septiembre";
		case 10:
			return "Octubre";
		case 11:
			return "Noviembre";
		case 12:
			return "Diciembre";
		
	}
}

?>