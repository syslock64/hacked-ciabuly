<div class="section_home">
	<div id="galery_slider" class="col-xs-10 col-xs-offset-1">
	    <img class="img-responsive" src="app/img/galeria/banner.jpg" alt="">
	    
	    <h3>FABRICAMOS NUESTRO PROPIO TEJIDO EN PESO, MEDIDA Y COLORES</h3>
	</div>
	<div id="galery_items" class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
	<?php   while($col = mysqli_fetch_assoc($result))  { ?>
	    <div class="col-sm-4 col-xs-12">
	         <a class="fancybox" href="sis/view/app/img/galeria/<?php echo $col['galeria_imagen'];?>" data-fancybox-group="gallery">
                   <div class="bg">
                     <img class="img-responsive" src="sis/view/app/img/galeria/<?php echo $col['galeria_imagen'];?>" alt="">
                   </div>
                 </a>
	    </div>
	   <?php  } ?>
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
</div>


<!--div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
<?php   while($col = mysqli_fetch_assoc($result))  { ?>
        <img class="img-responsive" src="sis/view/app/img/galeria/<?php echo $col['galeria_imagen'];?>" alt="">
<?php  } ?>
      </div>
    </div>
  </div>
</div-->