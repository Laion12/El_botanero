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
    $save=$save->prepare("SELECT * FROM `contacto` WHERE id = :id");
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
    if(isset($_POST['submit'])){    
        $name =limpiar($_POST['nombre']);
        $lastname =limpiar($_POST['apellido']);
        $email =$_POST['correo'];
        $mesage =limpiar($_POST['mensaje']);
        $date = date('Y-m-d');
        $save =conectar();
        $save=$save->prepare("UPDATE `contacto` SET `nombre`=:nombre,`apellido`=:apellido,`correo`=:correo,`mensaje`=:mensaje,`correo`=:correo WHERE id=:id");
        $marcador=[
            ":nombre"=>$name,
            ":apellido"=>$lastname,
            ":correo"=>$email,
            ":mensaje"=>$mesage,
            ":id"=>$_GET['id']
        ];
        $save->execute($marcador);
        $save=null;
        header("location: ../vistas/contactos.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/image/logo/Botanero_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Editar datos</title>
    </head>
    
    <body>
    <main class="cons_body">
        <nav class="menu" id="menu">
            <a href="#" class="menu_imagen"><img src="../../assets/image/logo/Botanero_logo_2.svg" alt=""></a>
            <ul class="menu_lista" id="menu_lista">
                <li><a href="../vistas/contactos.php" class="menu_text">Atrás</a></li>
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
<?php
    }
?>