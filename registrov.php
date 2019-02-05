<?php session_start(); ?>
<?php if(isset($_SESSION['usuario'])){ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="images/apple-touch-startup-image-640x1096.png">
<meta name="author" content="Ing. Marco Brito - Tlf: (0412) 960.07.29" />
<meta name="description" content="Registro de Visita de los Comerciales" />
<meta name="keywords" content="registro, visitas, comercial, comerciales, ventas, fuerza de ventas" />
<title>SISCOM - Registro de Visita</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<style>
.custom-label-flipswitch.ui-flipswitch .ui-btn.ui-flipswitch-on {
    text-indent: -3.4em;
}
.custom-label-flipswitch.ui-flipswitch .ui-flipswitch-off {
    text-indent: 0.5em;
}
</style>
</head>
<body>

<div data-role="page" id="contact" class="secondarypage" data-theme="b">

<div class="back_btn"><a href="index.php" data-transition="flip"><img src="images/icons/black/back.png" alt="" title="" /></a></div>

    <div role="main" class="ui-content">
	
       <div class="pages_maincontent">
	    
	   
              <div id="titulo" class="form_logo" style="font-size:28px;">REGISTRO DE VISITA</div>
              
			  <div class="page_content"> 

                    <h2 id="Note"></h2>
                    <div class="contactform">
                	
					<div id="preg_visita">
						 <center><label for="flip-checkbox-1">¿Fue Efectiva su Visita?</label></center>
						 <a id="btn_si" href="#" class="ui-btn ui-corner-all">Si</a>
						 <a id="btn_no" href="#" class="ui-btn ui-corner-all">No</a>
					</div> <!-- /fin preguntas -->
				
					<div id="info_visita1" style="display:none;">
						<input type="text" id="Cliente" name="Cliente" value="" class="form_input required" placeholder="Cliente" data-role="none" />
						<input type="text" id="NombContact" name="NombContact" value="" class="form_input required" placeholder="Persona de Contacto" data-role="none" />
						<input type="text" id="tlf_contacto" name="tlf_contacto" value="" class="form_input required" placeholder="Tlf. de Contacto" data-role="none" />
						<textarea name="linea_present" id="linea_present" class="form_textarea textarea required" rows="" cols="" placeholder="Lineas Presentadas" data-role="none"></textarea>
						<input type="text" id="km_vehiculo" name="km_vehiculo" value="" class="form_input required" placeholder="Km del Vehiculo" data-role="none" />
	
						<input type="submit" name="submit" class="form_submit" id="submit" data-role="none" value="GUARDAR" />
                   	</div> <!-- /fin info visita1 -->
					
					<div id="info_visita2" style="display:none;">
						<input type="text" id="Cliente2" name="Cliente2" value="" class="form_input required" placeholder="Cliente" data-role="none" />
						<textarea name="motivo" id="motivo" class="form_textarea textarea required" rows="" cols="" placeholder="Motivo de no ser atendido" data-role="none"></textarea>
						<input type="text" id="km_vehiculo2" name="km_vehiculo2" value="" class="form_input required" placeholder="Km del Vehiculo" data-role="none" />
						<input type="submit" name="submit2" class="form_submit" id="submit2" data-role="none" value="GUARDAR" />
                   	</div> <!-- /fin info visita2 -->
					
					<input id="latitud" type="hidden" name="latitud"  value="" />
                    <input id="longitud" type="hidden" name="longitud" value="" />
               
                    </div> <!-- /fin contacform -->
					
					<div class="err" id="add_err" style="text-align:center; color:#FF0000; font-weight:bold; font-size:16px;"></div>
					<div class="close_loginpopup_button"><a href="index.php" data-transition="flip"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>  
           
              </div> <!-- /fin page_content -->
       </div><!-- /fin pages_maincontent -->
    </div><!-- /content -->


</div><!-- /page -->
<script src="js/jquery.min.js"></script>
<script src="js/procesos_mobile.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>
<?php } else { ?>
<script>
location.href ="index.php";
</script>	
<?php } //fin del IF session ?>		  

