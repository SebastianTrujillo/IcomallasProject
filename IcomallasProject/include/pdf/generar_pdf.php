<?php

require_once('../libs/fpdf/formatoPDF.php');
require_once('../ventas.class.php');

$conn->abrirConexion();
if($conn->link == NULL){
	echo "Conexion Fallo!!";
	exit();
}
$ven = new Venta; 
$ven->seleccionarVenta(1,$_GET['venta']); 
$ven->seleccionarDetalle($_GET['venta']);
$datos = $ven->getListado();
$datos = $datos[0];
$detalle = $ven->getDetalle(); 
if($datos == NULL){
	echo "Malooooo..queriendo trolliar y todo." ;
	exit();
} 
$conn->cerrarConexion();

$pdf=new PDF('L','mm','Letter'); // vertical, milimetros y tamaño
$pdf->Open();
$pdf->AddPage(); // agregamos la pagina
$pdf->getMargins(); // definimos los margenes en este caso estan en milimetros
$pdf->Ln(); // dejamos un pequeño espacio de 10 milimetros


///////////////////////////////////////////
$pdf->Cell(152);
$pdf->Cell(0,6,"ICOMALLAS S.A.",0,1);
$pdf->Ln(0);
$pdf->Cell(152);
$pdf->Cell(0,6,"NIT: 805007404-4",0,1);
$pdf->Ln(0);
$pdf->Cell(152);
$pdf->Cell(0,6,"CR 1 # 16-102 CALI",0,1);
$pdf->Ln(0);
$pdf->Cell(152);
$pdf->Cell(0,6,"PBX: 889017",0,1);
$pdf->Ln(0);
$pdf->Cell(152);
$pdf->Cell(0,6,"FAX: 8842111",0,1);
///////////////////////////////////////////
$pdf->Ln(6);
$pdf->titleReport('FACTURA DE VENTA N°. '.$_GET['venta']);
///////////////////////////////////////////								 
$pdf->Cell(0,6,utf8_decode('Fecha: '.$datos["fecha"]),0,1);
$pdf->Cell(0,6,utf8_decode('Vendedor: '.$datos["empleado"]),0,1);
$pdf->Ln(6);
///////////////////////////////////////////	
$pdf->Cell(0,6,utf8_decode('Cliente: '.$datos["cliente"]),0,1);
$pdf->Cell(0,6,utf8_decode('Documento: '.$datos["doccliente"]),0,1);
$pdf->Cell(0,6,utf8_decode('Tipo Documento: '.$datos["tipocliente"]),0,1);
$pdf->Cell(0,6,utf8_decode('Telefono: '.$datos["telcliente"]),0,1);
$pdf->Cell(0,6,utf8_decode('Dirección: '.$datos["dircliente"]),0,1);
$pdf->Cell(0,6,utf8_decode('Ciudad: '.$datos["ciudadcliente"]),0,1);

$pdf->Ln(5);

$widths=array(30,70,40,20,40);
$pdf->SetWidths($widths); 
$pdf->Row(array('Codigo','Producto','Precio','Cantidad','SubTotal'),true,$pdf->getColorHeaderRow(),true); // creamos nuestra fila 
/*Valor Parcial*/

for($i=0; $i<count($detalle); $i++){
	
	$color=$pdf->getColorRow($i);
	$pdf->Row(array($detalle[$i]["idproducto"],$detalle[$i]["producto"],$detalle[$i]["precio"],
					$detalle[$i]["cantidad"],$detalle[$i]["subtotal"]),true,$color,false);
}

$pdf->Ln(5);

$pdf->Cell(0,6,utf8_decode('Total Bruto: '.$datos["totalbruto"]),0,1);
$pdf->Cell(0,6,utf8_decode('Impuesto: '.$datos["impuesto"]),0,1);
$pdf->Cell(0,6,utf8_decode('Total Neto: '.$datos["valorNeto"]),0,1);

$widthEnd=array_sum($widths);
$pdf->Cell($widthEnd,0,'','T');
$pdf->Ln(5);
$pdf->Cell(120);
$pdf->Output();

?>