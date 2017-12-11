<?php 
require_once 'sis/models/db/db.class.php';
require 'models/interface/web.interface.php';	

class Producto extends Crud implements i_producto{

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
	public function ListaPaginado($v_limit,$v_off,$cat){
		$query = "call sp_web_select_listaProducto(".$v_limit.",".$v_off.",".$cat.");";
    	return $query;
	}
	public function Listar($cat){
		$query = "
		select * from producto 
		where producto_activo=1
		and categoria_id = ".$cat;

	    return $query;
	}

	public function getUltimaCategoria(){
		$this->sql = "
		select * from 
		categoria
		where 
		categoria_activo=1
		order by categoria_id DESC
		limit 1";

		return self::dbselect();
	}

	public function detalleProducto($p_id){
		$query = "
				select * from	
					producto p
				inner join
					categoria c
				on
					c.categoria_id = p.categoria_id
				where
					p.producto_activo = 1
				and 
					p.producto_id = ".$p_id;

		return $query;
	}

};
 ?>