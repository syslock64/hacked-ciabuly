<?php 
include './module/validaLog.php'; 
include 'info/info.php';

$inicio = $categoria = $galeria = $producto=0;

switch(basename($_SERVER['PHP_SELF'])){
case "inicio.php" : $inicio = "class='active'"; break;
case "categoria.php" : $categoria = "class='active'"; break;
case "galeria.php" : $galeria = "class='active'"; break;
case "producto.php" : $producto = "class='active'"; break;
}

?>
<header>
	<div class="col-md-4 col-xs-12" style="float:right;padding-top: 33px;">
    <marquee> 
      Desde este momento toda transacción que realice es almacenada, se recomienda verificar los cambios antes de ser guardados.
    </marquee>
  </div>
<img src="app/img/logo.png">

<!-- Aqui va el navegador-menu de BOOTSTRAP-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sistema de Mantenimiento <?php echo $info['empresa'][0]; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo $inicio; ?>><a href="inicio.php">Inicio</a></li>
        <li <?php echo $categoria; ?>><a href="categoria.php">Categorías</a></li>
        <li <?php echo $producto; ?>><a href="producto.php">Productos</a></li>
        <li <?php echo $galeria; ?>><a href="galeria.php">Galería</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="../view/moduleLogueo/cerrarSesion.php">Cerrar Sesión</a></li>
        <!--li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ajustes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
          </ul>
        </li-->
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>