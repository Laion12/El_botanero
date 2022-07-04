<?php
    include "conexion.php";
    if(isset($_POST['submit'])){
        $user =$_POST['nombre'];
        $pass =$_POST['contrasena'];
        $query = $dbh->prepare("SELECT nombre,contraseña FROM administrador WHERE nombre=:user AND contraseña=:pass");
        $query->bindParam(":user", $user);
        $query->bindParam(":pass", $pass);
        $query->execute();
        $result=$query->fetch();
        if($query->rowCount()==1){
            header("location: ../views/administrador.html");
        }else{
            header("location: ../views/login.html");
        }
        
    }else{
        echo "Error al iniciar sesion";
    }
?>