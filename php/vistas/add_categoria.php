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
    <title>Agregar categoría</title>
    <link rel="shortcut icon" href="../../assets/image/logo/Botanero_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<main class="con_body">
        <nav class="menu" id="menu">
            <div class="menu_imagen">
                <a href="#"><img src="../../assets/image/logo/Botanero_logo_2.svg" alt=""></a>
            </div>
            <ul class="menu_lista" id="menu_lista">
                <li><a href="administrador.php" class="menu_text">Panel</a></li>
                <li><a href="add_producto.php" class="menu_text">Productos</a></li>
                <li><a href="../salir.php" class="menu_text">Salir</a></li>
            </ul>
        </nav>
        <div class=".con_body_contenedor">
            <section class="con_body_form">
                <form action="../formularios/f_categoria.php" method="POST" class="form">
                    <div class="form-header">
                        <h4 class="form-title">C<span>ategorías</span></h4>
                    </div>
                    <label for="nombre" class="form-label">Nombre de la categoría<sup>*</sup></label>
                    <input type="text" name="nombre_c" id="nombre" class="form-input" placeholder="Escriba el nombre de la categoria" pattern="[A-Za-zÑñ\s]{0,40}" title="Solo letras" required maxlength="20" minlength="4">
        
                   <input type="submit" name="submit" class="btn-submit" value="Registrar producto">
                </form>
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