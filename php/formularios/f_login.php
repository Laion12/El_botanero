<?php
    require_once '../main.php';
    $user =limpiar($_POST['nombre']);
    $pass =limpiar($_POST['contrasena']);
    if($user=="" || $pass==""){
        echo "Uno o varios campos vacios";
        exit();
    }
    if(verificar_d("[A-Za-zÑñ\s]{0,40}",$user)){
        echo "El usuario no cumple con el formato solicitado";
        exit();
    }
    if(verificar_d("[A-Za-z0-9Ññ$]{0,12}",$pass)){
        echo "La contraseña no cumple con el formato solicitado";
        exit();
    }
    $save=conectar();
    $save=$save->prepare("SELECT * FROM administrador WHERE nombre=:user");
    $marcador=[
        ":user"=>$user,
    ];
    $save->execute($marcador);
    $rs=$save->fetch();
    if(($save->rowCount()==1) && (password_verify($pass,$rs['contraseña']))){
        $_SESSION['id_u']=$rs['id'];
        $_SESSION['nombre_u']=$rs['nombre'];
        $_SESSION['apellido_u']=$rs['apellido'];
        echo json_encode(array('success' => 2));
    }else{
        echo "Usuario o contraseña invalidos";
    }  
    $save=null;
?>