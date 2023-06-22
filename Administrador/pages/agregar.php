<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>REGISTRO DE USUARIOS </h2>
  <form action="../controladores/agregarusuarios.php" method="post">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar su nombre" name="txtnombre">
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar su apellido" name="txtapellido">
    </div>
    <div class="form-group">
      <label >Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingresar su usuario" name="txtusuario">
    </div>
    <div class="form-group">
      <label >CONTRASEÑA:</label>
      <input type="password" class="form-control"  placeholder="Ingresar contraseña" name="txtcontrasena">
    </div>
    <div class="form-group">
      <p>Perfil:</p>
              <label for="perfil"></label>
              <select class="form-select" name="txtperfil" aria-label="Default select example">
  <option selected>Elegir opcion</option>
  <option value="Administrador">Administrador</option>
  <option value="Docentes">Docentes</option>
 
</select>
            
    </div>
    <div class="form-group">
      <p>Estado:</p>
              <label for="perfil"></label>
              <select class="form-select" name="txtestado" aria-label="Default select example">
  <option selected>Elegir opcion</option>
  <option value="Activo">Activo</option>
  <option value="No activo">No activo</option>
  
</select>
            
    </div>

 
    <button type="submit" class="btn btn-primary d-block mx-auto">REGISTRAR</button>
  </form>
</div>

</body>
</html>