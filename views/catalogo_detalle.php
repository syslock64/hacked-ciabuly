<div class="section_home">
	<div class="container">
	    <div id="catalogo_header" class="col-xs-12">
	        <h1><b>NUESTRAS PRENDAS</b></h1>
	    </div>
	    <div id="catalogo_items" class="col-sm-3 col-xs-12">
	        <ul class="col-xs-12">


                <?php while($colc = mysqli_fetch_assoc($resultCat))  { ?>
                
                <li>
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
	    <div id="catalogo_detalle" class="col-md-8  col-xs-12">
            <div class="col-xs-12">
                <div id="catalogo_img_detalle" class="col-sm-6 col-xs-12">
                   <center>
               <?php   if($result){ 
                while($col = mysqli_fetch_assoc($result)){ ?>
                    <img class="img-responsive" src="sis/view/app/img/productos/<?php echo $col['producto_imagen'];?>" alt="catalogo_detalle">
                    
                    <div class="bottom_verimg">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                         VER IMÁGEN
                        </button> 
                    </div>
                    
                    </center>
                </div>
                <div id="catalogo_detalle_text" class="col-sm-6 col-xs-12">
                    <h1><b> <?php 
                            if($site['lang']=='es'){
                                echo utf8_encode($col['producto_nombre']); 
                            }
                            else{
                                echo utf8_encode($col['producto_nombre_ingles']); 
                            }
                         ?></b></h1>
                    <p><?php 
                            if($site['lang']=='es'){
                                echo htmlspecialchars_decode($col['producto_descripcion']); 
                            }
                            else{
                                echo htmlspecialchars_decode($col['producto_descripcion_ingles']); 
                            }
                         ?></p>
                         <p>
                        <?php if($col['producto_archivo']){
                            if($site['lang']=='es'){?>
                         <a href="sis/view/app/docs/<?php echo $col['producto_archivo']; ?>" target="_blank" style="color:#000;">
                           Descargar PDF : <img src="app/img/pdf.png">
                         </a>
                        <?php 
                         }else{
                        ?>
                         <a href="sis/view/app/docs/<?php echo $col['producto_archivo_ingles']; ?>" target="_blank" style="color:#000;">
                           Download PDF : <img src="app/img/pdf.png">
                         </a>
                        <?php
                         }
                        }
                        ?>
                        </p>
                         <?php  }
                 } 
                 else{
                    echo 'No hay Productos';
                    }
                
                ?>
                    <div id="retroceder" class="col-xs-6">
                    <a href="catalogo.php">Retroceder</a>    
                </div>
                    
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img class="img-responsive" src="app/img/catalogo/producto-b.jpg" alt="producto detalle zoom">
      </div>
    </div>
  </div>
</div>