<?php 
require 'models/clases/producto.class.php';
$producto = new Producto();
$crud = new Crud();
$conect = $crud->conec();

$cantInter=9;// Cantidad de items por página

//Lista Categorias Activas
	$resultCat = mysqli_query($conect,$producto->listarCategorias());

	if($_GET['cat']==''){
		$ultCat = $producto->getUltimaCategoria();
		foreach($ultCat as $coluc);
		$catList = $coluc['categoria_id'];
	}else{
		$catList=$_GET['cat'];
	}
	$rsProducto = $result = mysqli_query($conect,$producto->Listar($catList));

	// DATA PAGINADOR
	if($rsProducto){
		$totalRegistro = mysqli_num_rows($rsProducto);
	}
	$intervalo = $cantInter; // Mysql-> LIMIT
	$cantPag = $totalRegistro/$intervalo;
	$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
	$totMAX = $intervalo;

	// QUERY LISTA CON PAGINADOR

	$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset,$catList));

$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 
?>