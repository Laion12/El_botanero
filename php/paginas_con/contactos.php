<?php
    include '../conexion.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de contactos</title>
    <link rel="shortcut icon" href="../../assets/image/Botanero_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <main class="cons_body">
        <nav class="menu" id="menu">
            <a href="#" class="menu_imagen"><img src="../../assets/image/Botanero_logo_2.svg" alt=""></a>
            <ul class="menu_lista" id="menu_lista">
                <li><a href="../../views/consultas.html" class="menu_text">Atrás</a></li>
            </ul>
        </nav>
        <div class="cons_body_contenedor">
            <table border="2">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Correo</th>
                      <th scope="col">Mensaje</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
$query=$dbh->prepare("SELECT * FROM contacto");
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){?>
<tr>
  <td><?php echo $result -> id?></td>
  <td><?php echo $result -> nombre?></td>
  <td><?php echo $result -> apellido?></td>
  <td><?php echo $result -> correo?></td>
  <td><?php echo $result -> mensaje?></td>
  <td><a href="<?php echo "editarcontac.php?id=" .$result->id?>"><img src="../../assets/image/fotos/iconoeditar.png" width="40" height="40"></a></td>
  <td><a href="<?php echo "eliminarcontac.php?id=" .$result->id?>"><img src="../../assets/image/fotos/iconoeliminar.png" width="40" height="40"></a></td>
  </tr>
  
<?php } ?>
                  </tbody>
              </table>
        </div>
    </main>
    <script src="../../js/main.js" type="module"></script>
    <script src="../../js/modulos/materialize.js"></script>
    <script src="../../js/sin_modulos.js" nomodule></script>
</body>
</html>

