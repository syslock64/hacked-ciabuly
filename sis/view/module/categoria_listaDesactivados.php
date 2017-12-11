		<!-- btn nueva categoría -->
		<div class="barra_opciones">
			<a id="btn_add" class="btn btn-default" value="add" href="categoria.php?op=add">+ Nueva Categoría</a>	
			<button id="btn_state" class="btn btn-default" value="state" onclick="stado_NoPublicado_Publicado()">+ <?php echo $btn1; ?></button>
			<a id="btn_list_state" class="btn btn-default" value="list_state" href="categoria.php">+ Lista de Activados</a>
			<!--a id="btn_delete" class="btn btn-default" value="delete" href="categoria.php?op=add">+ Eliminar</a-->		
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
						<!--th style="text-align:center;">Borrar</th-->
					</tr> 
				</thead> 
				<tbody> 
			    <?php 
				$lista='';
					foreach($rsNoPublicados as $col){  ?>
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
						<!--td style="text-align:center;">
							<button class="btn_delete" value="<?php echo $col['categoria_id']; ?>" onclik="btn_delete(this.value)">
								<img src="app/img/cancel.png">
							</button>
						</td-->
					</tr>
					<?php }
			     ?>
				</tbody> 
			</table>	
		</div>
		</div>

<script type="text/javascript">

	function stado_NoPublicado_Publicado(){
		document.getElementById("frm_categoria").action="categoria.php?op=stateNP";
	}

	$().ready(function(){
	  $('input.myClass').prettyCheckable({
	    color: 'red',
	    label: '&nbsp;'
	  });
	});

</script>