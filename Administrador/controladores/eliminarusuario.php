<?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');

 $obj = new Administrador();
$Id=$_POST['Id'];

      $datos = $obj->getadmin($Id);

?>