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

    if(isset($_POST['submit'])){
    
        $cat =$_POST['categoria'];
        $name =$_POST['nombre'];
        $description =$_POST['descripcion'];
        $query = $dbh->prepare("UPDATE `producto` SET `categoria`=:categoria,`nombre`=:nombre,`descripcion`=:descripcion WHERE id=:id");
        $query->bindParam(":categoria", $cat,PDO::PARAM_STR,25);
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":descripcion", $description,PDO::PARAM_STR,25);
        $query->bindParam(":id", $_GET['id']);
        $query-> execute();
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
        <title>Editar datos</title>
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
        <form method="post">
            Categoría <input required type="text" name="categoria" placeholder="Categoria" value="<?php echo $data['categoria'] ?>"/> <br>
            Nombre <input required type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>"/> <br>
            Descripción <input required type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $data['descripcion'] ?>"/>
            <input type="submit" name="submit" />
        </form>
</center>
<script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
    </body>
</html>