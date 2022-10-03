<?php
    require_once '../main.php';
    $name =limpiar($_POST['nombre']);
    $lastname =limpiar($_POST['apellidos']);
    $pass =limpiar($_POST['contrasena']);
    $email =limpiar($_POST['correo']);
    if($name=="" || $lastname=="" || $pass=="" || $email==""){
        echo "Uno o varios campos vacios";
        exit();
    }
    if(verificar_d("[A-Za-zÑñ\s]{0,30}",$name)){
        echo "El nombre no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-zÑñ\s]{0,30}",$lastname)){
        echo "El apellido no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-z0-9$]{0,14}",$pass)){
        echo "La contraseña no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-z0-9.+-_]+@[a-z]+\.[a-z]{2,3}",$email)){
        echo "El correo no cumple con el formato solicitado";
        exit();
    }
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    
    }else{
        echo "El correo no es valido";
        exit();
    }
    $save=conectar();
    $save=$save->prepare("SELECT * FROM administrador WHERE correo='$email'");
    $save->execute();
    if($save->rowCount()>0){
        echo "Correo ya registrado";
        exit();
    }
    $save=null;
    $save=conectar();
    $hash=password_hash($pass,PASSWORD_DEFAULT,['cost' => 8]);
    $save=$save->prepare("INSERT INTO administrador (nombre,apellido,contraseña,correo) VALUES (:nombre,:apellido,:contrasena,:correo)");
    $marcador=[
        ":nombre"=>$name,
        ":apellido"=>$lastname,
        ":contrasena"=>$hash,
        ":correo"=>$email
    ];
    $save->execute($marcador);
    echo json_encode(array('success' => 1));
    $save=null;
?>