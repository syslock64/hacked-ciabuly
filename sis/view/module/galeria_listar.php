
  <div class="col-lg-6 col-md-offset-6 row">
    <div class="input-group">	
	      <input type="text" id="gal_buscar" name="gal_buscar" class="form-control" placeholder="Buscar por título...">
	      <span class="input-group-btn">
	        <button id="btn_search" class="btn btn-default" type="" onclick="buscarRegistro()">Ir</button>
	      </span>
    </div>
  </div>

  <br>	

		<!-- btn nueva categoría -->
		<div class="barra_opciones">
			<a id="btn_add" class="btn btn-default" value="add" href="galeria.php?op=add">+ Nueva Foto</a>	
			<button id="btn_state" class="btn btn-default" value="state" onclick="Desactivar()">+ <?php echo $btn1; ?></button>
			<a id="btn_list_state" class="btn btn-default" value="list_state" href="galeria.php?op=list_state">+ Lista de Desactivados</a>
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
						<th>Foto</th>
						<th>Título de Foto</th> 
						<th>Título de Foto en Inglés</th> 
						<th>Modificar</th>
					</tr> 
				</thead> 
				<tbody> 
			    <?php 
				$lista='';
					while ($col = mysqli_fetch_assoc($result)){  ?>
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
					</tr>
					<?php }
			     ?>
				</tbody> 
			</table>	
		</div>

		<!-- AKI PAG -->
		<div class="content_paginador text-center">
		<ul class="pagination">
		<?php
		if($totalRegistro > $totMAX){
			for($i=0;$i<$cantPag;$i++){
				$pag = '?pag='.$i;
				if($_GET['pag']==$i){ $activePag = 'class="active"';}else{$activePag='';}
		?>	
				<li <?php echo $activePag; ?>>
					<a href="<?php echo basename($_SERVER['PHP_SELF']).$pag; ?>">
						<?php echo $i+1; ?>
					</a>
				</li>		
		<?php } } ?>
		</ul>
		</div>
		
</div>

		<script type="text/javascript">

			function Desactivar(){
				document.getElementById("frm_galeria").action="galeria.php?op=state";
			}


			function eliminarRegistro(){ 
				bootbox.confirm("¿Está seguro de eliminar la(s) categoría(s) seleccionada(s)?", function(result) {
					//alert(result);
				    if(result==true) {
				        document.getElementById("frm_galeria").action="galeria.php?op=del";
				        document.getElementById("frm_galeria").submit();
				        
				    }else{    
				        document.getElementById("frm_galeria").action="galeria.php";
				        document.getElementById("frm_galeria").submit();
				    }
				});
			}

			function buscarRegistro(){
				document.getElementById("frm_galeria").action="galeria.php?op=search";
				document.getElementById("frm_galeria").submit();
			}

			$().ready(function(){
			  $('input.myClass').prettyCheckable({
			    color: 'red',
			    label: '&nbsp;'
			  });
			});

		</script>