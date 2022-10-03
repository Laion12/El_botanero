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
    <title>Consulta de usuarios</title>
    <link rel="shortcut icon" href="../../assets/image/logo/Botanero_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <main class="cons_body">
        <nav class="menu" id="menu">
            <div class="menu_imagen">
              <a href="#"><img src="../../assets/image/logo/Botanero_logo_2.svg" alt=""></a>
            </div>
            <ul class="menu_lista" id="menu_lista">
            <li><a href="./contactos.php" class="menu_text">Contactos</a></li>
            <li><a href="./productos.php" class="menu_text">Productos</a></li>
                <li><a href="./consultas.php" class="menu_text">Atrás</a></li>
            </ul>
        </nav>
        <div class="cons_body_contenedor">
          <table border="2">
            <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Contraseña</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
              <?php
$save=conectar();
$save=$save->prepare("SELECT * FROM administrador ORDER BY nombre ASC");
$save->execute();
$results=$save->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){?>
<tr>
  <td><?php echo $result -> id?></td>
  <td><?php echo $result -> nombre?></td>
  <td><?php echo $result -> apellido?></td>
  <td><?php echo $result -> contraseña?></td>
  <td><?php echo $result -> correo?></td>
  <td><a href="<?php echo "../paginas_con/editarusu.php?id=" .$result->id?>"><img src="../../assets/image/iconos/iconoeditar.png" width="40" height="40"></a></td>
  <td><a href="<?php echo "../paginas_con/eliminarusu.php?id=" .$result->id?>"><img src="../../assets/image/iconos/iconoeliminar.png" width="40" height="40"></a></td>
  </tr>
  
<?php } $save=null;?>
              </tbody>
          </table>
        </div>
        <div class="cons_body_boton">
            <button><a href="./../reportes/r_usuario.php" target="_blanck">Descarga consulta de Usuarios</a></button>
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