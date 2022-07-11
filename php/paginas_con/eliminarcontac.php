<?php
    include "conexion.php";
    if(!isset($_GET['id'])){
        die("Error: id de usuario no existe");
    }
    $query = $dbh->prepare("SELECT * FROM `contacto` WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
  
    $query->execute();
    if($query->rowCount() == 0){
     
        die("Error: al encontrar id");
    }else{
       
        $data = $query->fetch();
    }
    if(isset($_POST['submit3'])){
        header("location: contactos.php");
    }
    if(isset($_POST['submit'])){
        $query = $dbh->prepare("DELETE FROM `contacto` WHERE id=:id");
        $query->bindParam(":id", $_GET['id']);
        $query->execute();
        header("location: contactos.php");
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
            <input type="submit" name="submit3" value="No"/>
        </form>
    </body>
</html>