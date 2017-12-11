<?php 

interface i_categoria{
	public function ListaPaginado($v_limit,$v_off);
	public function Listar(); // falta para paginador
	public function Agregar($c_nombre,$c_nombre_ingles);
	public function Modificar($c_nombre,$c_nombre_ingles,$c_id); 
	public function Eliminar($c_id);

	public function getCategoria($c_id);// Obtiene datos de categoria seleccionada vía ID
	public function cambiaEstado($c_id,$c_op);
	public function listarDesactivados();
	public function buscarCategoria($c_buscar);
	public function validarCategoria($c_id);
}

interface i_galeria{
	public function ListaPaginado($v_limit,$v_off);
	public function Listar(); // falta para paginador
	public function Agregar($g_titulo,$g_imagen,$g_titulo_ingles);
	public function Modificar($g_titulo,$g_imagen,$g_titulo_ingles,$g_id);
	public function Eliminar($g_id);

	public function getGaleria($g_id);// Obtiene datos de galeria seleccionada vía ID
	public function cambiaEstado($g_id,$g_op);
	public function listarDesactivados();
	public function buscarGaleria($g_buscar);
}


interface i_producto{
	public function ListaPaginado($v_limit,$v_off);
	public function Listar(); // falta para paginador
	public function Agregar(
							$p_nombre
							,$p_descripcion
							,$p_imagen
							,$p_archivo
							,$p_nombre_ingles
							,$p_descripcion_ingles
							,$p_archivo_ingles
							,$p_categoria_id
							);
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
							);
	public function Eliminar($p_id);

	public function listarCategorias();

	public function listarCategoriasProd();
	public function getProducto($p_id);
	public function cambiaEstado($p_id,$p_op);
	public function listarDesactivados();
	public function buscarProducto($p_buscar);

	public function filasCountFiltro($p_cat);
	public function filtrarProductos($v_limit,$v_off,$p_cat_id);
}

 ?>