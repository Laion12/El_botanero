<?php
    include "conexion.php";
    if(!isset($_GET['id'])){
        die("Error: id de usuario no existe");
    }
    $query = $dbh->prepare("SELECT * FROM `producto` WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
  
    $query->execute();
    if($query->rowCount() == 0){
     
        die("Error: al encontrar id");
    }else{
       
        $data = $query->fetch();
    }
    if(isset($_POST['submit2'])){
        header("location: ../paginas_con/productos.php");
    }
    if(isset($_POST['submit'])){
        $query = $dbh->prepare("DELETE FROM `producto` WHERE id=:id");
        $query->bindParam(":id", $_GET['id']);
        $query->execute();
        header("location: paginas_con/productos.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eliminacion</title>
    </head>
    <body>
        <h3>¿Deseas borrar los datos?</h3>
        <form method="post">
            <input type="submit" name="submit" value="Si"/>
            <input type="submit" name="submit2" value="No"/>
        </form>
    </body>
</html>