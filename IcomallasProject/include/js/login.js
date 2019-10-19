var usUrl = "../include/usuario_acceso.php";

function autenticar(e){
	
	e.preventDefault();	
	removerMensajes();
	appendLoading("frm-logueo");
	var datos = $("#frm-logueo").serialize();	
	$.post( usUrl, datos,
			function(data){
				
				setTimeout(function(){
					removeLoading();
					
						if(data == 0){
							$submit = $("#frm-logueo input[type='submit']");
							$submit.after(warning_error("Usuario o Contraseña Incorrectos!", 2));
						}else if(data == 1) window.location="index_icomallas.php";
					},700); 
				
			}
		  )
}