<?php

require_once 'sql.class.php';
require_once 'cadenas.class.php';
	
class Producto
{
	private $producto_lista = NULL;
	private $producto_count = 0;
				
	public function insertarProducto($nombre, $codigo, $descripcion, $fabricante, $stock, $unidadMedida, $valorUnitario)
	{
		
		$codigo = Cadenas::vaccinateStr($codigo);
		
		//comprobamos la cedula ya esta registrada
		$this->comprobarCodigo($codigo);
		
		if($this->producto_count == -1) return -1;
		
		if($this->producto_count > 0 ) return 2;
		
		$nombre = Cadenas::vaccinateStr($nombre, true);
		$descripcion = Cadenas::vaccinateStr($descripcion, true);		
		$fabricante = Cadenas::vaccinateStr($fabricante, true);
		
		$stock = Cadenas::vaccinateStr($stock);
		$valorUnitario = Cadenas::vaccinateStr($valorUnitario);
				
		$unidadMedida = intval($unidadMedida);
				
		($descripcion == "") ? $descripcion = "NULL" : $descripcion = "'$descripcion'";	
		($fabricante == "") ? $fabricante = "NULL" : $fabricante = "'$fabricante'";	
						
		$sql = "insert into tb_producto(codigo,id_unidadMedida,nombre,descripcion,fabricante,stock,impuesto,valor_unitario,estado)
		        values($codigo,$unidadMedida,'$nombre',$descripcion,$fabricante,$stock,0.16,$valorUnitario,1)";
			   
	    $exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
	
	public function comprobarCodigo($codigo)
	{
		$sql = "SELECT count(1) FROM tb_producto WHERE codigo=$codigo";
		if(!SQL::execQuery($sql)) $this->producto_count = -1;
		else $this->producto_count = SQL::singleColumn();
	}
	
	public function modificarProducto($id,$nombre, $codigo, $descripcion, $fabricante, $stock, 
									  $unidadMedida,$valorUnitario,$cambioCodigo)
	{
		if($cambioCodigo)
		{
			$codigo =  Cadenas::vaccinateStr($codigo);
			//comprobamos la cedula ya esta registrada
			$this->comprobarCodigo($codigo);
			if($this->producto_count == -1) return -1;
			if($this->producto_count > 0 ) return 2; // 2 indicara que la cedula ya existe
			$cambiar = ",codigo=$codigo";
	    }
		
		$id = intval($id);
		
		$nombre = Cadenas::vaccinateStr($nombre, true);
		$descripcion = Cadenas::vaccinateStr($descripcion, true);		
		$fabricante = Cadenas::vaccinateStr($fabricante, true);
		
		$stock = intval($stock);
		$valorUnitario = floatval($valorUnitario);
				
		$unidadMedida = intval($unidadMedida);
				
		($descripcion == "") ? $descripcion = "NULL" : $descripcion = "'$descripcion'";	
		($fabricante == "") ? $fabricante = "NULL" : $fabricante = "'$fabricante'";
			
		$sql = "UPDATE tb_producto SET 
				nombre='$nombre',descripcion=$descripcion,fabricante=$fabricante,stock=$stock,
				valor_unitario=$valorUnitario,id_unidadMedida=$unidadMedida"
				.$cambiar." WHERE id_producto=$id";
		
		$exec = SQL::execQuery($sql);
			
	    return SQL::respuesta($exec); 
	}
		
	public function seleccionarProducto($estado,$id=NULL)
	{
		$sql = "SELECT 
				B.id_producto,A.tipoUnidadMedida,B.codigo,B.nombre,B.descripcion,
				B.fabricante,B.stock,B.valor_unitario,B.estado,B.id_unidadMedida
				FROM tb_unidad_medida A  
				INNER JOIN tb_producto B 
				ON A.id_unidad_medida = B.id_unidadMedida 
				WHERE B.estado=$estado";
				
		if($id != NULL) $sql.= "  AND B.id_producto=$id";
		
		$ejecuto = SQL::execQuery($sql);
		
		if(! $ejecuto)
		{
			$this->producto_lista = NULL;
			return;
		}
		
		$this->producto_lista = array();
		
		while($fila = SQL::fetchArray())
		{
			 $this->producto_lista[] = array("id"=>$fila['id_producto'],
									 "tipoUnidadMedida"=>$fila['tipoUnidadMedida'],
									 "codigo"=>$fila['codigo'],
									 "nombre"=>$fila['nombre'],
									 "descripcion"=>$fila['descripcion'],
									 "fabricante"=>$fila['fabricante'],
									 "stock"=>$fila['stock'],
									 "valor_unitario"=>$fila['valor_unitario'],
									 "idunidadmedida"=>$fila['id_unidadMedida']);
		}
		
	}
	
	public function eliminarProducto($id,$estado)
	{
		$sql = "UPDATE tb_producto SET estado=$estado WHERE id_producto=$id";
		$exec = SQL::execQuery($sql);
		return SQL::respuesta($exec); 
    }
	
	public function getListado()
	{
		return $this->producto_lista;
	}
	
	
}

?>