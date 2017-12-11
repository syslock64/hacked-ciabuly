<?php 
require 'models/clases/galeria.class.php';
$galeria = new Galeria();
$crud = new Crud();
$conect = $crud->conec();

$cantInter=9;// Cantidad de items por página

	//Para contar si hay registros activos
	$rsGaleria = $galeria->Listar();

	// DATA PAGINADOR
	$totalRegistro = count($rsGaleria);
	$intervalo = $cantInter; // Mysql-> LIMIT
	$cantPag = $totalRegistro/$intervalo;
	$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
	$totMAX = $intervalo;

//Modelo como llamar listados con paginador
$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 

?>