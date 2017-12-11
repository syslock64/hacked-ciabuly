<?php 

require_once('../view/logic/galeria.logic.php');

include '../models/clases/galeria.class.php';
$galeria = new Galeria();
$crud = new Crud();
$conect = $crud->conec();

/*
Indicador_crud:
	1 -> Listar
	2 -> Agregar
	3 -> Modifcar
	4 -> cambiar estado(publicado/no publicado)
	5 -> listar estado(no publicado)
	6 -> cambiar estado(no publicado/publicado)
	7 -> eliminar productos
	8 -> buscar (inicio)
*/

$cantInter = 12;// Cantidad de filas por página
$m_ancho = 600;// Ancho de imágen
$m_alto = 600;// Alto de imágen

switch ($indicador_crud) {

	case 1: // Listar Galeria
		$btn1 = 'Desactivar';
		$rsGaleria = $galeria->Listar();

		// DATA PAGINADOR
		$totalRegistro = count($rsGaleria);
		$intervalo = $cantInter; // Mysql-> LIMIT
		$cantPag = $totalRegistro/$intervalo;
		$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
		$totMAX = $intervalo;
		
		// QUERY LISTA CON PAGINADOR
		$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

		$cantGalList = count($rsGaleria);
		if($cantGalList == 0){
			$msgNoRegistros='
			<div class="alert alert-info" role="alert">
			  <strong>¡Aviso!</strong>No tiene galerias registradas o activas.
			</div>
			';
		}
		break;


	case 2: // Agregar Galeria

if($img_ancho == $img_ancho and $img_alto == $img_alto){

		$addGaleria = $galeria->Agregar($galeria_titulo,$galeria_imagen,$galeria_titulo_en);

		if($addGaleria){
			$msg_galeria = '
				<div class="alert alert-success fade in">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <strong>¡Guardado!</strong> Los datos han sido almacenados.
				</div>
			';
		}else{
			$msg_galeria = '
				<div class="alert alert-danger fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Error!</strong> Hubo un error del sistema. Intente luego y de persistir el error comuníquese con nosotros.
				</div>
			';
		}
}else{
	$msg_galeria = '
		<script type="text/javascript">
			bootbox.alert("<p>¡Aviso! Las medidas no son las correctas</p>", function(result) {
				if(!result){
					window.history.back(); 
				}else{
					window.history.back(); 
				}
			});
		</script>
			';
}
	break;


	case 3: // modificar Galería

	if($indicador_crud_update==true){

		if($valida_img==1){
		
			if($img_ancho == $img_ancho and $img_alto == $img_alto){

				$editGaleria = $galeria->Modificar($galeria_titulo,$galeria_imagen,$galeria_titulo_en,$idGaleria);
				if($editGaleria){
					//reemplaza el antigua imagen 			
					$msg_galeria = '
						<script>
							bootbox.alert("<h4>Registro actualizado</h4>", function(result) {
								if(!result){
									document.location="galeria.php";
								}else{
									document.location="galeria.php";
								}
							});
						</script>
					';
					unlink("app/img/galeria/".$galeria_imagen_actual);
					$rsgetGaleria = $galeria->getGaleria($idGaleria);
					foreach($rsgetGaleria as $colmg);
				}else{
					$msg_galeria= '
						<div class="alert alert-danger fade in">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Error</strong> Hubo un error del sistema. Intenete luego.
						</div>
					';
				}
			}else{
				$msg_galeria = '
					<script type="text/javascript">
						bootbox.alert("<p>¡Aviso! Las medidas no son las correctas</p>", function(result) {
							if(!result){
								window.history.back(); 
							}else{
								window.history.back(); 
							}
						});
					</script>
						';
			}

		}else{
			$editGaleria = $galeria->Modificar($galeria_titulo,$galeria_imagen_actual,$galeria_titulo_en,$idGaleria);
			if($editGaleria){
					//reemplaza el antigua imagen 			
					$msg_galeria = '
						<script>
							bootbox.alert("<h4>Registro actualizado</h4>", function(result) {
								if(!result){
									document.location="galeria.php";
								}else{
									document.location="galeria.php";
								}
							});
						</script>
					';
					$rsgetGaleria = $galeria->getGaleria($idGaleria);
					foreach($rsgetGaleria as $colmg);
				}else{
					$msg_galeria= '
						<div class="alert alert-danger fade in">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Error</strong> Hubo un error del sistema. Intenete luego.
						</div>
					';
				}
		}//fiin valida imagen

	}else{
		$rsgetGaleria = $galeria->getGaleria($idGaleria);
		foreach($rsgetGaleria as $colmg);
	}

	break;

	case 4: //Desactivado

		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $cambiaEstado = $galeria->cambiaEstado($fila_check[$i],1);
   			}	
   			if($cambiaEstado){
   				$btn1='Desactivar';
   				$rsGaleria = $galeria->Listar();

   				// DATA PAGINADOR
				$totalRegistro = count($rsGaleria);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;
				
				// QUERY LISTA CON PAGINADOR
				$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsGaleria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene galerías registradas o activas.
					</div>
					';
				}
   			}
		}else{
			$btn1 = 'Desactivar';
			$msgNoRegistros ='
				<div class="alert alert-warning fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Advertencia!</strong> Debe seleccionar por lo menos una fila.
				</div>
			';
			$rsGaleria = $galeria->Listar();

				// DATA PAGINADOR
			$totalRegistro = count($rsGaleria);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
			
			// QUERY LISTA CON PAGINADOR
			$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

			$cantList = count($rsGaleria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene galerías registradas o activas.
					</div>
					';
				}
		}	
	break;

	case 5: //Listar desactivados
		$btn1 = 'Activar';
		$rsDesactivados = $galeria->listarDesactivados();
		$contNP = count($rsDesactivados);
		if($contNP==0){
			$msgNoRegistros ='
				<div class="alert alert-warning fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Advertencia!</strong> No hay ninguna galería que esté desactivada.
				</div>
			';		
		}
	break;

	case 6: // Activar
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $cambiaEstado = $galeria->cambiaEstado($fila_check[$i],2);
   			}	
   			if($cambiaEstado){
   				$rsGaleria = $galeria->Listar();

   						// DATA PAGINADOR
				$totalRegistro = count($rsGaleria);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;
				
				// QUERY LISTA CON PAGINADOR
				$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsGaleria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene galerías registradas o activas.
					</div>
					';
				}
   				$indicador_view=1;
   				$btn1 = 'Desactivar';
   				$msgNoRegistros ='
				<div class="alert alert-success fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Actualizado!</strong> Se han activado '.$count_ckeck_filas.' registros.
				</div>
			';
   			}
		}else{
			$msgNoRegistros ='
				<div class="alert alert-warning fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Advertencia!</strong> Debe seleccionar por lo menos una fila.
				</div>
			';
			$btn1 = 'Activar';
			$rsDesactivados = $galeria->listarDesactivados();
		}
	break;

	case 7: // Eliminar
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {

   			   $eliminarGaleria = $galeria->Eliminar($fila_check[$i]);

   			}
   			if($eliminarGaleria){
   				$btn1='Desactivar';
   				$rsGaleria = $galeria->Listar();

   						// DATA PAGINADOR
				$totalRegistro = count($rsGaleria);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;
				
				// QUERY LISTA CON PAGINADOR
				$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsGaleria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene galerías registradas o activas.
					</div>
					';
				}

				$msgNoRegistros='
					<div class="alert alert-success fade in">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>¡Eliminado!</strong> Se han eliminado '.$count_ckeck_filas.' registros.
					</div>
				';
   			}
		}else{
			$btn1 = 'Desactivar';
			$msgNoRegistros ='
				<div class="alert alert-warning fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Advertencia!</strong> Debe seleccionar por lo menos una fila.
				</div>
			';
			$rsGaleria = $galeria->Listar();

				// DATA PAGINADOR
			$totalRegistro = count($rsGaleria);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
			
			// QUERY LISTA CON PAGINADOR
			$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));

			$cantList = count($rsGaleria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene galerías registradas o activas.
					</div>
					';
				}
		}
	break;

	case 8:// Buscar registro
		$btn1 = 'Desactivar';
		if($galeria_buscar!=''){
			$rsGaleria = $galeria->buscarGaleria($galeria_buscar);
			$cont_busca = count($rsGaleria);

			if($cont_busca==0){
				$msgNoRegistros='
						<div class="alert alert-warning fade in">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>¡Advertencia!</strong> No se encontró el registro buscado.
						</div>
						';
			}
		}else{
			$msgNoRegistros='
					<div class="alert alert-warning fade in">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>¡Advertencia!</strong> Escriba el nombre de la galería a buscar.
					</div>
					';
			$rsGaleria = $galeria->Listar();
			// DATA PAGINADOR
			$totalRegistro = count($rsGaleria);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
			
			$result = mysqli_query($conect,$galeria->ListaPaginado($intervalo,$offset));
		}
	break;
}

?>