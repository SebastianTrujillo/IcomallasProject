var url_venta = "../include/venta_control.php";
//var documento;
var  idclienteSel,clienteSeleccionado, prodSeleccionado, idprodSel, cantidadSel, stockSel, stockParcial = null;
var tabla, fila, indice, productos, datosProd, vrparcial, pos;
var selecciono = false;
var total = 0;
var impuesto = 0;
var totalNeto = 0;
var esValido;
var msg;
var idVenta;
var arrayID, arrayPrecio, arrayVrparcial, arrayCantidad;

function enviarDatosVenta(e)
{	
	e.preventDefault();
	removerMensajes();
	appendLoading("frm-venta");
	validarFormVenta(); 
	if(esValido)
	{
		//enviar la informacion al servidor
		obtenerDetalle();
		idclienteSel = $("#idcliente_venta").val();
		
		$.post( url_venta,{tipo:1, idcliente:idclienteSel, totalBruto:total, impuesto:impuesto, neto:totalNeto, usuario:$("#idusuario").val(),
						productos:arrayID, precios:arrayPrecio,cantidad:arrayCantidad, vrparcial:arrayVrparcial}, 
						function(data)
									{
										
										respuesta_servidor = parseInt(data);
									}
			  )
		
	}
	setTimeout(function()
			   {
				   removeLoading();
				   
				   if(! esValido)
				   {
					   mostrarErrorCampo(msg);
				   }
				   else{ 
					        switch(respuesta_servidor)
							{
								case -1:
			     				$submit.after(warning_error("", 2));
			   					break;
			   
			   					case 1:
			        			
			        			$("#contenidoDePagina").load("mensajes.php",{ mod:"venta"});
			   					break;
			   					
		   					}
						}
			   },700);
}

function validarFormVenta(){
	
	removerClassFail();
	if($("#idcliente_venta").val() == ""){
		msg = "No se ha seleccionado ningún Cliete. Por favor agregue uno a la Factura de venta."
		$campo = $("#cliente-buscar");
		esValido = false;
		return;
	}
	if(tabla.rows.length < 2){
		msg = "No se ha seleccionado ningún Producto. Por favor agregue uno a la Factura de venta.";
		$campo = $("#codigo-buscar");
		esValido = false;
		return;
	}
	esValido = true;
}


function obtenerDetalle(){
	
	var nfilas = (tabla.rows.length - 1);
	arrayID = new Array(nfilas); 
	arrayPrecio = new Array(nfilas); 
	arrayCantidad = new Array(nfilas);
	arrayVrparcial = new Array(nfilas);
	var j = 0;
	for(var i = 1; i < tabla.rows.length; i++){
		arrayID[j] = tabla.rows[i].cells[0].innerHTML;
		arrayPrecio[j] = tabla.rows[i].cells[5].innerHTML;
		arrayCantidad[j] = tabla.rows[i].cells[3].innerHTML;
		arrayVrparcial[j] = tabla.rows[i].cells[6].innerHTML;
		j++;
	}
}

function mostrarListado()
{
	crearTabla("listadoVenta", 0, "desc");
	appendLoadingBig();
	 
	 setTimeout(function()
	 			{
		 			mostrarCapaListado();
		        },1000)
}

function accionCliente(id,accion, elemento)
{
	var tipo = (accion == 1 || accion == 2) ? 3 : 5;
	var fila = null;
	if(! elemento) var elemento = null;
	else fila = elemento.parentNode.parentNode;
		
	accionUsuario({url:url_cliente, datos: { tipo:tipo, id:id, accion:accion, estado:2 }, fila:fila})
}



function seleccionarCliente(){
	
	if($(".fail").length > 0) $(".fail").remove();
	$("#cliente-sel").hide("fast");
	$("#idcliente_venta").val(idclienteSel);
	$("#cliente-sel").html(clienteSeleccionado);
	$("#cliente-sel").show("fast");
	$("#detalleCliente").hide("fast");
}

function seleccionarProducto(){
	
	if($(".fail").length > 0) $(".fail").remove();
	cantidadSel = $("#cantidadInput").val();
	if(cantidadSel == "" || cantidadSel == "0"){
		alert("Debe especificar una cantidad positiva");
		return;
	}
	cantidadSel = parseInt(cantidadSel);
	if (cantidadSel > stockParcial){
		 alert("La cantidad especificada no puede ser mayor al Stock actual del producto.")
		 return;
	 }
	 $("#detalleProducto").hide("fast");
	 stockParcial-=cantidadSel;
	 var precio = parseInt(datosProd[3]);
	 vrparcial = precio * cantidadSel;
	 if(selecciono){
		 agruparProducto(pos, cantidadSel, vrparcial);
			return;
	 }
	 /*if(tabla.rows.length > 1){
		var pos = agrego(idprodSel);
		if(pos > -1){			
			agruparProducto(pos, cantidadSel, vrparcial);
			return;
		}
	}*/
	
	var datos = new Array( datosProd[0],datosProd[1],datosProd[2],cantidadSel,stockParcial,precio,vrparcial, 
						   '<span class="accion-usuario" title="Eliminar" onClick="eliminarItem(this)">'+
						   		'<img src="../images/arror.png" />'+
						   '</span>');
			
	/*var datos = new Array( datosProd[0], 
					       '<div id="estiloDelDetalle">'+datosProd[1]+'</div>',
						   '<div id="estiloDelDetalle">'+datosProd[2]+'</div>',
						   '<div id="estiloDelDetalle">'+cantidadSel+'</div>',
						   '<div id="estiloDelDetalle">'+stockParcial+'</div>', 
						   '<div id="estiloDelDetalle">'+precio+'</div>',
						   '<div id="estiloDelDetalle">'+vrparcial+'</div>', 
						   '<span class="accion-usuario" title="Eliminar" onClick="eliminarItem(this)">'+
						   		'<img src="../images/arror.png" />'+
						   '</span>');*/
							
							
							
						   
						   					
	
	var row, col, i;
	i = tabla.rows.length;	  
	row = tabla.insertRow(i);	
	tabla.rows[i].className = "fila";	
    for(var j = 0; j < datos.length; j++)
    {
		 col = tabla.rows[i].cells;           
		 row.appendChild(row.insertCell(j));
		 col[j].innerHTML = datos[j];
		 if(j == 0)col[j].setAttribute("class", "columna-oculta");
		 //if(j == (datos.length-1) )col[j].setAttribute("class", "columna-oculta");		 
    }
	total += vrparcial; 
	impuesto += (vrparcial * 0.16);
	totalNeto =  (total+impuesto);
	 mostrarNetos();
	$("#codigo-buscar").val("");
	$("#cantidadInput").val("");
}


function agrego(id){
	
	for(var i = 1; i < tabla.rows.length; i++ ){		
		if(tabla.rows[i].cells[0].innerHTML == id)return i;		
	}
	return -1;
}

function agruparProducto(pos, cant, vrpar){	
	
	var c = parseInt(tabla.rows[pos].cells[3].innerHTML);
	var v = parseInt(tabla.rows[pos].cells[6].innerHTML);
	//stockParcial = tabla.rows[pos].cells[4].innerHTML;
	//stockParcial-=cant;
	tabla.rows[pos].cells[3].innerHTML = c + parseInt(cant);
	tabla.rows[pos].cells[6].innerHTML = v + parseInt(vrpar);
	tabla.rows[pos].cells[4].innerHTML = stockParcial;
	//total += vrpar; 
	//document.getElementById('valor').innerHTML = " "+total;
}

function eliminarItem(elemento){
	
	var row = elemento.parentNode.parentNode;
	var subt = parseFloat(row.cells[6].innerHTML);
	total-=subt;
	impuesto-=(subt * 0.16);
	totalNeto = total+impuesto;
	var padre = row.parentNode;
	padre.removeChild(row);
	mostrarNetos()
}

function mostrarNetos(){
	document.getElementById('totalBruto').innerHTML = " "+total;
	document.getElementById('valorImpuesto').innerHTML = " "+impuesto;
	document.getElementById('valorNeto').innerHTML = " "+totalNeto;
}


function iniciarForm()
{
	
	$("#diaMesAnio").val(mostrarFechaActual())
	
	tabla = document.getElementById('tabla-detalle');
	autocompletar("cliente-buscar","../include/ajax_autocompletar.php",1);
	$("#cliente-buscar").autocomplete
	({	
		   select : function(event,ui)
		   {
			   $("#idcliente_venta").val("");
			   $("#cliente-sel").hide("fast");
			   //$("#idcliente_pedido").val('');
			   $("#cliente-sel").html("");
			   $("#detalleCliente").hide("fast");
			   $("#detalleCliente").html("<div class='field'>" +
			   								"<label>Nombre Completo:</label>"+
			   								" <span class='item'>"+ ui.item.nombreCompleto+"</span>"+
										"</div>"+
										
										"<div class='field'>" +
			   								"<label>Numero De Documento:</label>"+
			   								" <span class='item'>"+ ui.item.value+"</span>"+
										"</div>"+
										
										"<div class='field'>" +
			   								"<label>Teléfono:</label>"+
			   								" <span class='item'>"+ ui.item.telefono+"</span>"+
										"</div>"+								
										"<input type='button' value='Agregar Cliente' title='Agregar Cliente' class='button' onclick='seleccionarCliente()' />");
			   
			   clienteSeleccionado = "<hr width='100%' id='linea'/>"+
			   						 "<h3 style='text-align:center;' id='subTitulos'>Cliente Seleccionado</h3>" +
									 "<div class='field'>" +
			   								"<label>Nombre Completo:</label>"+
			   								" <span class='item'>"+ ui.item.nombreCompleto+"</span>"+
									"</div>"+
									"<div class='field'>" +
			   								"<label>Numero De Documento:</label>"+
			   								" <span class='item'>"+ ui.item.value+"</span>"+
									"</div>";
									
			   idclienteSel = ui.item.ID;			   
			   $("#detalleCliente").show("fast");
		   }
	})
	autocompletar("codigo-buscar","../include/ajax_autocompletar.php",2);
	$("#codigo-buscar").autocomplete
	({	
		   select : function(event,ui)
		   {
			  
			  // $("#producto-sel").hide("fast");
			   //$("#idcliente_pedido").val('');
			   $("#producto-sel").html("");
			   $("#detalleProdcuto").hide("fast");
			   idprodSel = ui.item.ID;
			   if(tabla.rows.length > 1){
					pos = agrego(idprodSel);
					if(pos > -1){			
						selecciono = true;
						stockSel = tabla.rows[pos].cells[4].innerHTML;
					}else {
						stockSel = ui.item.stock;
						selecciono = false;
					}
				}else stockSel = ui.item.stock;	
			   //if(stockParcial == null) stockParcial = stockSel;
			   stockParcial = stockSel;
			   $("#datos-procuto").html("<div class='field'>" +
			   								"<label>Producto:</label>"+
			   								" <span class='item'>"+ ui.item.nombre+"</span>"+
										"</div>"+
										
										"<div class='field'>" +
			   								"<label>Código:</label>"+
			   								" <span class='item'>"+ ui.item.value+"</span>"+
										"</div>"+
										
										"<div class='field'>" +
			   								"<label>Stock:</label>"+
			   								" <span class='item'>"+ stockParcial +"</span>"+
										"</div>");
									
			   	
			  datosProd = [ idprodSel, ui.item.value, ui.item.nombre, ui.item.precio ];
			   $("#detalleProducto").show("fast");
		   }
	})
	
	
}        

function graficoVenta(e){
	
	if(e)e.preventDefault();
	$submit = $("#frm-grafico-venta input[type='submit']");
	var anio = $("#anio").val(); 
	if (anio == null)  anio = obtenerAnioActual();
	appendLoading("frm-grafico-venta");
	$('#cargar-grafico').html("");
	$('#cargar-grafico').hide("fast");
		
	$("#cargar-grafico").load("../include/graficos/grafico_venta.php", { anio:anio })
	 setTimeout(function()
	 			{
		 			removeLoading();
  						 $('#cargar-grafico').show( "fast" );
		        },1000)
	 
}   

function accionVenta(id,accion, elemento)
{
	var tipo = (accion == 2) ? 3 : 4;
	var fila = null;
	if(! elemento) var elemento = null;
	else fila = elemento.parentNode.parentNode;
	
	
		
	accionUsuario({url:url_venta, datos: { tipo:tipo, id:id, accion:accion, estado:2 }, fila:fila})
}

function verCampos(datos)
{
	var fecha = datos.fecha;
	fecha = fecha.split("-");
	fecha = formatoFecha(fecha[2],parseInt(fecha[1]),fecha[0]);
	document.getElementById('fecha').value = fecha;
	document.getElementById('nombre').innerHTML = datos.cliente;
	document.getElementById('tel').innerHTML = datos.telcliente;
	document.getElementById('documento').innerHTML = datos.doccliente;
	document.getElementById('tipodoc').innerHTML = datos.tipocliente;
	document.getElementById('direccion').innerHTML = datos.dircliente;
	document.getElementById('ciudad').innerHTML = datos.ciudadcliente;
	document.getElementById('totalBruto').innerHTML = datos.totalbruto;
	document.getElementById('valorImpuesto').innerHTML = datos.impuesto;
	document.getElementById('valorNeto').innerHTML = datos.valorNeto;
}        
             
function generarPDF(id){
	
	openUrl('../include/pdf/generar_pdf.php?venta='+id)
}
