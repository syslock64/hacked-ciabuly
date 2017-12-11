<?php 
include 'clasesPromperu/producto.class.php';

$hj = new Producto();

//variable se usa en varios
 $prod_id = $_POST['productoID'];

if($_POST['opcion']=='add'){

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$archivo = $_POST['archivo'];
$nombre_en = $_POST['nombre_en'];
$desripcion_en = $_POST['desripcion_en'];
$archivo_en = $_POST['archivo_en'];
$categoria_id = $_POST['categoria_id'];
  
    $add = $hj->Agregar($nombre,$descripcion,$imagen,$archivo,$nombre_en,$desripcion_en,$archivo_en,$categoria_id);

}
else if($_POST['opcion']=='edit'){

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$archivo = $_POST['archivo'];
$nombre_en = $_POST['nombre_en'];
$desripcion_en = $_POST['desripcion_en'];
$archivo_en = $_POST['archivo_en'];
$categoria_id = $_POST['categoria_id'];

    $edit = $hj->Modificar($nombre,$descripcion,$imagen,$archivo,$nombre_en,$desripcion_en,$archivo_en,$categoria_id,$prod_id);

}
else if($_GET['op']=='delete'){

	$hj->Eliminar($_GET['id']);

}else{

	$rsHj = $hj->listar();

foreach($rsHj as $col){ 

	$v_listaCategorias.="<li>".$col['producto_id']." - ".$col['producto_nombre_ingles']."-</li>";
}

}
 ?>


 <html>
 <head>
 	<title></title>
 <style type="text/css">
	.container{width: 994px;margin: auto;background: #ccc;}
 </style>
 </head>
 <body>
 
<div class="container">
	<ul>
	<?php echo $v_listaCategorias; ?>
	</ul>
	<a href="productoview.php?op=add">Add</a>
	<a href="productoview.php?op=edit">Edit</a>
	<a href="productoview.php?op=delete&id=2">Delete</a>
</div>

<?php if($_GET['op']=='add'){
?>

<form action="productoview.php" method="POST">	
	<select name="categoria_id">
		<option value="1">opcion 1</option>
		<option value="2">opcion 2</option>
		<option value="3">opcion 3</option>
	</select>
	<input type="text" name="nombre">
	<input type="text" name="descripcion">
	<input type="file" name="imagen">Foto	
	<input type="file" name="archivo">Doc
	<input type="text" name="nombre_en">
	<input type="text" name="desripcion_en">
	<input type="file" name="archivo_en">Doc
	<input type="text" name="opcion" value="add">
	<button type="submit">Guardar</button>
</form>

<?php
}else if($_GET['op']=='edit'){ ?>

<form action="productoview.php" method="POST">
	<select name="categoria_id">
		<option value="1">opcion 1</option>
		<option value="2">opcion 2</option>
		<option value="3">opcion 3</option>
	</select>
	<input type="text" name="nombre">
	<input type="text" name="descripcion">
	<input type="file" name="imagen">Foto	
	<input type="file" name="archivo">Doc
	<input type="text" name="nombre_en">
	<input type="text" name="desripcion_en">
	<input type="file" name="archivo_en">Doc

	<input type="text" name="productoID" value="1">
	<input type="text" name="opcion" value="edit">
	<button type="submit">Guardar</button>
</form>

<?php } ?>

 </body>
 </html>