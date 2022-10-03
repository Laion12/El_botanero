<?php
    include 'session_start.php';
    #Funcion de conexion#
    function conectar(){
        include 'datos.php';
        try{
            $dbh=new PDO("mysql:host=$host;dbname=$dbn",$usuario,$pass);
            return $dbh;
        }catch(PDOException $e){
            die("Error de conexion".$e->getMessage());
        }
    }
    #Funcion de verificacion de datos de campos#
    function verificar_d($filtro,$dato){
        if(preg_match("/^".$filtro."$/",$dato)){
            return false;
        }else{
            return true;
        }
    }
    #Funcion para limpiar campos#
    function limpiar($cadena){
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        $cadena=str_ireplace("<script>","",$cadena);
        $cadena=str_ireplace("</script>","",$cadena);
        $cadena=str_ireplace("<script src","",$cadena);
        $cadena=str_ireplace("<script type=","",$cadena);
        $cadena=str_ireplace("SELECT * FROM","",$cadena);
        $cadena=str_ireplace("DELETE FROM","",$cadena);
        $cadena=str_ireplace("INSERT INTO","",$cadena);
        $cadena=str_ireplace("DROP TABLE","",$cadena);
        $cadena=str_ireplace("DROP DATABASE","",$cadena);
        $cadena=str_ireplace("TRUNCATE TABLE","",$cadena);
        $cadena=str_ireplace("SHOW TABLES","",$cadena);
        $cadena=str_ireplace("SHOW DATABASE","",$cadena);
        $cadena=str_ireplace("<?php","",$cadena);
        $cadena=str_ireplace("?>","",$cadena);
        $cadena=str_ireplace("--","",$cadena);
        $cadena=str_ireplace("^","",$cadena);
        $cadena=str_ireplace("<","",$cadena);
        $cadena=str_ireplace("[","",$cadena);
        $cadena=str_ireplace("]","",$cadena);
        $cadena=str_ireplace("==","",$cadena);
        $cadena=str_ireplace(";","",$cadena);
        $cadena=str_ireplace("::","",$cadena);
        $cadena=str_ireplace("'","",$cadena);
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        return $cadena;
    }
    #Funcion de cambio de nombre fotos#
    function renombrar_foto($dir){
        $dir=str_ireplace(" ","_",$dir);
        $dir=str_ireplace("@","_",$dir);
        $dir=str_ireplace("*","_",$dir);
        $dir=str_ireplace("/","_",$dir);
        $dir=str_ireplace("#","_",$dir);
        $dir=str_ireplace("$","_",$dir);
        $dir=str_ireplace(",","_",$dir);
        $dir=str_ireplace("&","_",$dir);
        $dir=rand(0,100)."_".$dir;
        return $dir;
    }
?>