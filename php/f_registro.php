<?php
    include "conexion.php";
    if(isset($_POST['submit'])){
        $name =$_POST['nombre'];
        $lastname =$_POST['apellidos'];
        $pass =$_POST['contrasena'];
        $email =$_POST['correo'];
        $callback=$dbh->prepare("SELECT * FROM administrador WHERE correo='$email'");
        $callback->execute();
        if($callback->rowCount() > 0){
            echo "Correo ya utilizado";
            header("location: ../views/registro.html");
            exit();
        }
        $query = $dbh->prepare("INSERT INTO administrador (nombre,apellido,contraseña,correo) VALUES (:nombre,:apellido,:contrasena,:correo)");
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":apellido", $lastname,PDO::PARAM_STR,25);
        $query->bindParam(":contrasena", $pass,PDO::PARAM_STR,25);
        $query->bindParam(":correo", $email,PDO::PARAM_STR,25);
        $query->execute();
        header("location: ../views/login.html");
    }else{
        echo "Error al registrarse";
    }

?>