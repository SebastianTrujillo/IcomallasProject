<?php
 
class Conexion
{
	private $host="localhost";
	private $user="root";
	private $pass="1054300";
	private $db="bd_icomallas";
	
	public $link = NULL;	
		 
	public function abrirConexion()
	{
		$this->link = mysql_connect($this->host,$this->user,$this->pass);
			
		if($this->link)
		{
			mysql_query("SET NAMES 'utf8'",$this->link);//cambio a codificacion utf8 		
		    $db_exists=mysql_select_db($this->db,$this->link);			
			if(! $db_exists) $this->link = NULL;
	    }
	    else $this->link = NULL; 	 
	 }
	 
	 public function cerrarConexion()
	 {
		 mysql_close($this->link);
	 }		
} 
 
?>