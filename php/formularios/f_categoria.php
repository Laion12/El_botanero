<?php
    require_once '../main.php';
    if(isset($_POST['submit'])){
        $name_c=limpiar($_POST['nombre_c']);
        if($name_c==""){
            echo "Campo vacios";
            exit();
        }
        if(verificar_d("[A-Za-zÑñ\s]{4,40}",$name_c)){
            echo "La categoria no cumple con el formato solicitado";
            exit();
        }
        $save=conectar();
        $save=$save->prepare("INSERT INTO categoria (tipo) VALUES (:cat)");
        $marcador=[
            ":cat"=>$name_c
        ];
        $save->execute($marcador);
        echo "Registro exitoso";
        $save=null;
        echo "<script> alert('Categoría agregada'); </script>";
        echo "<script> setTimeout(function () {
            window.location.href= '../vistas/add_categoria.php';
         }, 2000);</script>";
        exit();
    }else{
        echo "Error de iniciar";
    }
?>