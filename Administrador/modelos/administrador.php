<?php
include_once('../../Conexion.php');
class Administrador extends Conexion
{



	 public function __construct(){

   $this->db=parent::__construct();
 }

//funcion para registrar los usuarios
public function addadmi($Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu)
{
   //verificar de que no exista un usuario en la bd 
   $sql1 = "SELECT * FROM usuarios WHERE Usuario = '$Usuariousu'";
    $Resultado=$this->db->query($sql1);
   if ($Resultado->rowCount() > 0) {
           
        
      echo "<script>
          alert('El usuario ya esta registrado');
          window.location = '../pages/agregar.php';
      </script>";   
    }else
    {
   //crear la sentencia sql
   $statement = $this->db->prepare("INSERT INTO usuarios(Nombreusu,Apellidousu,Usuario,Passwordusu,Perfil,Estado)values(:Nombreusu,:Apellidousu,:Usuariousu,:Passwordusu,:Perfil,:Estadousu)");

   $statement->bindParam(':Nombreusu',$Nombreusu);
   $statement->bindParam(':Apellidousu',$Apellidousu);
   $statement->bindParam(':Usuariousu',$Usuariousu);
   $statement->bindParam(':Passwordusu',$Passwordusu);
   $statement->bindParam(':Perfil',$Perfil);
   $statement->bindParam(':Estadousu',$Estadousu);
   if($statement->execute())
   {
     
     echo "Usuario registrado";
     header('Location: ../pages/index.php');

   }else
   {
      echo "Usuario no registrado";
      header('Location: ../pages/agregar.php');

   }
}
}
//}




//funcion para consultar todos los usuarios administradores

public function getadmin()
{
 //$row=null;
 $sql = "SELECT * FROM usuarios WHERE Perfil='Administrador'";
        $result = $this->db->query($sql); 
        if ($result->rowCount() > 0) {
            while($row = $result->fetch()) {
                $resultset[] = $row;
            }
        }
        return $resultset;

}

//funcion para consultar el usuario de acuerdo a su id
public function getidad($Id)
{
   $statement = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            
            // Obtener los resultados utilizando fetch()
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Devolver los resultados
            return $resultado;

}

//funcion actualizar los datos del usuario
public function updatead($Id,$Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu)
{
   $statement=$this->db->prepare("UPDATE usuarios SET id_usuario=:Id,Nombreusu=:Nombreusu, Apellidousu=:Apellidousu, Usuario=:Usuariousu, Passwordusu=:Passwordusu,Perfil:=Perfil,Estadousu=:Estadousu WHERE id_usaurio=$Id");
   $statement->bindParam(':Id',$Id);
   $statement->bindParam(':Nombreusu',$Nombreusu);
   $statement->bindParam(':Apellidousu',$Apellidousu);
   $statement->bindParam(':Usuariousu',$Usuariousu);
   $statement->bindParam(':Passwordusu',$Passwordusu);
   $statement->bindParam(':Perfil',$Perfil);
   $statement->bindParam(':Estadousu',$Estadousu);
   if($statement->execute())
   {
      header('Location: ../pages/index.php');
   }else 
   {
      header('Location: ../pages/editar.php');
   } 

}
//funcion para eliminar un usuario
public function deletead($Id){
$statement=$this->db->prepare("DELETE FROM usuarios WHERE id_usuario=:Id");
   $statement->bindParam(':Id',$Id);
   if($statement->execute()){
       echo "<script>
          alert('usuario eliminado');
          window.location = '../pages/index.php';
      </script>";  

         
      }else
      {
             echo "<script>
          alert('usuario no puede ser eliminado');
          window.location = '../pages/index.php';
      </script>";  

      }

}
}

?>