<?php 
require 'models/clases/producto.class.php';
$producto = new Producto();
$crud = new Crud();
$conect = $crud->conec();

$resultCat = mysqli_query($conect,$producto->listarCategorias());

$idProd = $_GET['prod'];

$result = mysqli_query($conect,$producto->detalleProducto($idProd));

$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 
?>
