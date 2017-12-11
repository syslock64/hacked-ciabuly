<?php 
require_once '../models/db/db.class.php';
require '../models/interface/mantenimiento.interface.php';	

class Producto extends Crud implements i_producto{

	public function ListaPaginado($v_limit,$v_off){
    	$query = "call sp_select_listaProductoPag(".$v_limit.",".$v_off.");";
    	return $query;
	}

	public function listarCategorias(){
		$query = "
		select * from
			categoria 
		where 
			categoria_activo=1
		order by 
			categoria_id DESC";
		return $query;
	}

	public function Listar(){
		$this->sql = "call sp_select_listarProducto()";
	    return self::dbselect();
	}

	public function Agregar($p_nombre
							,$p_descripcion
							,$p_imagen
							,$p_archivo
							,$p_nombre_ingles
							,$p_descripcion_ingles
							,$p_archivo_ingles
							,$p_categoria_id){
		$this->sql = "
		call sp_insert_agregarProducto(
			    '".$p_nombre."'
				,'".$p_descripcion."'
				,'".$p_imagen."'
				,'".$p_archivo."'
				,'".$p_nombre_ingles."'
				,'".$p_descripcion_ingles."'
				,'".$p_archivo_ingles."'
				,".$p_categoria_id.")";

		return self::dbinsert();
	}

	public function Modificar(
							$p_nombre
							,$p_descripcion
							,$p_imagen
							,$p_archivo
							,$p_nombre_ingles
							,$p_descripcion_ingles
							,$p_archivo_ingles
							,$p_categoria_id
							,$p_id
							){
		$this->sql = "
		call sp_update_modificarProducto(
					'".$p_nombre."'
					,'".$p_descripcion."'
					,'".$p_imagen."'
					,'".$p_archivo."'
					,'".$p_nombre_ingles."'
					,'".$p_descripcion_ingles."'
					,'".$p_archivo_ingles."'
					,".$p_categoria_id."
					,".$p_id.")";
		return self::dbedit();
	}

	public function Eliminar($p_id){
		$this->sql = "call sp_delete_eliminarProducto(".$p_id.")";
		return self::dbdelete();
	}

	/* OTROS */

	public function listarCategoriasProd(){
		 $this->sql="call sp_select_listarCategoriaProd();";
		return self::dbselect();
	}

	public function getProducto($p_id){
		$this->sql="call sp_select_getProducto(".$p_id.");";
		return self::dbselect();
	}

	public function cambiaEstado($p_id,$p_op){
		$this->sql = "call sp_update_estadoProducto(".$p_id.",".$p_op.");";
		return self::dbedit();
	}

	public function listarDesactivados(){
		$this->sql = "call sp_select_listarProductosDesactivados();";
		return self::dbselect();
	}

	public function buscarProducto($p_buscar){
		$this->sql = "call sp_select_buscarProducto('".$p_buscar."')";
		return self::dbselect();
	}

	public function filasCountFiltro($p_cat){
		$this->sql = "call sp_select_contarFiltro(".$p_cat.")";
		return self::dbselect();
	}

	public function filtrarProductos($p_cat_id,$v_limit,$v_off){
		$query  = "call sp_select_filtrarProductos(".$p_cat_id.",".$v_limit.",".$v_off.")";
		return $query;
	}

};
	
 ?>