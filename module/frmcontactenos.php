<?php if (isset($_POST['nombre'])){
	require '../common/secufaile.php'; require '../common/config.php';
	require SLASH_SUP.$path['lib'].'phpmailer'.SLASH.'class.phpmailer.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth=true;
	$mail->SMTPSecure="ssl";
	$mail->Host="smtp.live.com";
	$mail->Port=25;
	$mail->Username="webradicalac@hotmail.com";
	$mail->Password="xxx";
    $mail->AddReplyTo($_POST['correo'], $_POST['nombre']);
	$mail->From="webradicalac@hotmail.com";
	$mail->FromName="Datos de Contáctenos - Página web";
	$mail->Subject="Datos de Contáctenos - Página web";
	$mail->AltBody="Datos de Contáctenos - Página web";
	$mail->CharSet="UTF-8";
	$mail->MsgHTML("
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		<body>
<div style='width:750px;margin: auto;'>
	<div style='color:#fff;text-align:center;background:#5A5959;padding-top:15px;padding-bottom:15px;'>
		<h1>Datos enviados de la página web </h1>
	</div>

	<div style='width:100%;border:1px solid #ccc;padding-top:15px;padding-bottom:15px;'>
		<table class='table table-bordered' style='margin: auto;'> 
			<thead> 
				<tr>  
					<th style='border:1px solid #000;padding:8px;'>Nombre</th> 
					<th style='border:1px solid #000;padding:8px;'>Teléfono</th> 
					<th style='border:1px solid #000;padding:8px;'>Correo</th> 
					<th style='border:1px solid #000;padding:8px;'>Mensaje</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr>  
					<td style='border:1px solid #000;padding:8px;'>".$_POST['nombre']."</td> 
					<td style='border:1px solid #000;padding:8px;'>".$_POST['telefono']."</td> 
					<td style='border:1px solid #000;padding:8px;'>".$_POST['correo']."</td> 
					<td style='border:1px solid #000;padding:8px;'>".$_POST['mensaje']."</td> 
				</tr> 
			</tbody> 
		</table>
	</div>

	<div style='color:#fff;text-align:center;background:#5A5959;padding-top:15px;padding-bottom:15px;'>
		<h1></h1>
	</div>
</div>
		</body>
		<html>
	");
	$mail->AddCC("hvasquez@heedcom.com","hvasquez@heedcom.com");
	$mail->IsHTML(true);
	if(!$mail->Send()) { $rpta = $contact['msgok']; } else { $rpta = $contact['msgerror']; }
	echo $rpta; exit(1);
} ?>

<form name="frmcontactenos" id="frmcontactenos">
	<div class="row form-content">
		<div class="col-xs-6">
		  <div class="form-group">
		    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
		  </div>
		</div>
    <div class="col-xs-6">
      <div class="form-group">
        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono">
      </div>
    </div>
  </div>
  <div class="row form-content">
		<div class="col-xs-6">
		  <div class="form-group">
		    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo">
		  </div>
		</div>
    <div class="col-xs-6">
      <div class="form-group">
        <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular">
      </div>
    </div>
	</div>
  <div class="form-group">
    <textarea class="form-control textar" name="mensaje" id="mensaje" placeholder="Mensaje"></textarea>
  </div>
  <div class="text-right">
  	 <button type="submit" class="btn-send" id="EnviarForm">ENVIAR</button>
  </div>
 
  <div id="dialog" title="Mensaje Contáctenos" style="display:none;">
    <p id="rpta"></p>
  </div>
</form>
<link rel="stylesheet" href="common/lib/jqueryui/css/ui-lightness/jquery-ui-1.9.2.custom.min.css"/>
<script src="common/lib/jqueryui/js/jquery-ui-1.9.2.custom.min.js"></script>
<script>
<!--
$(document).ready(function(){
	$("#EnviarForm").click(function(){
		var nombre = $("#nombre").val();
		var telefono = $("#telefono").val();
		var correo = $("#correo").val();
		var mensaje = $("#mensaje").val(); 
		if(nombre.length < 1){
			alert("El nombre es obligatorio");
			return false;
		}
		if(telefono.length < 1){
			alert("El telefono es obligatorio");
			return false;
		}
		if(correo.length < 1){
			alert("La correo es obligatorio");
			return false;
		}
		if(mensaje.length < 1){
			alert("El mensaje es obligatorio");
			return false;
		}
		$.ajax({
			url:'module/frmcontactenos.php',
			type:'POST',
			data:{nombre:nombre, telefono:telefono,  correo:correo, mensaje:mensaje},
			datatype:'html',
			beforeSend:function(){
				$("#dialog").dialog({
					resizable:false,
					modal:true,
					autoOpen:true,
					width:350,
					height:120
				});
				$("#dialog #rpta").html("Enviando...");
			},
			success:function(html){
				$("#dialog #rpta").html(html);
			}
		});
	});
});
//-->
</script>