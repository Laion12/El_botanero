<?php
    include "datos.php";
    try{
        $dbh=new PDO("mysql:host=$host;dbname=$dbn",$usuario,$pass);
        echo "Conexion exitosa";
    }catch(PDOException $e){
        die("Error al conectar".$e->getMessage());
    }finally{
        $dbh=null;
    }


?>