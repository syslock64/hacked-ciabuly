<?php 
include 'clasesPromperu/galeria.class.php';

$hj = new Galeria();

//variable se usa en varios
 $gal_id = $_POST['galeriaID'];

if($_POST['opcion']=='add'){

    $titulo = $_POST['titulo'];
    $titulo_en = $_POST['titulo_en'];
    $imagen = $_POST['imagen'];
  
    $add = $hj->Agregar($titulo,$imagen,$titulo_en);

}
else if($_POST['opcion']=='edit'){

    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $titulo_en = $_POST['titulo_en'];

    $edit = $hj->Modificar($titulo,$imagen,$titulo_en,$gal_id);

}
else if($_GET['op']=='delete'){

	$hj->Eliminar($_GET['id']);

}else{

	$rsHj = $hj->listar();

foreach($rsHj as $col){ 

	$v_listaCategorias.="<li>".$col['galeria_titulo']." - ".$col['galeria_imagen']."-</li>";
	
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
	<a href="galeriaview.php?op=add">Add</a>
	<a href="galeriaview.php?op=edit">Edit</a>
	<a href="galeriaview.php?op=delete&id=4">Delete</a>
</div>

<?php if($_GET['op']=='add'){
?>

<form action="galeriaview.php" method="POST">	
	<input type="text" name="titulo">
	<input type="text" name="titulo_en">
	<input type="file" name="imagen">
	<input type="text" name="opcion" value="add">
	<button type="submit">Guardar</button>
</form>

<?php
}else if($_GET['op']=='edit'){ ?>

<form action="galeriaview.php" method="POST">
	<input type="text" name="titulo">
	<input type="text" name="titulo_en">
	<input type="file" name="imagen">
	<input type="text" name="galeriaID" value="1">
	<input type="text" name="opcion" value="edit">
	<button type="submit">Guardar</button>
</form>

<?php } ?>

 </body>
 </html>