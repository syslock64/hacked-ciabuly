<?php 
session_start();
require_once '../info/info.php';
$_SESSION['iniciado'] = false;
$setUser = md5($info['logueo'][0]);
$setPass = md5($info['logueo'][1]);

$getUser = $_POST['user'];
$getPass = $_POST['pass'];

if(md5($getUser) == $setUser){
	if(md5($getPass)==$setPass){
		$_SESSION['iniciado'] = true;
		header('Location: ../inicio.php');
	}else{
		header('Location: ../logueo.php?msg=ep');
	}
}else{
	header('Location: ../logueo.php?msg=eu');
}
 ?>