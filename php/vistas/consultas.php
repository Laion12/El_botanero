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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
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
            <ul class="menu_lista menu_lista3" id="menu_lista">
                <li><a href="administrador.php" class="menu_text">Panel</a></li>
                <li><a href="./productos.php" class="menu_text">Productos</a></li>
                <li><a href="./contactos.php" class="menu_text">Contactos</a></li>
                <li><a href="./usuarios.php" class="menu_text">Usuarios</a></li>
                <li><a href="../salir.php" class="menu_text">Salir</a></li>
            </ul>
        </nav>
        <div class="cons_body">
            <!-- <section class="con_body_form">
                <form action="../php/f_producto.php" method="POST" class="form">
                    <div class="form-header">
                        <h4 class="form-title">P<span>roductos</span></h4>
                    </div>
                    <label for="categoria" class="form-label">Categoría <sup>*</sup></label>
                    <input required type="text" name="categoria" id="categoria" class="form-input" placeholder="Escriba la categoria del producto" pattern="[a-z Z-A]{0,40}" title="Almenos una mayuscula y letras minusculas" required maxlength="40" minlength="4">
        
                    <label for="nombre" class="form-label">Nombre <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-input" placeholder="Escriba el nombre del producto" pattern="[a-z Z-A]{0,40}" title="Almenos una mayuscula y letras minusculas" required maxlength="40" minlength="6">
        
                    <label for="desc" class="form-label">Descripción</label>
                   <textarea id="desc" name="desc" class="form-textarea" placeholder="Escribe aquí su descripcion" pattern="[a-z]{6,60}" maxlength="60" required></textarea>
        
                   <input type="submit" name="submit" class="btn-submit" value="Registrar producto">
                </form>
            </section> -->
            <div class="a_body_contenedor">
                <section class="a_body_logo">
                    <img src="../../assets/image/logo/Botanero_recortado.svg" alt="">

                </section>
                <section class="a_body_titulo">
                    <p>Panel de consultas</p>
                </section>
            </div>
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