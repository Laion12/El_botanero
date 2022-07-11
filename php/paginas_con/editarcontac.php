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

    if(isset($_POST['submit'])){
    
        $name =$_POST['nombre'];
        $lastname =$_POST['apellidos'];
        $email =$_POST['correo'];
        $mesage =$_POST['mensaje'];
        $date = date('Y-m-d');
        $query = $dbh->prepare("UPDATE `contacto` SET `nombre`=:nombre,`apellidos`=:apellidos,`correo`=:correo,`mensaje`=:mensaje,`correo`=:correo WHERE id=:id");
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":apellidos", $lastname,PDO::PARAM_STR,25);
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
        <title>Editar datos</title>
    </head>
    <body>
        <h3>Modificar datos</h3>
        <form method="post">
            Nombre <input required type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>"/> <br>
            Apellidos <input required type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $data['apellidos'] ?>"/> <br>
            Correo <input required type="text" name="correo" placeholder="Correo" value="<?php echo $data['correo'] ?>"/> <br>
            Mensaje <input required type="text" name="mensaje" placeholder="Mensaje" value="<?php echo $data['mensaje'] ?>"/> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>