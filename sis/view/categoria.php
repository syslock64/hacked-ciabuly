<?php 
require('../controller/categoria.controller.php'); 
require_once('./logic/categoria.logic.php');
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
	<link rel="stylesheet" href="app/css/prettyCheckable.css">
	<script src="app/js/jquery.js"></script>
	<script src="app/js/bootstrap.js"></script>
	<script src="app/js/bootbox.js"></script>
	<script src="app/js/jquery.fancybox.js"></script>
	<script src="app/js/prettyCheckable.js"></script>
</head>

<body>
<?php include 'tpl/header.php'; ?>
<!-- ////////////////////////////// -->


<div class="row-fluid">
	<div class="container">
		<div class="barra_superior">
			Mantenimiento de Categorías
		</div>
<form id="frm_categoria" action="" method="POST">

<?php 
switch ($indicador_view) {
	case 1:
		include 'module/categoria_listar.php';
		break;
	case 2:
		include 'module/categoria_agregar.php';
		break;
	case 3:
		include 'module/categoria_modificar.php';
		break;
	case 4:
		include 'module/categoria_listaDesactivados.php';
		break;
	case 5:
		include 'module/categoria_busqueda.php';
		break;
}

 ?>

</form>
	</div>
</div>

<!-- //////////////////////////////// -->
<?php include 'tpl/footer.php'; ?>

</body>
</html>

