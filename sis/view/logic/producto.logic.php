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
		$indicador_crud=2;
		if($_POST['frm_op']=='frm_add'){
			$producto_nombre = htmlspecialchars($_POST['producto_nombre']);
			$producto_descripcion = htmlentities($_POST['producto_descripcion'],ENT_QUOTES);
			$producto_nombre_en = htmlspecialchars($_POST['producto_nombre_en']);
			$producto_descripcion_en = htmlentities($_POST['producto_descripcion_en'],ENT_QUOTES);
			$producto_archivo = htmlspecialchars($_POST['producto_archivo']);
			$producto_archivo_en = htmlspecialchars($_POST['producto_archivo_en']);
			$producto_imagen = htmlspecialchars($_POST['producto_imagen']);
			$producto_categoria = htmlspecialchars($_POST['producto_categoria']);

			// Valores para nombres de imagenes y archivos pdf
	 		$newnom = date("YmdHis");
    		$newfile_img = $newnom.'.jpg';
    		$newfile_pdf = $newnom.'es.pdf';
    		$newfile_pdf_en = $newnom.'en.pdf';

//IMAGEN FILE
			if(isset($producto_imagen)){
	 			if (!empty($_FILES['producto_imagen']['name'])) {
	 				$maxsize1 = 500 * 600;

	 				if ($_FILES['producto_imagen']['size'] <= $maxsize1) {
	 					$productoURL = "app/img/productos/";
	 					if (!move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $productoURL . $newfile_img));
	 					$producto_imagen = $newfile_img;
	 					
						//Medidas ancho y alto
						$filename = 'app/img/productos/'.$newfile_img;
						$data = getimagesize($filename);
						$img_ancho= $data[0];//ancho de imagen
						$img_alto = $data[1];//alto de imagen

	 				}else{
	 					$indicador_peso_img = 2;// 2 = sobrepaso peso
	 				
	 				}
	 			}

	 		}
// DOCS FILE ES
			if(isset($producto_archivo)){
			    if (!empty($_FILES['producto_archivo']['name'])) {
			        $maxsize = 16777216; //equivale a 2mb
			        if ($_FILES['producto_archivo']['size'] <= $maxsize) {
			            $pdfURL = "app/docs/";
			            if (!move_uploaded_file($_FILES['producto_archivo']['tmp_name'], $pdfURL . $newfile_pdf));
			            $producto_archivo = $newfile_pdf;
			        } else {
			            $indicador_peso_pdf = 2;// 2 = sobrepaso peso
			        }
			    }
			}
// DOCS FILE EN
			if(isset($producto_archivo_en)){
			    if (!empty($_FILES['producto_archivo_en']['name'])) {
			        $maxsize = 16777216; //equivale a 2mb
			        if ($_FILES['producto_archivo_en']['size'] <= $maxsize) {
			            $pdfURL = "app/docs/";
			            if (!move_uploaded_file($_FILES['producto_archivo_en']['tmp_name'], $pdfURL . $newfile_pdf_en));
			            $producto_archivo_en = $newfile_pdf_en;
			        } else {
			            $indicador_peso_pdf = 2;// 2 = sobrepaso peso
			        }
			    }
			}

	 		$ind_addProducto=1;//Dispara al cntrolador que guarde los datos			
		}

	}else if($_GET['op']=='edit'){

		$indicador_view=3;
		$indicador_crud=3;
		$ind_editProducto=0;//Dispara al cntrolador que guarde los datos

		if($_GET['prod']){
			$idProducto = $_GET['prod'];
		}else{
			$idProducto = $_POST['prod'];
		}


		if($_POST['frm_op']=='frm_edit'){
			$producto_nombre = htmlspecialchars($_POST['producto_nombre']);
			$producto_descripcion = htmlentities($_POST['producto_descripcion'],ENT_QUOTES);
			$producto_nombre_en = htmlspecialchars($_POST['producto_nombre_en']);
			$producto_descripcion_en = htmlentities($_POST['producto_descripcion_en'],ENT_QUOTES);
			$producto_archivo = htmlspecialchars($_POST['producto_archivo']);
			$producto_archivo_en = htmlspecialchars($_POST['producto_archivo_en']);
			$producto_imagen = htmlspecialchars($_POST['producto_imagen']);
			$producto_categoria = htmlspecialchars($_POST['producto_categoria']);
			//Actuales
			$producto_imagen_actual = htmlspecialchars($_POST['producto_imagen_actual']);
			$producto_archivo_actual = htmlspecialchars($_POST['producto_pdf_actual']);
			$producto_archivo_en_actual = htmlspecialchars($_POST['producto_pdfen_actual']);

			// Valores para nombres de imagenes y archivos pdf
	 		$newnom = date("YmdHis");
    		$newfile_img = $newnom.'.jpg';
    		$newfile_pdf = $newnom.'es.pdf';
    		$newfile_pdf_en = $newnom.'en.pdf';


//IMAGEN FILE
			if(isset($producto_imagen)){
	 			if (!empty($_FILES['producto_imagen']['name'])) {
	 				$maxsize1 = 500 * 600;

	 				if ($_FILES['producto_imagen']['size'] <= $maxsize1) {
	 					$productoURL = "app/img/productos/";
	 					if (!move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $productoURL . $newfile_img));
	 					$producto_imagen = $newfile_img;
	 					
						//Medidas ancho y alto
						$filename = 'app/img/productos/'.$newfile_img;
						$data = getimagesize($filename);
						$img_ancho= $data[0];//ancho de imagen
						$img_alto = $data[1];//alto de imagen

	 				}else{
	 					$indicador_peso_img = 2;// 2 = sobrepaso peso
	 				}
	 				$valida_img=1; //indica si imagen se va a modificar o no
	 			}else{
	 				$producto_imagen= $producto_imagen_actual;
	 				$valida_img=2; //indica si imagen se va a modificar o no
	 			}

	 		}//fin imagen

// DOCS FILE ES
			if(isset($producto_archivo)){
			    if (!empty($_FILES['producto_archivo']['name'])) {
			        $maxsize = 16777216; //equivale a 2mb
			        if ($_FILES['producto_archivo']['size'] <= $maxsize) {
			            $pdfURL = "app/docs/";
			            if (!move_uploaded_file($_FILES['producto_archivo']['tmp_name'], $pdfURL . $newfile_pdf));
			            $producto_archivo = $newfile_pdf;
			        } else {
			            $indicador_peso_pdf = 2;// 2 = sobrepaso peso
			        }
			    }else{
			    	$producto_archivo = $producto_archivo_actual;
			    }
			}//fin archivo pdf español
// DOCS FILE EN
			if(isset($producto_archivo_en)){
			    if (!empty($_FILES['producto_archivo_en']['name'])) {
			        $maxsize = 16777216; //equivale a 2mb
			        if ($_FILES['producto_archivo_en']['size'] <= $maxsize) {
			            $pdfURL = "app/docs/";
			            if (!move_uploaded_file($_FILES['producto_archivo_en']['tmp_name'], $pdfURL . $newfile_pdf_en));
			            $producto_archivo_en = $newfile_pdf_en;
			        } else {
			            $indicador_peso_pdf = 2;// 2 = sobrepaso peso
			        }
			    }else{
			    	$producto_archivo_en = $producto_archivo_en_actual;
			    }
			}//fin archivo pdf inglés
			$ind_addProducto=1;//Dispara al cntrolador que guarde los datos			
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
   			$producto_buscar = $_POST['prod_buscar'];
   			if($producto_buscar==''){
   				$indicador_view=1;
   			}else{
   				$indicador_view=5;
   			}

	}else  if($_GET['op']=='filter'){
			$indicador_crud=9;
   			$catFiltro = $_GET['cat'];
   			$indicador_view=1;
	}

}else{
	$indicador_view=1;
	$indicador_crud=1;
}
 ?>