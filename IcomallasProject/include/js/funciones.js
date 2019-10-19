var respuesta_servidor = null;
var $submit = null;
var tipo_validacion = 0;

function llenarCombo(comboID, tipo_c, itemSelected){	
	
	if(!itemSelected) var itemSelected="";
	
	$.post("../include/control_combos.php", { tipo:tipo_c  },
	        function(data)
			{			
				//alert(data);
				/*var html = "<option value='0'>Seleccione</option>";
				for(var i=0; i < data.length;i++){
					
					html+='<option value="'+ data[i].ID + '">'+ data[i].texto+'</option>';
				}*/
				
				$("#"+comboID).html(data);			
				if(itemSelected != "" )
					$("#"+comboID+" option[value="+itemSelected+"]").attr("selected",true);			
		    });	
			
			
}

function getClassFail(mensaje)
{
	return '<div class= "fail" style="color:#FF4500;font-size:12px;display:block;float:right;text-align:left;width:238px;">'+mensaje+'</div>';
	/*return '<div class= "fail" style="color:#FF4500;font-size:12px;display:block;float:right;text-align:left;width:250px;">'+mensaje+'</div>';*/
}

var response,fName, $campo;

function validarForm(formID)
{		
    response = true; 
	
	removerClassFail();
	
   	$("#" + formID + " input.requerido, #"+formID+" select.requerido").each
	(
		function(){
					 if($(this).is(":text") || $(this).is(":password") || $(this).is("select") || $(this).is(":hidden") )
					 {
						 var val = $(this).val();
						 if(val == "")
						 {
							 fName=$('label[for="' + $(this).attr("name") + '"]').html(); 
							 	 
							 fName= fName.replace('*','');
							 fName= fName.replace(':','');
							 $campo = $(this);
							 /*$(this).after(getClassFail('Ingrese '+ fName));
							 $(this).focus();*/	
							 response = false;
							 tipo_validacion = 1; //corresponde a la validacion de campos vacios
							 return false;
						 }
				     } 
			      }
	)
	//return response;
}

function removerClassFail(){
	if($(".fail").length > 0) $(".fail").remove()
}


function mostrarErrorCampo(msg)
{
	
	if(msg == null) msg = 'Ingrese '+ fName;
	$campo.after(getClassFail(msg))
	$campo.focus();
}

function limpiarCampos(formID)
{
	$("#" + formID + " input").each
	( 
		function()
		{
			if($(this).is(":text") || $(this).is(":password") )
			{
				$(this).val("");
			} 
		}
	)
}

function validarCampo(campo, label)
{
	if($(".fail").length > 0) $(".fail").remove();
	if($("#"+campo).val() == "")
	{
		$("#"+campo).after(getClassFail('Ingrese '+ label));	
		return false;
	}
	return true;
}

var oTable = null;

function crearTabla(idtabla, columna, orden)
{ 	//funcion para asignar el plugin datatable a la clase data-grid
	oTable = $("#"+idtabla).dataTable
	({
		//"bJQueryUI": true,
		"bAutoWidth" : false,
		"sPaginationType": "full_numbers", 
		"aaSorting": [[ columna, orden ]]
	});	   
}

//funcion para borrar un fila del datatable
function eliminarFila(row)
{
	oTable.fnDeleteRow( row );
}

//funcion agregar filas con datos a la datatable
function agegarFila(datos)
{
	oTable.dataTable().fnAddData(datos);
}

function setDatePicker(campo)
{
	$('#'+ campo).datepicker
	({
		dateFormat: 'yy-mm-dd',
		changeYear: true,
		changeMonth: true,																 
		inline: true
	});
}

//funcion para cargar un autocompletar simple en un campo de texto
function autocompletar(campo,url,tipo)
{
	$('#'+campo).autocomplete
	({//cargo el autompletar para el campo Nombre del Cliente
		source : function( request, response )
		{
			$.ajax
			({
				type: "POST",
				url: url,
				dataType: "json",
				data:{
						tipo:tipo,
						term: request.term
					 },
				success: function( data ) 
				{
					response(data);
				}
			});
		}
	 });
}

function mostrarFechaActual(){
	
	var fecha, dia, mes, anio;
	fecha = new Date();
	dia = parseInt(fecha.getDate());	
	mes = parseInt(fecha.getMonth()) + 1;
	if(dia < 10 ) dia = '0'+ dia; 
	anio = fecha.getFullYear();
	
	return  formatoFecha(dia,mes,anio);
}

function formatoFecha(dia, mes, anio){
	
	var nombreMes = null;
	switch (mes)
	{
		case 1:nombreMes="Enero";break;
	  	case 2:nombreMes="Febrero";break;
	  	case 3:nombreMes="Marzo";break;
	  	case 4:nombreMes="Abril";break;
	  	case 5:nombreMes="Mayo";break;
	  	case 6:nombreMes="Junio";break;
	  	case 7:nombreMes="Julio";break;
	  	case 8:nombreMes="Agosto";break;
	  	case 9:nombreMes="Septiembre";break;
	  	case 10:nombreMes="Octubre";break;
	  	case 11:nombreMes="Noviembre";break;
	    case 12:nombreMes="Diciembre";break; 	
	}
	
	return dia + " de " + nombreMes + " del " + anio;
}

function appendLoading(formID)
{
	var divl = '<div id="loading-small"><img src="../images/cargando.gif"/></div>';
	$submit = $("#"+formID+" input[type='submit']"); 
	$submit.after(divl);
}

function removeLoading()
{
	$("#loading-small").remove();
}

function appendLoadingBig()
{
	var divl = '<div id="loading-big">'+
					'<img src="../images/cargando.gif"/>'+
					'<div>Cargando Datos...</div>'+
				'</div>';
	$("#encabezadoDePaginaInicio").after(divl);
}

function mostrarCapaListado()
{
	$("#loading-big").remove();
	$("#tablaListado").show("fast");
	//document.getElementById("tablaListado").style.display = "block";
}

//funcion para abrir un enlace o url en una ventana nueva 
function openUrl(url)
{
	var option = "fullscreen=1,toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1";                
	window.open(url,"Ventana",option,1);
}


function obtenerAnioActual(){
	var fecha, anio;
	fecha = new Date();
	return fecha.getFullYear();
}


function eventosAccionUsuario(parametros)
{
	
	$(".accion-usuario").each(function()
	{ 
		$(this).click(function()
		{
			var row = this.parentNode.parentNode;
			var id = row.cells[0].innerHTML;
			
			/*modificado*/
			var opcion=$(this).index(); 
			if(($(this).index() == 0) || ($(this).index() == 1))
			/*--------------*/
			/*if($(this).index() == 0)*/
			{
				// alert(parametros.datos["tipo"]);
				$.post(parametros.url,{tipo:parametros.tipoEditar, id:id}, 
				
							function(data)
							{
								/*modificado*/
								if(opcion == 0) $("#contenidoDePagina").load(parametros.vistaconsultar, {datos:data})
								else $("#contenidoDePagina").load(parametros.vistaeditar, {datos:data})
								/*--------------*/
								/*$("#contenidoDePagina").load(parametros.vistaeditar, {datos:data})*/
								
							}, 'json'
				      )
			}
			else
			{
				if(confirm("¿Esta seguro que desea eliminar este registro?"))
				{
					$.post(parametros.url,{tipo:parametros.tipoEliminar, id:id, estado:0}, 
				
								function(data)
								{
									if(data == 1)eliminarFila(row);
								}
				          )
					
				}
			}
		})
    });
}

function validarNumericos()
{
	$(".numeric").numeric();
	$(".integer").numeric(false, function() { alert("Este campo solo acepta valores enteros."); this.value = ""; this.focus(); });
	$(".positive").numeric({ negative: false }, function() { alert("Este campo no acepta valores negativos."); this.value = ""; this.focus(); });
	$(".positive-integer").numeric({ decimal: false, negative: false }, 
										function()
										{
											alert("Este campo solo acepta valores enteros positivos.");
											this.value = ""; 
											this.focus(); 
										}
						          );
	$("#remove").click(
		function(e)
		{
			e.preventDefault();
			$(".numeric,.integer,.positive").removeNumeric();
		}
	);
}

function warning_error(mensaje, tipo)
{
	var elemento = null;
	if(tipo == 1)
	{
		elemento = ' <div id="warning">'+
            			'<img src="../images/warning.png" />'+mensaje+
            	   '</div>';
	}
	else if(tipo == 2)
	{
		if(mensaje == "") mensaje = "Error, la operación no se pudo ejecutar";
		elemento = ' <div id="error-conexion">'+
            			'<img src="../images/error.png" />'+mensaje+
            	   '</div>';
	}
	return elemento;
}

function removerMensajes()
{
	if($("#warning").length > 0)$("#warning").remove();
	if($("#error-conexion").length > 0)$("#error-conexion").remove();
}

function email_validate(email)
{
	   var pos_ar = 0;
	   //buscamos si la candena contiene @
	   for(var i=0;i<email.length;i++) if(email[i] == '@')pos_ar++;
	   //comprobamos si la candena no contiene @ o si hay @ mas de una vez
	   if(pos_ar == 0 || pos_ar > 1) return false;
	   //capturo la posicion del @
	   pos_ar = email.indexOf("@");	  
	   var server, domain, pos_dom;	  
	   if(pos_ar == 0)return false; // si la posicion del @ es 0 es porque no existe un nombre de usuario
	   server = email.substr(pos_ar+1,email.length);
	   pos_dom = 0;
	   //buscamos si lo que por ahora es el servidor contiene '.' y almacenamos la ultima posicion del caracter '.'
	   for(var i=0;i < server.length;i++)if(server[i] == '.')pos_dom = i;
	   //comprobamos si existe un dominio
	   if(pos_dom == 0) return false;		  
	   domain = server.substr(pos_dom+1,email.length);
	   server = email.substr(pos_ar+1,pos_dom); 
	   if(server[0] == "." || server[server.length-1] == "." || server.indexOf("..") != -1 )return false; 
	   if(domain.length <= 1 || domain.length > 4) return false;
	   return true;
}

function minLength(cadena, longitud){
	
	return (cadena.length < longitud);
}

function campoMinLengt(campoID, longitud){
	
	if(! response) return;
	$campo = $("#"+campoID);
	var valor = $campo.val();
	if(valor == "") return;
	if(minLength(valor, longitud))
	{
		tipo_validacion = 2;
		response = false;
	}
}

function cadenasIguales(c1, c2){
	return (c1 == c2);
}

function campoPass(campoID, campo2)
{
	if(! response) return;
	$campo = $("#"+campoID);
	
	var valor = $campo.val();
	var valor2 = $("#"+campo2).val();
	if(valor == "") return;
	if(! cadenasIguales(valor,valor2))
	{
		tipo_validacion = 3; //corresponde a la validacion de campos email
		response = false;
	}
}

function campoEmail(campoID)
{
	if(! response) return;
	$campo = $("#"+campoID);
	var valor = $campo.val();
	if(valor == "") return;
	if(! email_validate(valor))
	{
		tipo_validacion = 2; //corresponde a la validacion de campos email
		response = false;
	}
}

function accionUsuario(parametros){
	
	var confirmar = -1;
	if(parametros.datos.accion == 3) confirmar = confirm("¿Esta seguro que desea eliminar este registro?");
	if(typeof(confirmar) == "boolean"){
		if(! confirmar) return;
	} 
	
	$.post(parametros.url,parametros.datos, 
				
							function(data)
							{ 
								if(parametros.datos.accion == 3){
									if(data == 1)eliminarFila(parametros.fila);
								}
								else $("#contenidoDePagina").html(data);
								
								
							}
				      )
}

//funcion para abrir un enlace o url en una ventana nueva 
function openUrl(url){
	var option = "fullscreen=1,toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1";                
	window.open(url,"Ventana",option,1);
}
