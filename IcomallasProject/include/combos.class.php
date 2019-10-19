<?php

require_once("sql.class.php");

//Clase para llenar los selects de la aplicación.
class combos
{	
	private $datos=NULL;
	private $html = "";
	
	public function llenarCombo($sql,$valor,$texto,$esvacio=true) 
	{
		$ejecuto = SQL::execQuery($sql);
		
		if(! $ejecuto)
		{			
			$this->html = "";
			return;
		}
		if($esvacio) $this->html = "<option value=''>Seleccione</option>";
		while($fila = SQL::fetchArray())
		{			
			$this->html.= '<option value="'.$fila[$valor].'">'.$fila[$texto].'</option>';
		}
	}
	
	public function combosCiudad()
	{
		$sql="select * from tb_ciudad";
		$this->llenarCombo($sql,"id_ciudad","ciudad");
	}
	
	public function combosTipoDocumento()
	{
		$sql="select * from tb_tipo_documento";
		$this->llenarCombo($sql,"id_tipoDocumento","tipoDocumento");
		
	}
	
	public function combosTipoCargo()
	{
		$sql="select * from tb_tipo_cargo";
		$this->llenarCombo($sql,"id_tipoCargo","tipoCargo");
		
	}
	
	public function combosTipoPermiso()
	{
		$sql="select * from tb_tipo_permiso";
		$this->llenarCombo($sql,"id_tipoPermiso","tipoPermiso");
		
	}
	
	public function combosUnidadMedida()
	{
		$sql="select * from tb_unidad_medida";
		$this->llenarCombo($sql,"id_unidad_medida","tipoUnidadMedida");
		
	}
	
	public function getDatos()
	{		
		return $this->html;
	}
	
	function comboAnios()
	{
		date_default_timezone_set("America/Bogota");
		$anio = date ("Y");
		$fin = $anio+10;
		while($anio < $fin)
		{
			echo "<option value='$anio'>$anio</option>\n";
			$anio++;
		}
    }
}

?>