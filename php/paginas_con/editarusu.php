<?php
     include '../conexion.php';
     if(!isset($_GET['id'])){
        die("Error: id de usuario no existe");
    }
    $query = $dbh->prepare("SELECT * FROM `administrador` WHERE id = :id");
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
        $pass =$_POST['contrasena'];
        $email =$_POST['correo'];
        $query = $dbh->prepare("UPDATE `administrador`SET `nombre`=:nombre,`apellido`=:apellido,`contraseña`=:contrasena,`correo`=:correo WHERE id=:id");
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":apellido", $lastname,PDO::PARAM_STR,25);
        $query->bindParam(":contrasena", $pass,PDO::PARAM_STR,25);
        $query->bindParam(":correo", $email,PDO::PARAM_STR,25);
        $query->bindParam(":id", $_GET['id']);
        $query->execute();
        header("location: usuarios.php");
    }else{
        echo "Error al registrarse";
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
                <li><a href="usuarios.php" class="menu_text">Atrás</a></li>
            </ul>
        </nav>
        <div class="cons_body_contenedor">
        <center>
        <form method="post">
            Nombre: <input required type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>"/> <br>
            Apellido: <input required type="text" name="apellido" placeholder="Apellido" value="<?php echo $data['apellido'] ?>"/> 
            Contraseña: <input required type="password" name="contrasena" placeholder="Contraseña" value="<?php echo $data['contrasena'] ?>"/>
            Correo: <input required type="text" name="correo" placeholder="Correo" value="<?php echo $data['correo'] ?>"/> 
            <input type="submit" name="submit" />
        </form>
        </center>
     <script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
    </body>
</html>