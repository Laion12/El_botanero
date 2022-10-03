<?php
    require_once '../main.php';
    $name =limpiar($_POST['nombre']);
    $lastname =limpiar($_POST['apellidos']);
    $email =limpiar($_POST['correo']);
    $mesage =limpiar($_POST['mensaje']);
    $date = date('Y-m-d');
    if($name=="" || $lastname=="" || $email=="" || $mesage==""){
        echo "Uno o varios campos vacios";
        exit();
    }
    if(verificar_d("[A-Za-zÑñ\s]{0,40}",$name)){
        echo "El nombre no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-zÑñ\s]{0,40}",$lastname)){
        echo "El apellido no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-z0-9.+-_]+@[a-z]+\.[a-z]{2,3}",$email)){
        echo "El correo no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-z0-9Ññ\s]{0,60}",$mesage)){
        echo "El mensaje no cumple con el formato solicitado";
        exit();
    }
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    
    }else{
        echo "El correo no es valido";
        exit();
    }
    $save=conectar();
    $save=$save->prepare("INSERT INTO contacto (nombre,apellido,correo,mensaje,fecha) VALUES (:nombre,:apellido,:correo,:mensaje,:fecha)");
    $marcador=[
        ":nombre"=>$name,
        ":apellido"=>$lastname,
        ":correo"=>$email,
        ":mensaje"=>$mesage,
        ":fecha"=>$date,
    ];
    $save->execute($marcador);
    echo "Datos guardados";
    $save=null;
    ?>