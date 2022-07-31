<?php
    include "conexion.php";
    if(isset($_POST['submit'])){
        $name =$_POST['nombre'];
        $lastname =$_POST['apellido'];
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



    $ip =$_SERVER['REMOTE_ADDR'];
    $captcha =$_POST['g-recaptcha-response'];
    $secretkey ="6LfvdTUhAAAAAGPim8AWqljGYcGdzvAX_haDy_ZF";

    $respuesta =file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

    $atributos =json_decode($respuesta, TRUE);

    if($atributos['success']){
        echo 'Verificar captcha';
    }

?>