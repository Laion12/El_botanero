<?php
    include "conexion.php";
    if(isset($_POST['submit'])){
        $cat =$_POST['categoria'];
        $name =$_POST['nombre'];
        $description =$_POST['desc'];
        $query = $dbh->prepare("INSERT INTO producto (categoria,nombre,descripcion,id_admin) VALUES (:cat,:nom,:descrip,null)");
        $query->bindParam(":cat", $cat,PDO::PARAM_STR,25);
        $query->bindParam(":nom", $name,PDO::PARAM_STR,25);
        $query->bindParam(":descrip", $description,PDO::PARAM_STR,25);
        $query->execute();
        header("location: ../views/consultas.html");
    }else{
        echo "Error al guardar el producto";
    }
?>