<?php 
require_once('../view/logic/producto.logic.php');
include '../models/clases/producto.class.php';
$producto = new Producto();
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
	9 -> filtrar
*/

$cantInter=10;// Cantidad de filas por página
$m_ancho = 900;
$m_alto = 900;

switch ($indicador_crud) {

	case 1://Listar

		//Lista Categorias Activas
		$resultCat = mysqli_query($conect,$producto->listarCategorias());

		$btn1 = 'Desactivar';
		$rsProducto = $producto->Listar();

		// DATA PAGINADOR
		$totalRegistro = count($rsProducto);
		$intervalo = $cantInter; // Mysql-> LIMIT
		$cantPag = $totalRegistro/$intervalo;
		$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
		$totMAX = $intervalo;

		// QUERY LISTA CON PAGINADOR
		$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));

		$cantList = count($rsProducto);
		if($cantList == 0){
			$msgNoRegistros='
			<div class="alert alert-info" role="alert">
			  <strong>¡Aviso!</strong>No tiene productos registradas o activas.
			</div>
			';
		}
	break;

	case 2: // Agregar nuevo
		if($ind_addProducto==1){

			if($img_ancho == $img_ancho and $img_alto == $img_alto){

				// AGREGA - FUNCTION
				$addProducto = $producto->Agregar($producto_nombre,$producto_descripcion,$producto_imagen,$producto_archivo,$producto_nombre_en,$producto_descripcion_en,$producto_archivo_en,$producto_categoria);
				if($addProducto){
					$msg_producto = '
						<div class="alert alert-success fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>¡Guardado!</strong> Los datos han sido almacenados.
						</div>
					';
					$rsProductoCategoria = $producto->listarCategoriasProd();
				}else{
					$msg_producto = '
						<div class="alert alert-danger fade in">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>¡Error!</strong> Hubo un error del sistema. Intente luego y de persistir el error comuníquese con nosotros.
						</div>
					';
				}
			}else{

			$msg_producto = '
				<script type="text/javascript">
					bootbox.alert("<p>¡Aviso! Las medidas de la imagen no son las correctas</p>", function(result) {
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
			$rsProductoCategoria = $producto->listarCategoriasProd();
			$valCantCat = count($rsProductoCategoria);
			if($valCantCat==0){
				$msg_producto = '
					<script>
						bootbox.alert("Categorías no existen o estan desactivados", function(result) {
							if(!result){
								document.location="producto.php";
							}else{
								document.location="producto.php";
							}
						});
					</script>
				';	
			}
		}

	break;

	case 3: //Modificar		
		if($ind_addProducto==1){

			if($img_ancho == $img_ancho and $img_alto == $img_alto or $producto_imagen!=''){

			$editProducto = $producto->Modificar($producto_nombre,$producto_descripcion,$producto_imagen,$producto_archivo,$producto_nombre_en,$producto_descripcion_en,$producto_archivo_en,$producto_categoria,$idProducto);

				if($editProducto){		
						$msg_producto = '
							<script>
								bootbox.alert("<h4>Registro actualizado</h4>", function(result) {
									if(!result){
										document.location="producto.php";
									}else{
										document.location="producto.php";
									}
								});
							</script>
						';

						$rsgetProducto = $producto->getProducto($idProducto);
						foreach($rsgetProducto as $colp);

				}else{
					$msg_producto= '
						<div class="alert alert-danger fade in">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Error</strong> Hubo un error del sistema. Intenete luego.
						</div>
					';
				}

			}else{

			$msg_producto = '
				<script type="text/javascript">
					bootbox.alert("<p>¡Aviso! Las medidas de la imagen no son las correctas</p>", function(result) {
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
			//Lista Categorias Activas
			$resultCat = mysqli_query($conect,$producto->listarCategorias());

			$rsgetProducto = $producto->getProducto($idProducto);
			foreach($rsgetProducto as $colp);
		}
		
	break;

	case 4: //Desactivar
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $cambiaEstado = $producto->cambiaEstado($fila_check[$i],1);
   			}	
   			if($cambiaEstado){
   				//Lista Categorias Activas
				$resultCat = mysqli_query($conect,$producto->listarCategorias());

   				$btn1='Desactivar';
   				$rsProducto = $producto->Listar();

   				// DATA PAGINADOR
				$totalRegistro = count($rsProducto);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;

				// QUERY LISTA CON PAGINADOR
				$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsProducto);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene producto registrados o activos.
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
			//Lista Categorias Activas
			$resultCat = mysqli_query($conect,$producto->listarCategorias());
			$rsProducto = $producto->Listar();

			// DATA PAGINADOR
			$totalRegistro = count($rsProducto);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
			
			// QUERY LISTA CON PAGINADOR
			$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));

			$cantList = count($rsProducto);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene productos registrados o activos.
					</div>
					';
				}
		}
	break;

	case 5: //Listar desactivados
		$btn1 = 'Activar';
		$rsDesactivados = $producto->listarDesactivados();
		$contNP = count($rsDesactivados);
		if($contNP==0){
			$msgNoRegistros ='
				<div class="alert alert-warning fade in">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>¡Advertencia!</strong> No hay ningún producto que esté desactivada.
				</div>
			';		
		}
	break;

	case 6: // Activar
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $cambiaEstado = $producto->cambiaEstado($fila_check[$i],2);
   			}	
   			if($cambiaEstado){
   				//Lista Categorias Activas
				$resultCat = mysqli_query($conect,$producto->listarCategorias());
   				$rsProducto = $producto->Listar();

   				// DATA PAGINADOR
				$totalRegistro = count($rsProducto);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;
				
				// QUERY LISTA CON PAGINADOR
				$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsProducto);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene productos registrados o activos.
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
			$rsDesactivados = $producto->listarDesactivados();
		}	
	break;

	case 7: //Eliminar
		if($count_ckeck_filas > 0){
   			for ($i = 0; $i < $count_ckeck_filas; $i++) {
   			   $eliminarProducto = $producto->Eliminar($fila_check[$i]);
   			}
   			if($eliminarProducto){

   				//Lista Categorias Activas
				$resultCat = mysqli_query($conect,$producto->listarCategorias());

   				$btn1='Desactivar';
   				$rsProducto = $producto->Listar();

   				// DATA PAGINADOR
				$totalRegistro = count($rsProducto);
				$intervalo = $cantInter; // Mysql-> LIMIT
				$cantPag = $totalRegistro/$intervalo;
				$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
				$totMAX = $intervalo;
				
				// QUERY LISTA CON PAGINADOR
				$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));

   				$cantList = count($rsProducto);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene productos registrados o activos.
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

			//Lista Categorias Activas
			$resultCat = mysqli_query($conect,$producto->listarCategorias());

			$rsProducto = $producto->Listar();

			// DATA PAGINADOR
			$totalRegistro = count($rsProducto);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
			
			// QUERY LISTA CON PAGINADOR
			$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));

			$cantList = count($rsProducto);
				if($cantList == 0){
					$msgNoRegistros='
					<div class="alert alert-info" role="alert">
					  <strong>¡Aviso!</strong>No tiene productos registrados o activos.
					</div>
					';
				}
		}
	break;

	case 8: // Buscar
		$btn1 = 'Desactivar';
		if($producto_buscar!=''){
			$rsProducto = $producto->buscarProducto($producto_buscar);
			$cont_busca = count($rsProducto);

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
					  <strong>¡Advertencia!</strong> Escriba el nombre del producto a buscar.
					</div>
					';

			//Lista Categorias Activas
			$resultCat = mysqli_query($conect,$producto->listarCategorias());

			$rsProducto = $producto->Listar();

			// DATA PAGINADOR
			$totalRegistro = count($rsProducto);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
	
			$result = mysqli_query($conect,$producto->ListaPaginado($intervalo,$offset));
		}
	break;

	case 9: //Filtrar por categoria
		if($catFiltro!=''){

			//Lista Categorias Activas
			$resultCat = mysqli_query($conect,$producto->listarCategorias());

			$btn1 = 'Desactivar';
			$rsProducto = $producto->filasCountFiltro($catFiltro);

			// DATA PAGINADOR
			$totalRegistro = count($rsProducto);
			$intervalo = $cantInter; // Mysql-> LIMIT
			$cantPag = $totalRegistro/$intervalo;
			$offset = $intervalo*$_GET['pag'];//offset- intervalos en consulta
			$totMAX = $intervalo;
	
			$result = mysqli_query($conect,$producto->filtrarProductos($catFiltro,$intervalo,$offset));


			//FUNCION QUE CUENTA
			$cantList = count($rsProducto);

			if($cantList == 0){
				$msgNoRegistros='
				<div class="alert alert-info" role="alert">
				  <strong>¡Aviso!</strong>No se encontraron productos registrados o activos en esta categoría.
				</div>
				';
			}
		}else {
			$msgNoRegistros='
				<div class="alert alert-info" role="alert">
				  <strong>¡Aviso!</strong>No tiene productos registradas o activas.
				</div>
			';
		}
	break;

}
 ?>