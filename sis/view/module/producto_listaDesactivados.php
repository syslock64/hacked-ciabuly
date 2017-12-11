		<div class="barra_opciones">
			<a id="btn_add" class="btn btn-default" value="add" href="producto.php?op=add">+ Nuevo Producto</a>	
			<button id="btn_state" class="btn btn-default" value="state" onclick="stado_Activar()">+ <?php echo $btn1; ?></button>
			<a id="btn_list_state" class="btn btn-default" value="list_state" href="producto.php">+ Lista de Activados</a>
			<!--a id="btn_delete" class="btn btn-default" value="delete" onclick="eliminarRegistro()">+ Eliminar</a-->
		</div>

		<div class="container" id="frm_addCategoria">
		<div class="table-responsive">
			<?php echo $msgNoRegistros; ?>
			<table class="table table-striped table-hover"> 
				<thead> 
					<tr>
						<th>#</th>
						<!--th>ID</th--> 
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Detalle</th>
						<th>Modificar</th>
						<th>Categoría</th>
					</tr> 
				</thead> 
				<tbody> 
			    <?php 
				$lista='';
					foreach($rsDesactivados as $col){  ?>
					<tr> 
						<td style="vertical-align: inherit;">
							<input type="checkbox" class="myClass" name="check[]" value="<?php echo $col['producto_id']; ?>">
						</td>
						<!--th scope='row'><?php echo $col['producto_id']; ?></th--> 
						<td>
							<a class="fancybox" href="app/img/productos/<?php echo $col['producto_imagen']; ?>">
								<img class="img_list" src="app/img/productos/<?php echo $col['producto_imagen']; ?>" alt="" title="<?php echo $col['producto_imagen']; ?>"/>	
							</a>		
						</td>
						<td style="vertical-align: inherit;">
							<?php echo utf8_encode($col['producto_nombre']); ?>
						</td>


						<td style="vertical-align: inherit;">
							<a class="fancybox ver_det" href="#desc_es<?php echo $col['producto_id']; ?>">Ver Detalle</a>
						
							<!-- Contenedor que tiene detalle de prod -->
							<div id="desc_es<?php echo $col['producto_id']; ?>" style="display:none;">
								<div class="container">
									<h3>Detalle de producto - <?php echo utf8_encode($col['producto_nombre']); ?></h3>
									<div class="group_detail">
											<h4><b>Descripción en Español:</b></h4>
											<?php echo htmlspecialchars_decode($col['producto_descripcion']); ?>	
									</div>
									<div class="group_detail">
											<h4><b>Archivo PDF en Español:</b></h4>
											<?php 
												if($col['producto_archivo']!=''){
											?>
												<a href="app/docs/<?php echo $col['producto_archivo']; ?>" target="_blank">
													<img src="app/img/pdf.png" title="PDF en Español" alt="">
												</a>
											<?php 
												}else{
											?>
												<small style="color:orange;">No hay archivo.</small>
											<?php
												}
											?>	
									</div>
									<div class="group_detail">
											<h4><b>Nombre en Inglés:</b></h4>
											<?php echo utf8_encode($col['producto_nombre_ingles']); ?>	
									</div>
									<div class="group_detail">
											<h4><b>Descripción en Inglés:</b></h4>
											<?php echo htmlspecialchars_decode($col['producto_descripcion_ingles']); ?>	
									</div>
									<div class="group_detail">
											<h4><b>Archivo PDF en Inglés:</b></h4>
											<?php 
											if($col['producto_archivo_ingles']!=''){
											?>
											<a href="app/docs/<?php echo $col['producto_archivo_ingles']; ?>" target="_blank">
												<img src="app/img/pdf.png" title="PDF en Inglés" alt=""/>
											</a>
											<?php 
												}else{
											?>
											<small style="color:orange;">No hay archivo.</small>
											<?php
												}
											?>	
									</div>
								</div>
							</div>
						</td>


						<td style="text-align:center;vertical-align: inherit;">
							<a class="btn_edit" href="producto.php?op=edit&prod=<?php echo $col['producto_id']; ?>">
								<img src="app/img/edit.png">
							</a>
						</td>
						<td style="vertical-align: inherit;">
							<?php echo utf8_encode($col['categoria_nombre']); ?>
						</td>
					</tr>

					<?php }
			     ?>
				</tbody> 
			</table>
		</div>
		</div>

<script type="text/javascript">

	function stado_Activar(){
		document.getElementById("frm_producto").action="producto.php?op=stateNP";
	}

	$().ready(function(){
	  $('input.myClass').prettyCheckable({
	    color: 'red',
	    label: '&nbsp;'
	  });
	});

</script>