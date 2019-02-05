// JQUERY.MOBILE
//Ing. Marco Brito
//www.brito.com.ve

var usuario;
var nombre;
var nivel;
var id_usuariobd;

$(document).on("pagecreate","#login",function(){ // CONTROL DEL LOGIN											  
  	
	$("#Username").focusin(function(){
		$("#Username").val("");
        $("#Password").val("");
		$("#add_err").html("");
	});
	
   $("#submit").click(function(){
        username=$("#Username").val();
        password=$("#Password").val();
		if(username=="")
        {
			$("#add_err").html("(*) Ingrese un Nombre de Usuario");
			$('#Username').val('').focus();
		}
        else if(password=="")
        {
			$("#add_err").html("(*) Ingrese una Clave");
			$('#Password').val('').focus();
		}
		else
        {
         $.ajax({
            type: "POST",
            url: "php/login.php",
            data: "name="+username+"&pwd="+password,
            success: function(html){
			html = $.trim(html);
			var separa = html.split(","); // separo la cadena
			//alert(separa[0]+'\n'+separa[1]+'\n'+separa[2]+'\n'+separa[3]);

              if(separa[0]==1)
              {
				usuario = separa[1];
				nombre = separa[2];
				nivel =  separa[3];
				id_usuariobd =  separa[4];
				$.mobile.changePage( "index.php", { transition: "slideup" }); //llama al metodo para cambiar de pagina
					if(nivel==1){ 
					$(".main-nav").html("<ul><li><a href='actividadc.php' id='btn_reg' data-transition='slidedown'><img src='images/icons/white/team.png' /><span>Actividad de Comerciales</span></a></li></ul>");
					} else {
					$(".main-nav").html("<ul><li><a href='registrov.php' id='btn_reg' data-transition='slidedown'><img src='images/icons/white/team.png' alt='' title='' /><span>Registrar Visita</span></a></li><li><a href='actividad_personal.php' data-transition='slidedown'><img src='images/icons/white/user.png' /><span>Ver mis Visitas</span></a></li><li><a href='ruta_visitada.php?id="+id_usuariobd+"&d=0' target='_self'><img src='images/icons/white/user.png' alt='' title='' /><span>GPS de Visitas</span></a></li></ul>");
					
					}
				
				
				$("#right-panel").html("<div class='user_login_info'><div class='user_thumb_container'><img src='images/profile.jpg' /><div class='user_thumb'> <img src='images/perfil/"+usuario+".jpg' /></div></div><div class='user_details'><p>"+nombre+"</p></div><nav class='user-nav'><ul><li><a href='#'><img src='images/icons/white/message.png' /><span>Mensajes</span><strong class='yellow'>1</strong></a></li> <li><a href='#' onClick='javascript:cerrar_sesion()' id='cerrar_sesion'><img src='images/icons/white/lock.png' /><span>Cerrar Sesion</span></a></li></ul></nav></div>");
				
				
              }else
              {	
                    $("#add_err").html("(*) Usuario o clave erronea ");
					
              }
			  
			  
            },
            beforeSend:function()
			{
                 $("#add_err").html("<img src='images/preloader/carga3.gif' width='100px' height='100px' />");
            }
        });
		
		}
         return false;
    }); //fin del evento click
  
});

$(document).on("pagecreate","#contact",function(){   // CONTROL DEL REGISTRO DE VISITAS
	
	var visita_efectuada=0; //inicializo la visita en 0
	
	$("#btn_si").click(function(){
  		$("#info_visita1").show();
		$("#preg_visita").hide();
		$("#submit,#submit2").hide();
		$("#Cliente").val("");
		$("#NombContact").val("");
		$("#tlf_contacto").val("");
		$("#linea_present").val("");
		$("#km_vehiculo").val("");
		visita_efectuada=1;	
		geolocalizar(visita_efectuada);
  	});
	$("#btn_no").click(function(){
  		$("#info_visita2").show();
		$("#preg_visita").hide();
		$("#submit,#submit2").hide();
		$("#Cliente2").val("");
		$("#motivo").val("");
		$("#km_vehiculo2").val("");
		visita_efectuada=0;
		geolocalizar(visita_efectuada);
  	});
	
	$("#Cliente").focusin(function(){
		$('#Cliente').val("");
		$('#NombContact').val("");
		$('#tlf_contacto').val("");
		$('#linea_present').val("");
		$('#km_vehiculo').val("");
		$("#add_err").html("");
	});
	
	$("#Cliente2").focusin(function(){
		$('#Cliente2').val("");
		$('#motivo').val("");
		$('#km_vehiculo2').val("");
		$("#add_err").html("");
	});
	
	var geolocalizar = function(a){
		function pedirPosicion(pos,b) { // geolocalizacion
			   $('#latitud').val(pos.coords.latitude);
			   $('#longitud').val(pos.coords.longitude);
			   if(pos.coords.latitude){
						if(a==1)
						{
							$("#submit").show();
							//$('#boton').attr("disabled", true);
							//$("#Cliente").attr("disabled", false);
							//$("#NombContact").attr("disabled", false);
							//$("#tlf_contacto").attr("disabled", false);
							//$("#linea_present").attr("disabled", false);
							//$("#km_vehiculo").attr("disabled", false);
							
							/*
							$("#Cliente").removeAttr("disabled");
							$("#NombContact").removeAttr("disabled");
							$("#tlf_contacto").removeAttr("disabled");
							$("#linea_present").removeAttr("disabled");
							$("#km_vehiculo").removeAttr("disabled");
							*/
							
							
						}
						else if(a==0)
						{
							$("#submit2").show();
							//$("#Cliente2").attr("disabled", false);
							//$("#motivo").attr("disabled", false);
							//$("#km_vehiculo2").attr("disabled", false);
							/*
							$("#Cliente2").removeAttr("disabled");
							$("#motivo").removeAttr("disabled");
							$("#km_vehiculo2").removeAttr("disabled");
							*/
						}
				}
			}
		navigator.geolocation.getCurrentPosition(pedirPosicion);
	}
	
	
	$("#submit").click(function(){ 
		guardar_visita(visita_efectuada);
    }); //fin del evento click
	
	$("#submit2").click(function(){ 
		guardar_novisita(visita_efectuada);
    }); //fin del evento click
	
	
	
	var guardar_visita = function(visita_efectuada){
		
		var visita_efec = visita_efectuada;
		var cliente = $("#Cliente").val();
		var nom_contacto = $("#NombContact").val();
		var tlf_contacto = $("#tlf_contacto").val();
		var linea_present = $("#linea_present").val();
		var km_vehiculo = $("#km_vehiculo").val();
		var id_usuario = id_usuariobd;
		var motivo = 0;
		var cargo_contacto = "Encargado";
		var latitud = $('#latitud').val();
		var longitud = $('#longitud').val();
		
		if(cliente=="")
        {
			$('#Cliente').val('').focus();
		}
        else if(nom_contacto=="")
        {
			$('#NombContact').val('').focus();
		}
		else if(tlf_contacto=="")
        {
			$('#tlf_contacto').val('').focus();
		}
		else if(linea_present=="")
        {
			$('#linea_present').val('').focus();
		}
		else if(km_vehiculo=="")
        {
			$('#km_vehiculo').val('').focus();
		}
		else
        {	
						
         $.ajax({
            type: "POST",
            url: "php/registrar_visita.php",
            data: "visita_efec="+visita_efec+"&id_usuario="+id_usuario+"&motivo="+motivo+"&cliente="+cliente+"&nom_contacto="+nom_contacto+"&tlf_contacto="+tlf_contacto+"&cargo_contacto="+cargo_contacto+"&linea_present="+linea_present+"&latitud="+latitud+"&longitud="+longitud+"&km_vehiculo="+km_vehiculo,
            success: function(html){
			
              if(html==1)
              {
				$.mobile.changePage( "index.php", { transition: "slideup" }); //llama al metodo para cambiar de pagina
				
              }else
              {
                    alert("Ha ocurrido un problema!");
              }
            },
            beforeSend:function()
			{
				
				$('#Cliente').val('Por Favor Espere');
				$('#NombContact').val('Por Favor Espere');
				$('#tlf_contacto').val('Por Favor Espere');
				$('#linea_present').val('Por Favor Espere');
				$('#km_vehiculo').val('Por Favor Espere');
				$("#add_err").html("<img src='images/preloader/carga3.gif' width='100px' height='100px' />");
            }
        }); // Fin del Ajax
		} // fin del else
	} //fin de la funcion guardar_visita
	
	
	var guardar_novisita = function(visita_efectuada){
		
		var visita_efec = visita_efectuada;
		var cliente = $("#Cliente2").val();
		var motivo = $('#motivo').val();
		var km_vehiculo = $("#km_vehiculo2").val();
		var nom_contacto = 0;
		var tlf_contacto = 0;
		var linea_present = 0;
		var id_usuario = id_usuariobd;
		var cargo_contacto = 0;
		var latitud = $('#latitud').val();
		var longitud = $('#longitud').val();
		
		if(cliente=="")
        {
			$('#Cliente2').val('').focus();
		}
        else if(motivo=="")
        {
			$('#motivo').val('').focus();
		}
		else if(km_vehiculo=="")
        {
			$('#km_vehiculo2').val('').focus();
		}
		else
        {	
						
         $.ajax({
            type: "POST",
            url: "php/registrar_visita.php",
            data: "visita_efec="+visita_efec+"&id_usuario="+id_usuario+"&motivo="+motivo+"&cliente="+cliente+"&nom_contacto="+nom_contacto+"&tlf_contacto="+tlf_contacto+"&cargo_contacto="+cargo_contacto+"&linea_present="+linea_present+"&latitud="+latitud+"&longitud="+longitud+"&km_vehiculo="+km_vehiculo,
            success: function(html){
			
              if(html==1)
              {
				$.mobile.changePage( "index.php", { transition: "slideup" }); //llama al metodo para cambiar de pagina
				
              }else
              {
                    alert("Ha ocurrido un problema!");
              }
            },
            beforeSend:function()
			{
				
				$('#Cliente2').val('Por Favor Espere');
				$('#motivo').val('Por Favor Espere');
				$('#km_vehiculo2').val('Por Favor Espere');
				$("#add_err").html("<img src='images/preloader/carga3.gif' width='100px' height='100px' />");
            }
        }); // Fin del Ajax
		} // fin del else
	} //fin de la funcion guardar_novisita
	
	
	/*
	$('body').keyup(function(e) {
    if(e.keyCode == 13) {
        alert('Has presionado ENTER');
		}
	}); */
	
	
});


$(document).on("pagecreate","#homepage",function(){ // CONTROL DEL INDEX PRINCIPAL
	
	iniciar_sesion();	
	
	 $("#cerrar_sesion,#cerrar_sesion2").click(function(){							
		cerrar_sesion();
	 });
	 
	 $("#btn_reg").click(function(){							
		$("#preg_visita").show();
		$("#info_visita1").hide();
		$("#info_visita2").hide();
		$("#add_err").html("");
		
	 });
	 
	 //if (typeof(nombre) == "undefined") { // NO HA INICIADO SESION EL USUARIO

});

$(document).on("pagecreate","#features",function(){ // CONTROL DE LA ACTIVIDAD DEL COMERCIAL
	
	iniciar_sesion();	

});

function cerrar_sesion(){ //Cierro Sesion
		var cerrado=1;
		$.ajax({
            type: "POST",
            url: "php/logout.php",
            data: "cerrado="+cerrado,
            success: function(html){
				if(html==1){
					$.mobile.changePage( "index.php?c=1", { transition: "flip"} );
					//window.location.reload(true);
					id_usuariobd=undefined;
					usuario=undefined;
					nombre=undefined;
					nivel=undefined;
					location.reload(true);
				}else{
					alert("error");
				}
            }
        });	
}

function iniciar_sesion(){ // Verifico si Inicio la Sesion
		var verifico=1;
		$.ajax({
            type: "POST",
            url: "php/iniciar.php",
            data: "verificar="+verifico,
            success: function(html){
				if(html >=1){
					id_usuariobd = html;
				}
            }
        });	
}


