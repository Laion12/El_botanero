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
    <title>Agregar producto</title>
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
                <li><a href="add_categoria.php" class="menu_text">Categorías</a></li>
                <li><a href="../salir.php" class="menu_text">Salir</a></li>
            </ul>
        </nav>
        <div class=".con_body_contenedor">
            <section class="con_body_form">
                <form action="../formularios/f_producto.php" method="POST" enctype="multipart/form-data" class="form">
                    <div class="form-header">
                        <h4 class="form-title">P<span>roductos</span></h4>
                    </div>
                    <label for="nombre" class="form-label">Nombre <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-input" placeholder="Escriba el nombre del producto" pattern="[A-Za-z\s]{0,40}" title="Almenos una mayuscula y letras minusculas" required maxlength="40" minlength="6">
                    <label for="categoria" class="form-label">Categoría <sup>*</sup></label>
                    <select name="categoria" id="">
                    <?php
                        $save=conectar();
                        $save=$save->prepare("SELECT * FROM categoria");
                        $save->execute();
                        $resul=$save->fetchAll(PDO::FETCH_OBJ);
                        foreach($resul as $rs){?>
                            <option value="<?php echo $rs->tipo?>"><?php echo $rs->tipo?></option>
                    <?php } $save=null;?>
                    </select>
                    <label for="imagen" class="form-label">Imagen del producto <sup>(jpg,png)*</sup></label>
                    <label for="imagen" class="form-label">Imagen menor a 2MB</label>
                    <label for=""><a href="https://squoosh.app/" target="_blank" rel="noopener noreferrer">Comprime tu image aquí</a></label>
                    <input type="file" name="imagen" id="imagen">
                    <label for="" class="form-label">Stock del producto<sup>*</sup></label>
                    <label for="stock">Con stock <input type="radio" name="stock" id="stock" value="Si"></label>
                    <label for="stock">Sin stock <input type="radio" name="stock" id="sctok1" value="No"> <br></label>
                    <label for="desc" class="form-label">Descripción</label>
                   <textarea id="desc" name="desc" class="form-textarea" placeholder="Escribe aquí su descripcion" pattern="[A-Za-z0-9Ññ\s]{6,60}" maxlength="60" required></textarea>
        
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