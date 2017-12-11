<div class="section_home">
	<div class="container">
	    <div id="catalogo_header" class="col-xs-12">
	        <h1><b>NUESTRAS PRENDAS</b></h1>
	    </div>
	    <div id="catalogo_items" class="col-sm-3 col-xs-12">
	        <ul class="col-xs-12">
             <?php while($colc = mysqli_fetch_assoc($resultCat))  { ?>
	            
                <li <?php if($colc['categoria_id']==$catList){echo 'class="active"';} ?> >
                    <a href="catalogo.php?cat=<?php echo $colc['categoria_id']; ?>">
                        <?php 
                            if($site['lang']=='es'){
                                echo utf8_encode($colc['categoria_nombre']); 
                            }
                            else{
                                echo utf8_encode($colc['categoria_nombre_ingles']); 
                            }
                         ?>
                    </a>
                </li>

            <?php  } ?>
	        </ul>
	    </div>
	    <div id="catalogo_imgs" class="col-sm-9 col-xs-12">
        <?php   if($result){ 
                while($col = mysqli_fetch_assoc($result)){ ?>
                    <div class="col-sm-4 col-xs-12">
                        <center>
                            <img  class="img-responsive" src="sis/view/app/img/productos/<?php echo $col['producto_imagen']; ?>" alt="">
                        </center>
                        <div class="catalogo_detalle_img ">
                            <p class="col-xs-8"> <?php 
                            if($site['lang']=='es'){
                                echo utf8_encode($col['producto_nombre']); 
                            }
                            else{
                                echo utf8_encode($col['producto_nombre_ingles']); 
                            }
                         ?></p> 
                            <a href="catalogo_detalle.php?prod=<?php echo $col['producto_id']?>"><img src="app/img/catalogo/lupa.png" alt=""></a>
                           
                        </div>
                    </div>
            <?php  }
             } 
             else{
                echo 'No hay Productos';
                }
            
           ?>
	        
	    </div>
            <div class="content_paginador text-center">
		<ul class="pagination">
			<?php
			if($totalRegistro > $totMAX){
				for($i=0;$i<$cantPag;$i++){
					if($_GET['cat']==''){
						$pag = '?pag='.$i;
					}else if($_GET['lang']!='' and $_GET['cat']!=''){
						//$pag = '?lang='.$_GET['lang'].'&cat='.$_GET['cat'].'&pag='.$i;
					}else{
						$pag = '?cat='.$_GET['cat'].'&pag='.$i;
					}
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
</div>