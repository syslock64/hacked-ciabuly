<div class="row">
<!-- Filtrar -->
<div class="col-md-4" id="producto_categoria">
	<label>Filtrar por Categorías</label>
	<select class="form-control" onclick="listaCategorias(this.value,1)">
		<option value="all">Todos</option>
	</select>
</div>
<div class="col-md-2"></div>
  <div class="col-md-6">
  	<label><br></label>
    <div class="input-group">	
	    <input type="text" id="prod_buscar" name="prod_buscar" class="form-control" placeholder="Buscar por nombre...">
	    <span class="input-group-btn">
	      <button id="btn_search" class="btn btn-default" type="" onclick="buscarRegistro()">Ir</button>
	    </span>
    </div>
  </div>	
</div>


  <br>	

		<!-- btn nueva categoría -->
		<div class="barra_opciones">
			<a id="btn_add" class="btn btn-default" value="add" href="producto.php?op=add">+ Nueva Foto</a>	
			<button id="btn_state" class="btn btn-default" value="state" onclick="Desactivar()">+ <?php echo $btn1; ?></button>
			<a id="btn_list_state" class="btn btn-default" value="list_state" href="producto.php?op=list_state">+ Lista de Desactivados</a>
			<a id="btn_delete" class="btn btn-default" value="delete" onclick="eliminarRegistro()">+ Eliminar</a>
		</div>



		<div class="container" id="frm_addCategoria">		
		<div class="table-responsive" id="t">
			<?php echo $msgNoRegistros; ?>
			<table class="table table-striped table-hover"> 
				<thead> 
					<tr>
						<th>#</th>
						<!--th>ID</th--> 	
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Detalle</th>
						<th style="text-align:center;">Modificar</th>
						<th>Categoría</th>
					</tr> 
				</thead> 
				<tbody> 
			    <?php 
				$lista='';
					foreach($rsProducto as $col){  ?>
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
											<?php echo $col['producto_nombre_ingles']; ?>	
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


	function Desactivar(){
		document.getElementById("frm_producto").action="producto.php?op=state";
	}


	function eliminarRegistro(){ 
		bootbox.confirm("¿Está seguro de eliminar él/los producto(s) seleccionado(s)?", function(result) {
			//alert(result);
		    if(result==true) {
		        document.getElementById("frm_producto").action="producto.php?op=del";
		        document.getElementById("frm_producto").submit();
		        
		    }else{    
		        document.getElementById("frm_producto").action="producto.php";
		        document.getElementById("frm_producto").submit();
		    }
		});
	}

	function buscarRegistro(){
		document.getElementById("frm_producto").action="producto.php?op=search";
		document.getElementById("frm_producto").submit();
	}

	function listaCategorias(cat_actual,op){

		 if (cat_actual=="") {
		  document.getElementById("producto_categoria").innerHTML="";
		 return;
		 } 
		 if (window.XMLHttpRequest) {
		 // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		 } else { // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 xmlhttp.onreadystatechange=function() {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("producto_categoria").innerHTML=xmlhttp.responseText;
		 }
		 }
		 xmlhttp.open("GET","jx_listaCategorias.php?cat="+cat_actual+"&op="+op,true);
		 xmlhttp.send();

	}

	function filtrarPoductos(cat_val){
		document.location="producto.php?op=filter&cat="+cat_val+"#t";
	}

	$().ready(function(){
	  $('input.myClass').prettyCheckable({
	    color: 'red',
	    label: '&nbsp;'
	  });
	});

</script>