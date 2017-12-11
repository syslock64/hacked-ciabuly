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
	 		$indicador_crud=2;
	 		$categoria_nombre = htmlspecialchars($_POST['categoria_nombre']);
	 		$categoria_nombre_en = htmlspecialchars($_POST['categoria_nombre_en']);
	 	}

	}else if($_GET['op']=='edit'){
			$indicador_view=3;
			$indicador_crud=3;
			if($_GET['cat']){
				$idCategoria = $_GET['cat'];
			}else{
				$idCategoria = $_POST['cat'];
			}

		if($_POST['frm_op']=='frm_edit'){	
			$indicador_crud_update=true;
			$categoria_nombre = htmlspecialchars($_POST['categoria_nombre']);
	 		$categoria_nombre_en = htmlspecialchars($_POST['categoria_nombre_en']);
		}	

	}else  if($_GET['op']=='state'){
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
   			$categoria_buscar = $_POST['cat_buscar'];
   			if($categoria_buscar==''){
   				$indicador_view=1;
   			}else{
   				$indicador_view=5;
   			}

	}
}else{
		$indicador_view=1;
		$indicador_crud=1;
}


//echo '<h1> ----->'.$hj.'</h1>';


?>