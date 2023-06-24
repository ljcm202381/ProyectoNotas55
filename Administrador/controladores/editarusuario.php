<?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');


if($_POST)
{
$admin = new Administrador();
	$Id = $_POST['Id'];
	$Nombreusu= $_POST['txtnombre'];
	$Apellidousu=$_POST['txtapellido'];
	$Usuariousu=$_POST['txtusuario'];
	$Passwordusu=MD5($_POST['txtcontrasena']);
	$Perfil=$_POST['txtperfil'];
	$Estadousu=$_POST['txtestado'];

$admin->updatead($Id,$Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu);
}

?>