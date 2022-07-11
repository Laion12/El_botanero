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

    if(isset($_POST['submit'])){
    
        $name =$_POST['nombre'];
        $lastname =$_POST['apellidos'];
        $email =$_POST['correo'];
        $mesage =$_POST['mensaje'];
        $date = date('Y-m-d');
        $query = $dbh->prepare("UPDATE `contacto` SET `nombre`=:nombre,`apellido`=:apellido,`correo`=:correo,`mensaje`=:mensaje,`correo`=:correo WHERE id=:id");
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":apellido", $lastname,PDO::PARAM_STR,25);
        $query->bindParam(":correo", $email,PDO::PARAM_STR,25);
        $query->bindParam(":mensaje", $mesage,PDO::PARAM_STR,25);
        $query->bindParam(":id", $_GET['id']);
        $query-> execute();
        header("location: contactos.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
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
            Nombre: <input required type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>"/> <br>
            Apellido: <input required type="text" name="apellido" placeholder="Apellido" value="<?php echo $data['apellido'] ?>"/> 
            Correo: <input required type="text" name="correo" placeholder="Correo" value="<?php echo $data['correo'] ?>"/>
            Mensaje: <input required type="text" name="mensaje" placeholder="Mensaje" value="<?php echo $data['mensaje'] ?>"/> 
            <input type="submit" name="submit" />
        </form>
        </center>
     <script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
    </body>
</html>