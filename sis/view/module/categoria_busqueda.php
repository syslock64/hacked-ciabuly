  <div class="col-lg-6 col-md-offset-6 row">
    <div class="input-group">	
	      <input type="text" id="cat_buscar" name="cat_buscar" class="form-control" placeholder="Buscar por nombre...">
	      <span class="input-group-btn">
	        <button id="btn_search" class="btn btn-default" type="" onclick="buscarRegistro()">Ir</button>
	      </span>
    </div>
  </div>

  <br>	

		<!-- btn nueva categoría -->
		<div class="barra_opciones">
			<a id="btn_add" class="btn btn-default" value="add" href="categoria.php?op=add">+ Nueva Categoría</a>	
			<button id="btn_state" class="btn btn-default" value="state" onclick="stado_Publicado_NoPublicado()">+ <?php echo $btn1; ?></button>
			<a id="btn_list_state" class="btn btn-default" value="list_state" href="categoria.php?op=list_state">+ Lista de Desactivados</a>
			<a id="btn_delete" class="btn btn-default" value="delete" onclick="eliminarRegistro()">+ Eliminar</a>
		</div>

		<div class="container" id="frm_addCategoria">
		<div class="table-responsive">
			<?php echo $msgNoRegistros; ?>
			<table class="table table-striped table-hover"> 
				<thead> 
					<tr>
						<th>#</th>
						<!--th>ID</th--> 
						<th>Nombre</th> 
						<th>Nombre en Inglés</th> 
						<th style="text-align:center;">Modificar</th>
					</tr> 
				</thead> 
				<tbody> 
			    <?php 
				$lista='';
					foreach($rsCategoria as $col){  ?>
					<tr> 
						<td style="vertical-align: inherit;">
							<input type="checkbox" class="myClass" name="check[]" value="<?php echo $col['categoria_id']; ?>">
						</td>
						<!--th scope='row'><?php echo $col['categoria_id']; ?></th--> 
						<td style="vertical-align: inherit;">
							<?php echo utf8_encode($col['categoria_nombre']); ?>
						</td> 
						<td style="vertical-align: inherit;">
							<?php echo utf8_encode($col['categoria_nombre_ingles']); ?>
						</td> 
						<td style="text-align:center;vertical-align: inherit;">
							<a class="btn_edit" href="categoria.php?op=edit&cat=<?php echo $col['categoria_id']; ?>">
								<img src="app/img/edit.png">
							</a>
						</td>
					</tr>
					<?php }
			     ?>
				</tbody> 
			</table>	
		</div>
</div>

<script type="text/javascript">

	function stado_Publicado_NoPublicado(){
		document.getElementById("frm_categoria").action="categoria.php?op=state";
	}


	function eliminarRegistro(){ 
		bootbox.confirm("¿Está seguro de eliminar la(s) categoría(s) seleccionada(s)?", function(result) {
			//alert(result);
		    if(result==true) {
		        document.getElementById("frm_categoria").action="categoria.php?op=del";
		        document.getElementById("frm_categoria").submit();
		        
		    }else{    
		        document.getElementById("frm_categoria").action="categoria.php";
		        document.getElementById("frm_categoria").submit();
		    }
		});
	}

	function buscarRegistro(){
		document.getElementById("frm_categoria").action="categoria.php?op=search";
		document.getElementById("frm_categoria").submit();
	}

	$().ready(function(){
	  $('input.myClass').prettyCheckable({
	    color: 'red',
	    label: '&nbsp;'
	  });
	});

</script>