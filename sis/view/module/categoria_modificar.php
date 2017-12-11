<div class="col-md-6 col-md-offset-3 text-right">
	<small>Campos obligatorios (*)</small>	
</div>

<div class="container content_frm_g">
<div class="col-md-6 col-md-offset-3 form_addEdit_g" id="">
<h3>Modificar Datos de Categoría - <?php echo $colmc['categoria_nombre']; ?></h3>
<br>
<form action="categoria.php?op=edit" method="POST" data-toggle="validator" role="form">
	  <div class="form-group">
	    <label for="categoria_nombre">Nombre de Categoría *</label>
	    <input type="text" class="form-control" name="categoria_nombre" id="categoria_nombre" value="<?php echo $colmc['categoria_nombre']; ?>" maxlength="40" required>
	  	<small>Max. Caracteres: 40</small>
	  </div>
	  <div class="form-group">
	    <label for="categoria_nombre_en">Nombre de Categoría en inglés *</label>
	    <input type="text" class="form-control" name="categoria_nombre_en" id="categoria_nombre_en" value="<?php echo $colmc['categoria_nombre_ingles']; ?>" maxlength="40">
	  	<small>Max. Caracteres: 40</small>
	  </div>
	  <input type="hidden" name="cat" value="<?php echo $_GET['cat']; ?>">
	  <input type="hidden" name="frm_op" value="frm_edit">
		<?php
			echo $msg_categoria;
		?>	
	  <button type="submit" class="btn btn-default">Guardar</button>
	  <button type="button" class="btn btn-default" onclick="document.location='categoria.php'">Ir a Lista de Categrías</button>
	</fieldset>
</form>	
</div>
</div>