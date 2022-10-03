<?php
    require_once '../main.php';
    if(!isset($_SESSION['id_u']) || $_SESSION['id_u']=="" || !isset($_SESSION['nombre_u']) || $_SESSION['nombre_u']==""){
        if(headers_sent()){
            echo "<script> window.location.href='../../views/login.html'</script>";
            exit();
        }else{
            header("location: ../../views/login.html");
            exit();
        }
    }else{
    if(!isset($_GET['id'])){
        die("Error: id de usuario no existe");
    }
    $save =conectar();
    $save=$save->prepare("SELECT * FROM `administrador` WHERE id = :id");
    $marcador=[
        ":id"=>$_GET['id']
    ];
    $save->execute($marcador);
    if($save->rowCount() == 0){
        die("Error: al encontrar id");
    }else{
        $data = $save->fetch();
    }
    $save=null;
    if(isset($_POST['submit3'])){
        header("location: ../vistas/usuarios.php");
        exit();
    }
    if(isset($_POST['submit'])){
        $save =conectar();
        $save=$save->prepare("DELETE FROM `administrador` WHERE id=:id");
        $marcador=[
            ":id"=>$_GET['id']
        ];
        $save->execute($marcador);
        $save=null;
        header("location: ../vistas/usuarios.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta de contactos</title>
        <link rel="shortcut icon" href="../../assets/image/logo/Botanero_favicon.svg" type="image/x-icon">
        <link rel="stylesheet" href="../../css/styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Eliminacion</title>
    </head>
    <body>
    <main class="cons_body">
        <nav class="menu" id="menu">
            <a href="#" class="menu_imagen"><img src="../../assets/image/logo/Botanero_logo_2.svg" alt=""></a>
            <ul class="menu_lista" id="menu_lista">
                <li><a href="../vistas/usuarios.php" class="menu_text">Atrás</a></li>
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
<?php
    }
?>