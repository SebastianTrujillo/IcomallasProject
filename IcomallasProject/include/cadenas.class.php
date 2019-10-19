<?php

class Cadenas
{
	static function vaccinateStr($str,$isFirstToUpper=false)
	{ // isFirstToUpper lo utilizo para determinar si el parametro sera o no 
	  //retornado con el primer caracter en mayuscula
	  //escapse single quotes	
	  
		$str = mysql_real_escape_string(trim($str));
		return ($isFirstToUpper) ?  ucfirst($str) : $str;
	}
	
	static function formatStr($str, $is_edit=false)
	{//cuando una valor que se obtiene de la db es null o vacio se devuelve el valor "No Registra."
	 //para no mostrar el campo vacio, esto solo aplica cuando se visualizan datos
		 		
		 $str = trim($str);
		 $str = utf8_decode($str);
		 $str = htmlentities($str);
		 
		 if(!$is_edit)
		 {
			 if(empty($str))return "No Registra.";		
			 else return $str;
		 }else return $str;
	 }
}

?>