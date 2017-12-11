		<!-- btn nueva categoría -->
		<div class="barra_opciones">
			<a id="btn_add" class="btn btn-default" value="add" href="galeria.php?op=add">+ Nueva Categoría</a>	
			<button id="btn_state" class="btn btn-default" value="state" onclick="stado_Activar()">+ <?php echo $btn1; ?></button>
			<a id="btn_list_state" class="btn btn-default" value="list_state" href="galeria.php">+ Lista de Activados</a>
			<!--a id="btn_delete" class="btn btn-default" value="delete" href="galeria.php?op=add">+ Eliminar por grupo</a-->		
		</div>

		<div class="container" id="frm_addCategoria">
		<div class="table-responsive">
			<?php echo $msgNoRegistros; ?>
			<table class="table table-striped table-hover"> 
				<thead> 
					<tr>
						<th>#</th>
						<!--th>ID</th--> 
						<th>Foto</th>
						<th>Título de Foto</th> 
						<th>Título de Foto en Inglés</th> 
						<th>Modificar</th>
						<!--th style="text-align:center;">Borrar</th-->
					</tr> 
				</thead> 
				<tbody> 
			    <?php 
				$lista='';
					foreach($rsDesactivados as $col){  ?>
					<tr> 
						<td style="vertical-align: inherit;">
							<input type="checkbox" class="myClass" name="check[]" value="<?php echo $col['galeria_id']; ?>">
						</td>
						<!--th scope='row'><?php echo $col['galeria_id']; ?></th--> 
						<td>
							<a class="fancybox" href="app/img/galeria/<?php echo $col['galeria_imagen']; ?>">
								<img class="img_list" src="app/img/galeria/<?php echo $col['galeria_imagen']; ?>" alt="" title="<?php echo $col['galeria_imagen']; ?>"/>	
							</a>		
						</td>
						<td style="vertical-align: inherit;">
							<?php echo utf8_encode($col['galeria_titulo']); ?>
						</td> 
						<td style="vertical-align: inherit;">
							<?php echo utf8_encode($col['galeria_titulo_ingles']); ?>
						</td> 
						<td style="vertical-align: inherit;">
							<a class="btn_edit" href="galeria.php?op=edit&gal=<?php echo $col['galeria_id']; ?>">
								<img src="app/img/edit.png">
							</a>
						</td>
						<!--td style="text-align:center;">
							<button type="button" class="btn_delete" value="<?php echo $col['categoria_id']; ?>" onclik="btn_delete(this.value)">
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

	function stado_Activar(){
		document.getElementById("frm_galeria").action="galeria.php?op=stateNP";
	}

	$().ready(function(){
	  $('input.myClass').prettyCheckable({
	    color: 'red',
	    label: '&nbsp;'
	  });
	});

</script>