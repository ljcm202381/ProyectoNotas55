<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
      
        <!-- Grey with black text -->
<nav nav class="navbar navbar-expand-sm bg-dark navbar-dark"">
   <a class="navbar-brand" href="#">
    <img src="../../img/colegio.png" alt="Logo" style="width:40px;">
  </a>
   <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="">Usuarios</a>
    </li>
  <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="">Docentes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">Estudiantes</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="">Materias</a>
    </li>
     <li class="nav-item">
       <a href="cerrar_sesion.php"><button class="btn btn-danger col col align-self-end"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            
    </li>
    
     </ul>
</nav>
      <br>
      <div class="container"> 
          
<h1 style="color:blue;text-align: center;">LISTADO DE USUARIOS</h1>

   <div col="col-auto-mt-5">
       
   <table class="table table-dark table-hover">
      <tr>
          
     <th>ID USUARIO</th>
     <th>NOMBRE</th>
     <th>APELLIDO</th>
     <th>USUARIO</th>
     <th>PERFIL</th>
     <th>ESTADO</th>
     <th>ACTUALIZAR</th>
     <th>ELIMINAR</th>

  </tr> 

  <tbody>
      <?php 
      require_once('../../Conexion.php');
      require_once('../modelos/administrador.php');

        //crear el objeto para acceder a las funciones de la clase administrador
      $obj = new Administrador();
      $datos = $obj->getadmin();

      
       foreach($datos as $datos){
        ?>
      <tr>
          <td><?php echo $datos['id_usuario']?></td>
          <td><?php echo $datos['Nombreusu']?></td>
          <td><?php echo $datos['Apellidousu']?></td>
          <td><?php echo $datos['Usuario']?></td>
          <td><?php echo $datos['Perfil']?></td>
          <td><?php echo $datos['Estado']?></td>
            <td> <a href="editarusuario.php?Id=<?php echo $datos['id_usuario']?>" class="btn btn-success">Actualizar</a>
          <td><a href="../controladores/eliminarusuario.php?Id=<?php echo $datos['id_usuario']?>" class="btn btn-success">Eliminar</a>
      </tr>

<?php } ?>
  </tbody>
   </table>
   </div>

      </div>
        
       
    </body>
</html>