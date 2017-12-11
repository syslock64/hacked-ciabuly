<?php 
include 'clasesPromperu/categoria.class.php';

$hj = new Categoria();

//variable se usa en varios
 $cat_id = $_POST['categoriaID'];

if($_POST['opcion']=='add'){

  $cat_nombre = $_POST['nombre_cat'];
  $cat_nombre_en = $_POST['nombre_cat_en'];

  $add = $hj->Agregar($cat_nombre,$cat_nombre_en);

}
else if($_POST['opcion']=='edit'){

 $cat_m_nombre = $_POST['nombre_cat'];
 $cat_m_nombre_en = $_POST['nombre_cat_en'];


 $edit = $hj->Modificar($cat_m_nombre,$cat_m_nombre_en,$cat_id);

}
else if($_GET['op']=='delete'){
	$hj->Eliminar($_GET['id']);
}else{
$rsHj = $hj->listar();
foreach($rsHj as $col){ 
	$v_listaCategorias.="<li>".$col['categoria_nombre']." -  ".$col['categoria_id']."</li>";
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
	<a href="categoriaview.php?op=add">Add</a>
	<a href="categoriaview.php?op=edit">Edit</a>
	<a href="categoriaview.php?op=delete&id=3">Delete</a>
</div>

<?php if($_GET['op']=='add'){
?>

<form action="categoriaview.php" method="POST">	
	<input type="text" name="nombre_cat">
	<input type="text" name="nombre_cat_en">
	<input type="text" name="opcion" value="add">
	<button type="submit">Guardar</button>
</form>

<?php
}else if($_GET['op']=='edit'){ ?>

<form action="categoriaview.php" method="POST">
	<input type="text" name="nombre_cat">
	<input type="text" name="nombre_cat_en">
	<input type="text" name="categoriaID" value="1">
	<input type="text" name="opcion" value="edit">
	<button type="submit">Guardar</button>
</form>

<?php } ?>

 </body>
 </html>