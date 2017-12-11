<?php 
ini_set('error_reporting',0);
if($_GET['msg']=='ep'){
	$mensaje = '<div class="msg_log" style="background: red;">
					<img src="app/img/logueo/rojo.png"><p>Contraseña Incorrecta</p>
				</div>';
}else if($_GET['msg']=='eu'){
	$mensaje = '<div class="msg_log" style="background: red;">
					<img src="app/img/logueo/rojo.png"><p>Usuario Incorrecto</p>
				</div>';
}else{
	$mensaje = '<div class="msg_log" style="background: steelblue;">
					<img src="app/img/logueo/azul.png"><p>Ingrese sus datos de acceso</p>
				</div>';
}
 ?>
<html>
<head>
   <meta charset="UTF-8">
   <meta lang="ES">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenidos al Logueo</title>
	<link rel="stylesheet" type="text/css" href="app/css/logueo.css">
	<link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
	<script src="app/js/jquery.js"></script>
	<script src="app/js/bootstrap.js"></script>
</head>
<body>
<header>
	<img src="app/img/logo.png">
</header>
<div class="container">
	<h2>Bienvenido a la Intranet de su Web</h2>
	<br><br><br>
	<div class="frm_log">
		<form action="moduleLogueo/validarData.php" method="POST">
			<fieldset>
				<legend>ADMINISTRADOR</legend>
				<?php echo $mensaje; ?>
				<input type="text" name="user" placeholder="Ususario">
				<input type="password" name="pass" placeholder="Contraseña">
				<button type="submit" id="btn_log">Iniciar Sesión</button>
			</fieldset>
		</form>
	</div>
	<div class="txt_log">
		<!--h3>TITULO</h3-->
		<p>		
			Nuestras acciones están orientadas a brindar soluciones tecnológicas y mejora de proceso para colaborar al
logro de sus objetivos, lo que nos permitirá apoyarlos en un crecimiento continuo y planificado
		</p>
	</div>
	<div class="datos_log">
		<img class="img" src="app/img/logocd.png">	
		<div class="info_log">
			<h3>Ayuda y soporte</h3>
			<p>(511) 719-7160 / (511) 719-7161</p>	
		</div>
	</div>
</div>
<footer>
	
</footer>
</body>
</html>