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
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Panel administrador</title>
    <link rel="shortcut icon" href="../../assets/image/logo/Botanero_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <main class="a_body">
        <nav class="menu" id="menu">
            <div class="menu_imagen">
                <a href="#"><img src="../../assets/image/logo/Botanero_logo_2.svg" alt=""></a>
            </div>
            <ul class="menu_lista" id="menu_lista">
                <li><a href="#" class="menu_text">Panel</a></li>
                <li><a href="./add_producto.php" class="menu_text">Productos</a></li>
                <li><a href="./consultas.php" class="menu_text">Consultas</a></li>
                <li><a href="../salir.php" class="menu_text">Salir</a></li>
            </ul>
        </nav>
        <div class="a_body_contenedor">
            <section class="a_body_logo">
                <img src="../../assets/image/logo/Botanero_recortado.svg" alt="">
                
            </section>
            <section class="a_body_titulo">
                <p>Bienvenido al panel de administración</p>
            </section>
        </div>
    </main>
    <script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
</body>
</html>
<?php
    }
?>