<?php 
require('../controller/galeria.controller.php'); 
require_once('./logic/galeria.logic.php');
?>
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
	<link rel="stylesheet" type="text/css" href="app/css/fileinput.css">
	<link rel="stylesheet" href="app/css/prettyCheckable.css">
	<script src="app/js/jquery.js"></script>
	<script src="app/js/bootstrap.js" type="text/javascript"></script>
	<script src="app/js/bootbox.js"></script>
	<script src="app/js/jquery.fancybox.js"></script>
	<script src="app/fileinput/js/plugins/canvas-to-blob.js"></script>
	<script src="app/js/fileinput.js"></script>
	<script src="app/fileinput/js/fileinput_locale_es.js"></script>
	<script src="app/js/prettyCheckable.js"></script>
</head>

<body>
<?php include 'tpl/header.php'; ?>
<!-- ////////////////////////////// -->


<div class="row-fluid">
	<div class="container">
		<div class="barra_superior">
			Mantenimiento de Galería de Fotos
		</div>
<form id="frm_galeria" action="" method="POST" enctype="multipart/form-data">

<?php 
switch ($indicador_view) {
	case 1:
		include 'module/galeria_listar.php';
	break;

	case 2:
		include 'module/galeria_agregar.php';
	break;

	case 3:
		include 'module/galeria_modificar.php';
	break;
	case 4:
		include 'module/galeria_listaDesactivados.php';
	break;
	case 5:
		include 'module/galeria_busqueda.php';
	break;
}

 ?>

</form>

	</div>
</div>

<!-- //////////////////////////////// -->
<?php include 'tpl/footer.php'; ?>


<script type="text/javascript">
	$('.fancybox').fancybox({});
</script>
</body>
</html>