<html>
<head>
   <meta charset="UTF-8">
   <meta lang="ES">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Mantenimiento Web</title>
	<link rel="stylesheet" type="text/css" href="app/css/style.css">
	<link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="app/css/jquery.fancybox.css">
	<script src="app/js/jquery.js"></script>
	<script src="app/js/bootstrap.js"></script>
	<script src="app/js/jquery.fancybox.js"></script>
</head>

<body>
<?php include 'tpl/header.php';include 'info/info.php'; ?>

<div id="popup" href="app/img/fotoHome.jpg">
	<div class="col-md-12">
		<h3>
			Bienvenidos a la Intranet de <?php echo $info['empresa'][0]; ?> <br>
		</h3> 
			<p>
			 Desde este momento toda transacción que realice es
			 almacenada, <br>
			 se recomienda verificar los cambios antes
			 de ser guardados.
			</p>	
	</div>
</div>

<div class="row-flid">
<img src="app/img/fotoHome.jpg" class="img_home" style="">		
</div>


<?php include 'tpl/footer.php'; ?>

<script type="text/javascript">
$.fancybox.open({
		href: '#popup',
		fitToView: true, 
		"autoScale": true, 
		scrolling: 'visible',
	});
</script>
</body>
</html>

