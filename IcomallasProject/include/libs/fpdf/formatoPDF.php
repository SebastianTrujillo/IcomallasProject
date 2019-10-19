<?php
require_once('fpdf.php');

class PDF extends FPDF
{
var$widths;
var$aligns;

public $textoFooter;
 
function SetWidths($w)
{
  $this->widths=$w;
}
 
function SetAligns($a)
{
  $this->aligns=$a;
}
 
function Row($data,$fill,$color,$is_header)
{
  $nb=0;
  for($i=0;$i<count($data);$i++)
    $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
  $h=6*$nb;
  $this->CheckPageBreak($h);
  if($fill){
	  $this->SetFillColor($color[0],$color[1],$color[2]);
  }  
  if($is_header){
	  //Colores, ancho de línea y fuente en negrita
	$this->SetFillColor(102,102,102);
	/*$this->SetFillColor(103,194,254);*/
	$this->SetTextColor(255);
	$this->SetDrawColor(0,0,0);
	/*$this->SetDrawColor(69,143,254);*/
	$this->SetLineWidth(.3);
	$this->SetFont('Arial','B','10');
  }
  else{
	$this->SetTextColor(0);
	$this->SetFont('Arial','','10');
  }
  for($i=0;$i<count($data);$i++)
  {
    $w=$this->widths[$i];
    $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
    $x=$this->GetX();
    $y=$this->GetY();
    $this->Rect($x,$y,$w,$h,'DF');
	if($is_header){
		//$border='LR';	
		$a='C';
	}
	/*else{ 
		$border='LR';
	}*/
	
    $this->MultiCell($w,6, utf8_decode($data[$i]),'LR',$a,$fill);
    $this->SetXY($x+$w,$y);
  }
  $this->Ln($h);
}
 
function CheckPageBreak($h)
{
  if($this->GetY()+$h>$this->PageBreakTrigger)
    $this->AddPage($this->CurOrientation);
}
 
function NbLines($w,$txt)
{
  $cw=&$this->CurrentFont['cw'];
  if($w==0)
    $w=$this->w-$this->rMargin-$this->x;
  $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
  $s=str_replace("\r",'',$txt);
  $nb=strlen($s);
  if($nb>0 and$s[$nb-1]=="\n")
    $nb--;
  $sep=-1;
  $i=0;
  $j=0;
  $l=0;
  $nl=1;
  while($i<$nb)
  {
    $c=$s[$i];
    if($c=="\n")
    {
      $i++;
      $sep=-1;
      $j=$i;
      $l=0;
      $nl++;
      continue;
    }
    if($c==' ')
      $sep=$i;
    $l+=$cw[$c];
    if($l>$wmax)
    {
      if($sep==-1)
      {
        if($i==$j)
          $i++;
      }
      else
        $i=$sep+1;
      $sep=-1;
      $j=$i;
      $l=0;
      $nl++;
    }
    else
      $i++;
  }
  return$nl;
}
 
/*function Header()
{
  $this->SetFont('Arial','',14);
  $this->Text(30,30,'SOLUTEL JR',0,'C', 0);
  $this->Ln(30);
}*/
function Header()
{
    //Logo
   // $this->Image("../images/solutelJR.PNG" , 10 ,8, 80 , 20 , "PNG" ,"http://www.mipagina.com");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
	
	
	/*modificado--------
    $this->Cell(100);
    //Título
    $this->Cell(60,10,utf8_decode('ICOMALLAS S.A'),0,0,'C');	 //aqui modifica el titulo del documento pdf
    //Salto de línea
    $this->Ln(15);
	modificado-------*/
		
	$this->Image('Icomallas.jpg',30,10,80); //Logo
	
	/*$this->Cell(150); //Movernos a la derecha
	$this->Cell(60,24,'FACTURA DE VENTA',1,0,'C'); //Título
	$this->Ln(20); //Salto de línea*/
	
}


function Footer()
{
  $this->SetY(-15);
  $this->SetFont('Arial','B',8);  
  $this->Cell(100,10,utf8_decode($this->textoFooter),0,0,'L');
}


function createTable($header,$data,$keyName,$widths)
{
	//Colores, ancho de línea y fuente en negrita
	
	$this->SetFillColor(103,194,254);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	//Cabecera
	$columnCount=count($header);
	for($i=0;$i<$columnCount;$i++)
	$this->Cell($widths[$i],7,$header[$i],1,0,'C',1);
	$this->Ln();
	//Restauración de colores y fuentes
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Datos
	$fill;
	for($j=0;$j<count($data);$j++){
		if($j%2==0)$fill=false;
		else $fill=true;
		for($k=0;$k<$columnCount;$k++){
			$this->Cell($widths[$k],6,$data[$j][$keyName[$k]],'LR',0,'L',$fill);
		}		
		$this->Ln();
	}
	$fill=true;	 
	$widthEnd=array_sum($widths);
	$this->Cell($widthEnd,0,'','T');
}

function titleReport($title){
	$this->SetFont('Arial','B',12); 
	$this->SetTextColor(0,0,0);
	$this->Cell(0,6,utf8_decode($title),0,1,'C');
	//Restauración de colores y fuentes
	$this->SetTextColor(0);
	$this->SetFont('');
	$this->Ln(5);
}
function getColorRow($index){//asinamos el color a cada fila segun el indice de la misma, para que cada indice par de fila tenga un color 
	if($index%2==0){		
		$color=array(255,255,208);
		/*$color=array(224,235,255);*/
	}
	else{
		  $color=array(249,249,249);
		  /*$color=array(255,255,204);*/
	}
	return $color;
}
function getColorHeaderRow(){
	$colorHeaderRow=array(103,194,254);
	return $colorHeaderRow;
}
function getMargins(){
	$this->SetMargins(30,20,30); 
}

}
?>