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
    $save=$save->prepare("SELECT * FROM `producto` WHERE id_producto = :id");
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
        $cat =limpiar($_POST['categoria']);
        $stock =limpiar($_POST['stock']);
        if($stock=="Si"){
            $stk=1;
        }else{
            $stk=0;
        }
        echo $stk;
        $description =limpiar($_POST['descripcion']);
        $save=conectar();
        $save=$save->prepare("UPDATE `producto` SET `nombre`=:nombre,`categoria`=:categoria,`descripcion`=:descripcion,`stock`=:stock WHERE id_producto=:id");
        $marcador1=[
            ":nombre"=>$name,
            ":categoria"=>$cat,
            ":descripcion"=>$description,
            ":stock"=>$stk,
            ":id"=>$_GET['id']
        ];
        echo $marcador1;
        $save->execute($marcador1);
        $save=null;
        header("location: ../vistas/productos.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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
                <li><a href="../vistas/productos.php" class="menu_text">Atrás</a></li>
            </ul>
        </nav>
        <div class="cons_body_contenedor">
        <center>
        <form method="post" class="form-edit">
            Nombre <input required type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>"/> <br>
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
            <br>
            <select name="stock" id="">
                    <option value="Si">Con stock</option>
                    <option value="No">Sin stock</option>
            </select>
            Descripción <input required type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $data['descripcion'] ?>"/>
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