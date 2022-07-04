<?php
    include "conexion.php";
    if(isset($_POST['submit'])){
        $name =$_POST['nombre'];
        $lastname =$_POST['apellidos'];
        $email =$_POST['correo'];
        $mesage =$_POST['mensaje'];
        $date = date('Y-m-d');
        $query = $dbh->prepare("INSERT INTO contacto (nombre,apellido,correo,mensaje,fecha) VALUES (:nombre,:apellido,:correo,:mensaje,:fecha)");
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":apellido", $lastname,PDO::PARAM_STR,25);
        $query->bindParam(":correo", $email,PDO::PARAM_STR,25);
        $query->bindParam(":mensaje", $mesage,PDO::PARAM_STR,25);
        $query->bindParam(":fecha", $date,PDO::PARAM_STR);
        $query->execute();
        header("location: ../index.html");
    }else{
        echo "Error al cachar los mensajes";
    }
?>