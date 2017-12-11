<?php 
//Generamos las opciones y modulos que se incluiran en la vista 
// y data para el controlador(post, indicadores para validaciones).

/* indicador_view : QUe modulo se mostrara en pantalla
	1 -> Listar
	2 -> Agregar
	3 -> Modificar
	4 -> Listar Desactivados

NP = No Publicado (Desactivado)

$indicador_crud = que funcion hara el controlador.
*/

if(isset($_GET['op'])){
	if($_GET['op']=='add'){
	 	$indicador_view=2; 
	 	if($_POST['frm_op']=='frm_add'){	 		
	 		$galeria_titulo = htmlspecialchars($_POST['galeria_titulo']);
	 		$galeria_titulo_en = htmlspecialchars($_POST['galeria_titulo_en']);
	 		$galeria_imagen = htmlspecialchars($_POST['galeria_imagen']);

	 		if(isset($galeria_imagen)){
	 			$newnom = date("YmdHis");
    			$newfile = $newnom.'.jpg';
	 			if (!empty($_FILES['galeria_imagen']['name'])) {
	 				$maxsize1 = 500 * 600;

	 				if ($_FILES['galeria_imagen']['size'] <= $maxsize1) {
	 					$galeriaURL = "app/img/galeria/";
	 					if (!move_uploaded_file($_FILES['galeria_imagen']['tmp_name'], $galeriaURL . $newfile));
	 					$galeria_imagen = $newfile;
	 					
						//Medidas ancho y alto
						$filename = 'app/img/galeria/'.$newfile;
						$data = getimagesize($filename);
						$img_ancho= $data[0];//ancho de imagen
						$img_alto = $data[1];//alto de imagen

	 				}else{
	 					$indicador_peso_img = 2;// 2 = sobrepaso peso
	 				}
	 			}
	 		}

	 		$indicador_crud=2;
	 	}

	}else if($_GET['op']=='edit'){
			$indicador_view=3;
			$indicador_crud=3;
			if($_GET['gal']){
				$idGaleria = $_GET['gal'];
			}else{
				$idGaleria = $_POST['gal'];
			}

		if($_POST['frm_op']=='frm_edit'){

			$indicador_crud_update=true;
				$galeria_titulo = htmlspecialchars($_POST['galeria_titulo']);
				$galeria_imagen = htmlspecialchars($_POST['galeria_imagen']);
				$galeria_imagen_actual = htmlspecialchars($_POST['galeria_imagen_actual']);
	 			$galeria_titulo_en = htmlspecialchars($_POST['galeria_titulo_en']);

	 			if(isset($galeria_imagen)){
	 			$newnom = date("YmdHis");
    			$newfile = $newnom.'.jpg';
	 			if (!empty($_FILES['galeria_imagen']['name'])) {
	 				$maxsize1 = 500 * 600;

	 				if ($_FILES['galeria_imagen']['size'] <= $maxsize1) {
	 					$galeriaURL = "app/img/galeria/";
	 					if (!move_uploaded_file($_FILES['galeria_imagen']['tmp_name'], $galeriaURL . $newfile)); 					

	 					$galeria_imagen = $newfile;
	 					
						//Medidas ancho y alto
						$filename = 'app/img/galeria/'.$newfile;
						$data = getimagesize($filename);
						$img_ancho= $data[0];//ancho de imagen
						$img_alto = $data[1];//alto de imagen

	 				}else{
	 					$indicador_peso_img = 2;// 2 = sobrepaso peso
	 				}
	 				$valida_img=1; //indica si imagen se va a modificar o no
	 			}else{
	 				$galeria_imagen = $galeria_imagen_actual;
	 				$valida_img=2; //indica si imagen se va a modificar o no
	 			}	
	 			}

		}

	}else if($_GET['op']=='state'){
			$indicador_crud=4;		
   			$fila_check=$_POST["check"];
   			$count_ckeck_filas = count($fila_check);
   			$indicador_view=1;

	}else  if($_GET['op']=='list_state'){
			$indicador_crud=5;		
   			$indicador_view=4;

	}else  if($_GET['op']=='stateNP'){
			$indicador_crud=6;		
   			$fila_check=$_POST["check"];
   			$count_ckeck_filas = count($fila_check);
   			$indicador_view=4;

	}else  if($_GET['op']=='del'){
			$indicador_crud=7;		
   			$fila_check=$_POST["check"];
   			$count_ckeck_filas = count($fila_check);
   			$indicador_view=1;

	}else  if($_GET['op']=='search'){
			$indicador_crud=8;		
   			$galeria_buscar = $_POST['gal_buscar'];
   			if($galeria_buscar==''){
   				$indicador_view=1;
   			}else{
   				$indicador_view=5;
   			}
	}


}else{
	$indicador_view=1;
	$indicador_crud=1;
}


 ?>