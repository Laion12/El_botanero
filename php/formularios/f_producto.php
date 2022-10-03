<?php
    require_once '../main.php';
    if(isset($_POST['submit'])){
        $name =limpiar($_POST['nombre']);
        $cat =limpiar($_POST['categoria']);
        $description =limpiar($_POST['desc']);
        $stock=$_REQUEST['stock'];
        if($cat=="" || $name=="" || $description==""){
            echo "Uno o varios campos vacios";
            exit();
        }
        if(verificar_d("[A-Za-zÑñ\s]{0,40}",$name)){
            echo "El nombre no cumple con el formato solicitado";
            exit();
        }
        if(verificar_d("[A-Za-zÑñ\s]{0,40}",$cat)){
            echo "La categoria no cumple con el formato solicitado";
            exit();
        }
        if(verificar_d("[A-Za-zÑñ\s]{6,60}",$description)){
            echo "La descripcion no cumple con el formato solicitado";
            exit();
        }
        if($stock=="Si"){
            $stock=1;
        }else{
            $stock=0;
        }
        $imagens=getimagesize($_FILES["imagen"]["tmp_name"]);
        if($imagens!=false){
            $extension=strtolower(pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION));
            if($extension=="webp" || $extension=="jpeg" || $extension=="jpg" || $extension=="png"){
                $size=$_FILES["imagen"]["size"];
                if($size<2000000){
                    $direccion="assets/image/catalogo/";
                    $cambio=renombrar_foto($_FILES["imagen"]["name"]);
                    $archivo=$direccion.basename($cambio);
                    if(move_uploaded_file($_FILES["imagen"]["tmp_name"],"../../".$archivo)){
                        $save=conectar();
                        $save=$save->prepare("INSERT INTO producto (nombre,categoria,direc,stock,descripcion,id_admin) VALUES (:nom,:cate,:dir,:stock,:descrip,:adm)");
                        $marcador=[
                            ":nom"=>$name,
                            ":cate"=>$cat,
                            ":dir"=>$archivo,
                            ":stock"=>$stock,
                            ":descrip"=>$description,
                            ":adm"=>$_SESSION['id_u']
                        ];
                        $save->execute($marcador);
                        $save=null;
                        echo "<script> alert('Producto agregado'); </script>";
                        echo "<script> setTimeout(function () {
                            // Redirigir con JavaScript
                            window.location.href= '../vistas/add_producto.php';
                        }, 2000);</script>";
                    }else{
                        echo "Error al subir la imagen";
                    }
                }else{
                    echo "La imagen es mayor a 2MB";
                }
            }else{
                echo "La imagen no es de tipo webp,jpg o png";
            }
        }else{
            echo "El archivo no es una imagen";
        }
    }else{
        echo "Error al guardar el producto";
    }
?>