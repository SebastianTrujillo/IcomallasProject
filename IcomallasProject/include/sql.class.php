<?php

require_once 'connect.php';
//objeto global de la clase Connection
$conn = new Conexion; 

class SQL
{
	private static $results = NULL;
	private static $link = NULL;
	
	static function execQuery($query)
	{
		global $conn;
		if($conn->link == NULL) return false;
		$all_exec=false;
				
		if(is_string($query))
		{
			self::$results=mysql_query($query);			 
			if(self::$results)$all_exec=true; 
			else $all_exec=false;
		}
		else return $all_exec;
		 
		return $all_exec;
	}
	 
	static function startTransaction()
	{
		mysql_query("BEGIN");//inicio la transaccion		 
	}
	 
	static function endTransaction($is_query_exec)
	{
		if($is_query_exec)$sql = "COMMIT";//terminamos la transaccion
		else $sql = "ROLLBACK";//deshacemos la transaccion
		mysql_query($sql);
	}
	
	static function respuesta($ejecuto){//esta funcion es para comprobar 
	 									//si se ha ejecutado correctamente una query en la base de datos	 
		 if($ejecuto)return 1;//si se ejecuto correctamente mostrara perfect
		 else return -1;
	 }
		 
	static function fetchArray()
	{
		return mysql_fetch_array(self::$results);
	}
		 
	static function fetchRow()
	{
		return mysql_fetch_row(self::$results);
	}
	 
	static function numRows()
	{
		return mysql_num_rows(self::$results);
	}
	
	 static function singleColumn(){ //funcion que devuelve la primera columna de una unica fila, se usa para el caso de funciones booleanas
		 
		 $row=self::fetchRow();
		 return $row[0];
	 }
		 
	static function getResult()
	{
		return self::$results;
	}
}

?>