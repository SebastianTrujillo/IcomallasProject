<?php
	
	require_once 'sql.class.php';
	require_once 'cadenas.class.php';
	
	class Autocomplete{
		
		public function autucompletarProducto($codigo)
		{
			$sql = "SELECT id_producto,codigo,nombre,stock, valor_unitario FROM tb_producto 
					WHERE (estado=1 AND codigo LIKE '%$codigo%') AND stock>0";
							  
			if(! SQL::execQuery($sql)) return NULL;			
			$values = array();
			
			while($row=SQL::fetchArray())
			{
				$values[] = array("value"=>$row["codigo"],
								  "ID"=>$row["id_producto"],
								  "nombre"=>$row["nombre"],
								  "stock"=>$row["stock"],
								  "precio"=>$row["valor_unitario"]);
			}
			
			return $values;
		}
		
		public function autucompletarCliente($documento)
		{
			$sql = "SELECT id_cliente,numeroDocumento,nombreCompleto,telefono FROM tb_cliente 
					WHERE (estado=1 AND numeroDocumento LIKE '%$documento%')";
							  
			if(! SQL::execQuery($sql)) return NULL;			
			$values = array();
			
			while($row=SQL::fetchArray())
			{
				$values[] = array("value"=>$row["numeroDocumento"],
								  "ID"=>$row["id_cliente"],
								  "nombreCompleto"=>$row["nombreCompleto"],
								  "telefono"=>$row["telefono"]);
			}
			
			return $values;
		}
		
		public function autucompletarEmpleado($documento)
		{
			$sql = "SELECT id_empleado,numeroDocumento,nombreCompleto,telefono FROM tb_empleado 
					WHERE (estado=1 AND numeroDocumento LIKE '%$documento%')";
							  
			if(! SQL::execQuery($sql)) return NULL;			
			$values = array();
			
			while($row=SQL::fetchArray())
			{
				$values[] = array("value"=>$row["numeroDocumento"],
								  "ID"=>$row["id_empleado"],
								  "nombreCompleto"=>$row["nombreCompleto"],
								  "telefono"=>$row["telefono"]);
			}
			
			return $values;
		}
	}

?>