<?php 
require_once('../view/logic/categoria.logic.php');

include '../models/clases/categoria.class.php';
$categoria = new Categoria();
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
	8 -> buscar categoria(inicio)
*/

$cantInter=10;// Cantidad de filas por página

switch ($indicador_crud) {
	case 1://Listar
	
		$rsCategoria = $categoria->Listar();
		// DATA PAGINADOR
		$totalRegistro = count($rsCategoria);
		$intervalo = $cantInter; // Mysql-> LIMIT
		$cantPag = $totalRegistro/$intervalo;
		$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
		$totMAX = $intervalo;

		$btn1 = 'Desactivar';
		$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));
		$cantList = count($rsCategoria);
		if($cantList == 0){
			$msgNoRegistros='
			<div class="alert alert-info" role="alert">
			  <strong>¡Aviso!</strong>No tiene categorías registradas o activas.
			</div>
			';
		}
	break;

	case 2://Agregar
			$addCategoria = $categoria->Agregar($categoria_nombre,$categoria_nombre_en);
			if($addCategoria){
				$msg_categoria = '
					<div class="alert alert-success fade in">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>¡Guardado!</strong> Los datos han sido almacenados.
					</div>
				';
			}else{
				$msg_categoria = '
					<div class="alert alert-danger fade in">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>¡Error!</strong> Hubo un error del sistema. Intente luego y de persistir el error comuníquese con nosotros.
					</div>
				';
			}				

	break;

	case 3://Modificar

	if($indicador_crud_update==true){
			$editCategoria = $categoria->Modificar($categoria_nombre,$categoria_nombre_en,$idCategoria);
			if($editCategoria){
				$msg_categoria = '
					<script>
						bootbox.alert("<h4>Registro actualizado</h4>", function(result) {
							if(!result){
								document.location="categoria.php";
							}else{
								document.location="categoria.php";
							}
						});
					</script>
				';
			}else{
				$msg_categoria = '
					<div class="alert alert-danger fade in">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Error</strong> Hubo un error del sistema. Intenete luego.
					</div>
				';
			}		

	}else{
		$rsgetCategoria = $categoria->getCategoria($idCategoria);
		foreach($rsgetCategoria as $colmc);
	}

	break;

	case 4:// Desactivar

		if($count_ckeck_filas > 0){

   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $cambiaEstado = $categoria->cambiaEstado($fila_check[$i],1);
   			}	
   			if($cambiaEstado){
   				$btn1='Desactivar';
   				$rsCategoria = $categoria->Listar();
	   			// DATA PAGINADOR
				$totalRegistro = count($rsCategoria);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;

				$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));
   				
   				$cantList = count($rsCategoria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene categorías registradas o activas.
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
			$rsCategoria = $categoria->Listar();

			// DATA PAGINADOR
			$totalRegistro = count($rsCategoria);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;

			$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));

			$cantList = count($rsCategoria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene categorías registradas o activas.
					</div>
					';
				}
		}


	break;

	case 5:// listar desactivados
		$btn1 = 'Activar';
		$rsNoPublicados = $categoria->listarDesactivados();
		$contNP = count($rsNoPublicados);
		if($contNP==0){
			$msgNoRegistros ='
				<div class="alert alert-warning fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Advertencia!</strong> No hay ninguna categoría que esté desactivada.
				</div>
			';		
		}

	break;

	case 6:// Activar
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $cambiaEstado = $categoria->cambiaEstado($fila_check[$i],2);
   			}	
   			if($cambiaEstado){
   				$rsCategoria = $categoria->Listar();

   					// DATA PAGINADOR
				$totalRegistro = count($rsCategoria);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;
	
				$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsCategoria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene categorías registradas o activas.
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
			$rsNoPublicados = $categoria->listarDesactivados();
		}
	break;

	case 7:// eliminar productos
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $eliminarCategorias = $categoria->Eliminar($fila_check[$i]);
   			}	

   			if($eliminarCategorias){
   				$btn1='Desactivar';
   				$rsCategoria = $categoria->Listar();

   				// DATA PAGINADOR
				$totalRegistro = count($rsCategoria);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset - intervalos en consulta
				$totMAX = $intervalo;
	
				$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsCategoria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene categorías registradas o activas.
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
			$rsCategoria = $categoria->Listar();

			// DATA PAGINADOR
			$totalRegistro = count($rsCategoria);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;

			$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));

			$cantList = count($rsCategoria);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene categorías registradas o activas.
					</div>
					';
				}
		}
	break;

	case 8:// buscar categoria(inicio)
		$btn1 = 'Desactivar';
		if($categoria_buscar!=''){
			$rsCategoria = $categoria->buscarCategoria($categoria_buscar);
			$cont_busca = count($rsCategoria);

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
					  <strong>¡Advertencia!</strong> Escriba el nombre de la categoría a buscar.
					</div>
					';
			$rsCategoria = $categoria->Listar();
			// DATA PAGINADOR
			$totalRegistro = count($rsCategoria);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;

			$result = mysqli_query($conect,$categoria->ListaPaginado($intervalo,$offset));

		}

	break;

}

?>