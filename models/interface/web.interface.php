<?php 

interface i_galeria{
	public function ListaPaginado($v_limit,$v_off);//Lista con paginacion
	public function Listar();//Lista en general
}

interface i_producto{
	public function listarCategorias();
	public function ListaPaginado($v_limit,$v_off,$cat);
	public function Listar($cat);

	public function getUltimaCategoria();
	public function detalleProducto($p_id);
}

?>