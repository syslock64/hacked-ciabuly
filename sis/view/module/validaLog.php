<?php 
@session_start();
if($_SESSION['iniciado']==false){ 
	header ('Location: ../index.php');
} 
 ?>