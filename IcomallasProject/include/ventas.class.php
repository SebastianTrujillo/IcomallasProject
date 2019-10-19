<?php
	require_once 'sql.class.php';
	require_once 'cadenas.class.php';
	
	class Venta{
		
		private $venta_lista = NULL;
		private $venta_count = 0;
		private $detalle_lista = NULL;
		
		public function insertarVenta($cliente,$vendedor,$total,$impuesto,$neto,
									   $arrayProductos,$arrayPrecio,$arrayCantidad,$arrayParcial )
		{
			$cliente = intval($cliente);
			$vendedor = intval($vendedor);
			$total = floatval($total);
			$impuesto = floatval($impuesto);
			$neto = floatval($neto);
			
			$sql = "insert into tb_venta(id_cliente,id_usuario,fecha_de_registro, totalBruto,impuesto,valorNeto, estado)
						values($cliente, $vendedor, CURDATE(),$total,$impuesto,$neto, 1)";
			
			SQL::execQuery("BEGIN");
			$exec = SQL::execQuery($sql);			
			$idventa = 0;
			if($exec){
				
				$sql = "SELECT LAST_INSERT_ID()";
				SQL::execQuery($sql);
				$idventa = intval(SQL::singleColumn());
				
				for($i=0;$i<count($arrayProductos);$i++){
				
						$producto = $arrayProductos[$i];
						$precio = $arrayPrecio[$i];
						$cantidad = $arrayCantidad[$i];
						$parcial = $arrayParcial[$i];
						$sql = "insert into tb_detalle_venta(id_producto,id_venta,cantidad,valorUnitario,subTotal)
								values($producto,$idventa,$cantidad,$precio,$parcial)";
						$exec = SQL::execQuery($sql);
						if(! $exec){
							SQL::execQuery("ROLLBACK");
							return -1;
				        }				
			     }
				 
				 $sql = "UPDATE tb_producto, 
							(SELECT a.id_producto AS productoid, b.* FROM tb_producto a INNER JOIN tb_detalle_venta b 
  							ON a.id_producto=b.id_producto) z SET stock=stock-z.cantidad
							WHERE tb_producto.id_producto=z.id_producto
							AND z.id_venta=$idventa";
							
				SQL::execQuery($sql);							
				 
				SQL::execQuery("COMMIT");
				return 1;
			}
			else return -1;
		}
		
		public function seleccionarVenta($estado,$id=NULL)
		{
			$sql = "SELECT 
					A.nombreCompleto AS cliente,
					A.numeroDocumento, E.tipoDocumento,
					A.direccion, A.telefono,F.ciudad,
					D.nombreCompleto,B.fecha_de_registro,
					B.totalBruto, B.impuesto,
					B.valorNeto,B.id_venta
					FROM tb_cliente A  
					INNER JOIN tb_venta B 
					ON A.id_cliente = B.id_cliente 
					INNER JOIN tb_usuario C 
					ON C.id_usuario = B.id_usuario
					INNER JOIN tb_empleado D 
					ON D.id_empleado = C.id_empleado 
					INNER JOIN tb_tipo_documento E ON 
					A.id_tipoDocumento=E.id_tipoDocumento
					INNER JOIN tb_ciudad F
					ON A.id_ciudad=F.id_ciudad
					WHERE B.estado=$estado";
				
			if($id != NULL) $sql.= "  AND B.id_venta=$id";
		
			$ejecuto = SQL::execQuery($sql);
		
			if(! $ejecuto)
			{
			$this->venta_lista = NULL;
			return;
			}
		
			$this->venta_lista = array();
		
			while($fila = SQL::fetchArray())
			{
				 $this->venta_lista[] = array("id"=>$fila['id_venta'],
									 "cliente"=>$fila['cliente'],
									 "doccliente"=>$fila['numeroDocumento'],
									 "tipocliente"=>$fila['tipoDocumento'],
									 "telcliente"=>$fila['telefono'],
									 "dircliente"=>$fila['direccion'],
									 "ciudadcliente"=>$fila['ciudad'],
									 "empleado"=>$fila['nombreCompleto'],
									 "fecha"=>$fila['fecha_de_registro'],
									 "totalbruto"=>$fila['totalBruto'],
									 "impuesto"=>$fila['impuesto'],
									 "valorNeto"=>$fila['valorNeto']);
			}
		
		}
		
		
		
		public function eliminarVenta($id,$estado){
			
			$sql = "UPDATE tb_venta SET estado=$estado WHERE id_venta=$id";
			$exec = SQL::execQuery($sql);
			return SQL::respuesta($sql);
		}
	
		public function seleccionarDetalle($idventa){
			
			$sql = "SELECT a.*, b.nombre AS producto
						FROM tb_detalle_venta a
						INNER JOIN tb_producto b
						ON a.id_producto=b.id_producto
						WHERE a.id_venta=$idventa";
			if(SQL::execQuery($sql)) $this->obtenerDatosDetalle();
			else $this->detalle_lista = NULL;
		}
		
		/*private function obtenerDatosPedido()
		{	
			$this->pedido_count = SQL::numRows();
			if($this->pedido_count == 0){
				$this->pedido_lista = NULL;
				return;
			}
			$this->pedido_lista=array();
			while($row=SQL::fetchArray()){
				
				$this->pedido_lista[] = array( "ID"=>$row["idpedido"],
										    "cliente"=>Cadenas::formatStr($row["cliente"]),
											"fecha_ped"=>$row["fecha_pedido"],	
											"fecha_ent"=>$row["fecha_entrega"],
											"dir_ent"=>Cadenas::formatStr($row["direccion_entrega"]),
											"hora"=>$row["hora"],
											"total"=>$row["vrtotal"], 
											"est_ped"=>$row["nombre_estado"],
											"vendedor"=>$row["vendedor"],
											"estado"=>$row["estado"],
											"idest_ped"=>$row["estado_pedido"]);
			}
		}*/
		
		public function ventasPorAnio($anio){
			
			$sql = "SELECT SUM(valorNeto) AS total, MONTH(fecha_de_registro) AS mes
						FROM tb_venta
						WHERE YEAR(fecha_de_registro)=$anio
						AND estado=1
						GROUP BY mes";
			
			
			if(! SQL::execQuery($sql)){
				$this->venta_lista = NULL;
				return;
			}
			$this->venta_lista=array(); 			
			while($row=SQL::fetchArray()){
				
				$this->venta_lista[] = array( "total"=>$row["total"],
										       "mes"=>$row["mes"]);
			}
		}
		
		public function obtenerDatosDetalle(){			
			
			if(SQL::numRows() == 0){
				$this->detalle_lista = NULL; 
				return;
			}
			$this->detalle_lista=array();
			while($row=SQL::fetchArray()){
				
				$this->detalle_lista[] = array( "ID"=>$row["id_detalle_venta"],
										    "producto"=>$row["producto"],
											"idproducto"=>$row["id_producto"],
											"precio"=>$row["valorUnitario"],	
											"cantidad"=>$row["cantidad"],
											"subtotal"=>$row["subTotal"]);
			}
		}
				
		/*public function getVentaLista(){
			return $this->venta_lista;
		}*/
		
		public function getVentaCount(){
			return $this->venta_count;
		}	
		
		public function getDetalle(){
			return $this->detalle_lista;
		}
		
		public function getListado()
		{
		return $this->venta_lista;
		}
		
	}
?>