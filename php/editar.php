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

    if(isset($_POST['submit'])){
    
        $cat =$_POST['categoria'];
        $name =$_POST['nombre'];
        $description =$_POST['desc'];
        $query = $dbh->prepare("UPDATE `producto` SET `categoria`=:categoria,`nombre`=:nombre,`descrip`=:descrip WHERE id=:id");
        $query->bindParam(":categoria", $cat,PDO::PARAM_STR,25);
        $query->bindParam(":nombre", $name,PDO::PARAM_STR,25);
        $query->bindParam(":desc", $description,PDO::PARAM_STR,25);
        $query->bindParam(":id", $_GET['id']);
        $query-> execute();
        header("location: ../productos.php");
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
            Categoria <input required type="text" name="categoria" placeholder="Categoria" value="<?php echo $data['categoria'] ?>"/> <br>
            Nombre <input required type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>"/> <br>
            Descripcion <input required type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $data['descripcion'] ?>"/>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>