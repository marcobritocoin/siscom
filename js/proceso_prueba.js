// JQUERY.MOBILE
//Ing. Marco Brito

$(document).on("pagecreate","#login",function(){
	/*										  
  $("#Username").on("tap",function(){
    $(this).hide();
  }); */
  
  	
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
		}
        else if(password=="")
        {
			$("#add_err").html("(*) Ingrese una Clave");
		}
		else
        {
         $.ajax({
            type: "POST",
            url: "login/login.php",
            data: "name="+username+"&pwd="+password,
            success: function(html){
				alert(html);
              if(html)
              {
                //$("#login_form").fadeOut("normal");
				//$("#shadow").fadeOut();
				//$("#profile").html("<a href='logout.php' id='logout'>Logout</a>");
				//window.location="index.php";
				$("#add_err").html("Bienvenido ha Ingresado al Sistema");
				
              }
              else
              {
                    $("#add_err").html("Error de Busqueda");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Cargando...")
            }
        });
		
		}
         return false;
    }); //fin del evento click
  
});

