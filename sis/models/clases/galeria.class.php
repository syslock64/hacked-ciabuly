<?php 
require_once '../models/db/db.class.php';
require '../models/interface/mantenimiento.interface.php';	

class Galeria extends Crud implements i_galeria{

	public function ListaPaginado($v_limit,$v_off){
    	$query = "call sp_select_listaGaleriaPag(".$v_limit.",".$v_off.");";
    	return $query;
	}

	public function Listar(){
		$this->sql = "call sp_select_listarGaleria()";
		return self::dbselect();
	}

	public function Agregar($g_titulo,$g_imagen,$g_titulo_ingles){
		$this->sql = "call sp_insert_agregarGaleria('".$g_titulo."','".$g_imagen."','".$g_titulo_ingles."')";
		return self::dbinsert();
	}

	public function Modificar($g_titulo,$g_imagen,$g_titulo_ingles,$g_id){
		$this->sql = "
		call sp_update_modificarGaleria('".$g_titulo."','".$g_imagen."','".$g_titulo_ingles."',".$g_id.")";
		return self::dbedit();
	}

	public function Eliminar($g_id){
		$this->sql = " call sp_delete_eliminarGaleria(".$g_id.")";
		return self::dbdelete();
	}

	/*Otros Detalles*/

	public function getGaleria($g_id){
		$this->sql = "call sp_select_getGaleria(".$g_id.");";
		return self::dbselect();
	}

	public function cambiaEstado($g_id,$g_op){
		$this->sql = "call sp_update_estadoGaleria(".$g_id.",".$g_op.")";
		return self::dbedit();
	}

	public function listarDesactivados(){
		$this->sql = "call sp_select_listarGaleriaDesactivados()";
		return self::dbselect();
	}

	public function buscarGaleria($g_buscar){
		$this->sql = "call sp_select_buscarGaleria('".$g_buscar."')";
		return self::dbselect();
	}
};
 ?>