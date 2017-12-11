<?php 
require_once 'sis/models/db/db.class.php';
require 'models/interface/web.interface.php';	

class Galeria extends Crud implements i_galeria{

	public function ListaPaginado($v_limit,$v_off){
    	$query = "call sp_select_listaGaleriaPag(".$v_limit.",".$v_off.");";
    	return $query;
	}

	public function Listar(){
		$this->sql = "call sp_select_listarGaleria()";
		return self::dbselect();
	}

};
 ?>