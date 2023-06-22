<?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');

if($_POST)
{
   //crear un objeto de la clase administrador

	$admin = new Administrador();
	$Nombreusu = $_POST['txtnombre'];
	$Apellidousu = $_POST['txtapellido'];
	$Usuariousu = $_POST['txtusuario'];
	$Passwordusu = MD5($_POST['txtcontrasena']);
	$Perfil = $_POST['txtperfil'];
	$Estadousu = $_POST['txtestado'];

	$admin->addadmi($Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu);


}

?>