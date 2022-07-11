<?php
    include '../conexion.php';
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
        header("location: productos.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li><a href="contactos.php" class="menu_text">Atras</a></li>
            </ul>
        </nav>
        <div class="cons_body_contenedor">
        <h3>¿Deseas borrar los datos?</h3>
        <form method="post">
            <input type="submit" name="submit" value="Si"/>
            <input type="submit" name="submit2" value="No"/>
        </form>
        <script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
    </body>
</html>