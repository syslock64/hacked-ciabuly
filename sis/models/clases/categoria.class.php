<?php 
require_once '../models/db/db.class.php';
require '../models/interface/mantenimiento.interface.php';	

class Categoria extends Crud implements i_categoria{


public function ListaPaginado($v_limit,$v_off){
    $query = "call sp_select_listaCategoriaPag(".$v_limit.",".$v_off.");";
    return $query;
}

	public function Listar(){
		$this->sql = "call sp_select_listarCategoria()";
	    return self::dbselect();
	}

	public function Agregar($c_nombre,$c_nombre_ingles){
		$this->sql = "call sp_insert_agregarCategoria('".$c_nombre."','".$c_nombre_ingles."')";
		return self::dbinsert();
	}

	public function Modificar($c_nombre,$c_nombre_ingles,$c_id){
		$this->sql = "call sp_update_modificarCategoria('".$c_nombre."','".$c_nombre_ingles."',".$c_id.");";
		return self::dbedit();

	}
  
  	public function Eliminar($c_id){
  		$this->sql = "call sp_delete_eliminarCategoria(".$c_id.")";
  		return self::dbdelete();
  	}
  
  /* Detalles */ 
  
  	public function getCategoria($c_id){
  		$this->sql = "call sp_select_getCategoria(".$c_id.")";
  		return self::dbselect();
  	}

  	public function cambiaEstado($c_id,$c_op){
  		$this->sql = "call sp_update_estadoCategoria(".$c_id.",".$c_op.")";
  		return self::dbedit();
  	}

  	public function listarDesactivados(){
  		$this->sql = "call sp_select_listarCategoriaDesactivados()";
  		return self::dbselect();
  	}

    public function buscarCategoria($c_buscar){
      $this->sql = "call sp_select_buscarcategoria('".$c_buscar."')";
      return self::dbselect();
    }

    public function validarCategoria($c_id){
      $query = "call sp_select_validarCatProd(".$c_id.");";
      return $query;
    }
    
  
};
	
 ?>