<?php
include_once('../../Conexion.php');
class Docentes extends Conexion
{



	 public function __construct(){

   $this->db=parent::__construct();
 }

//funcion para registrar los usuarios
public function adddocente($Nombredoc,$Apellidodoc,$Dococumentodoc,$Correodoc,$Materiadoc,$Usuariodoc,$Passworddoc,$Perfil,$Estadousu)
{
   //verificar de que no exista un usuario en la bd 
   $sql1 = "SELECT * FROM docentes WHERE Usuariodoc = '$Usuariodoc'";
    $Resultado=$this->db->query($sql1);
   if ($Resultado->rowCount() > 0) {
           
        
      echo "<script>
          alert('El docente ya esta registrado');
          window.location = '../pages/agregar.php';
      </script>";   
    }else
    {
   //crear la sentencia sql
   $statement = $this->db->prepare("INSERT INTO docentes(Nombredoc,Apellidodoc,Documentodoc,Correodoc,Materiadoc,Usuariodoc,Passworddoc,Perfil,Estadodoc)values(:Nombredoc,:Apellidodoc,:Dococumentodoc,:Correodoc,:Materiadoc,:Usuariodoc,:Passworddoc,:Perfil,:Estadodoc)");

   $statement->bindParam(':Nombredoc',$Nombredoc);
   $statement->bindParam(':Apellidodoc',$Apellidodoc);
   $statement->bindParam(':Documentodoc',$Documentodoc);
   $statement->bindParam(':Correodoc', $Correodoc);
   $statement->bindParam(':Materiadoc',$Materiadoc);
   $statement->bindParam(':Usuariodoc',$Usuariodoc);
   $statement->bindParam(':Passworddoc',$Passworddoc);
   $statement->bindParam(':Perfil',$Perfil);
   $statement->bindParam(':Estadodoc',$Estadodoc);
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
  $row=null;
  $statement=$this->db->prepare("SELECT * FROM usuarios WHERE id_usaurio=:Id AND Perfil='Administrador'");
  $statement->bindParam(':Id',$Id);
  $statement->execute();
  while($result->$statement->fetch()){
   $row[]=$result;
  }


}

//funcion actualizar los datos del usuario
public function updatead($Id,$Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Estadousu)
{
   $statement=$this->bd->prepare("UPDATE usuarios SET Nombreusu=:Nombreusu, Apellidousu=:Apellidousu, Usuario=:Usuariousu, Password=:Passwordusu, Estado=:Estadousu WHERE id_usaurio=$Id");
   $statement->bindParam(':Id',$Id);
   $statement->bindParam(':Nombreusu',$Nombreusu);
   $statement->bindParam(':Apellidousu',$Apellidousu);
   $statement->bindParam(':Usuariousu',$Usuariousu);
   $statement->bindParam(':Passwordusu',$Passwordusu);
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
public function deletead($Id)
{

}


}


?>