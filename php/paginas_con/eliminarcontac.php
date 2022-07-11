<?php
    include '../conexion.php';
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta de contactos</title>
        <link rel="shortcut icon" href="../../assets/image/Botanero_favicon.svg" type="image/x-icon">
        <link rel="stylesheet" href="../../css/styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Eliminacion</title>
    </head>
    <body>
    <main class="cons_body">
        <nav class="menu" id="menu">
            <a href="#" class="menu_imagen"><img src="../../assets/image/Botanero_logo_2.svg" alt=""></a>
            <ul class="menu_lista" id="menu_lista">
                <li><a href="contactos.php" class="menu_text">Atrás</a></li>
            </ul>
        </nav>
        <div class="cons_body_contenedor">
        <center>
        <h3>¿Deseas borrar los datos?</h3><br><br><br><br><br><br><br>
</center>
        <center>
        <form method="post">
            <input type="submit" name="submit" 
            value="Si"/><br><br>
            <input type="submit" name="submit3"
             value="No"/>
        </form>
</center>
    <script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
    </body>
</html>