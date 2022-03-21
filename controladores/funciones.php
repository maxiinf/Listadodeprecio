<?php

function conexion($host, $dbname, $usuario, $password)
{
    try {
        $dsn =  "mysql:host=$host;dbname=$dbname";
        $bd = new PDO($dsn, $usuario, $password);

        return $bd;
    } catch (PDOException $error) {
        echo "<h2 style='color:white; text-align:center; background-color:tomato;padding:20px'> Upps ! Ocurrio un error" . $error->getMessage() . "</h2>";
        exit;
    }
}


function listar($bd, $tabla)
{

    //1.Armar la consulta
    $sql = "select * from $tabla";
    //2.Preparar la consulta
    $query = $bd->prepare($sql);
    //3.Ejecutar la consulta
    $query->execute();
    //4. Traer los datos de la consulta
    $resultados = $query->fetchall(PDO::FETCH_ASSOC);

    return $resultados;
}


//Buscar por email al usuario que esta ingresando
function buscar($bd, $tabla, $dato)
{

    //1.Armar la consulta
    if ($_POST){
        $sql = "select * from $tabla where email = '$dato'";
    } else{
        $sql = "select * from $tabla where id = $dato";
    }
    
    //2.Preparar la consulta
    $query = $bd->prepare($sql);
    //3.Ejecutar la consulta
    $query->execute();
    //4. Traer los datos de la consulta
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    return $resultado;
}

function validarProducto($datos, $imagen)
{
    $errores = [];
    if (trim($datos['nombre']) === '') {
        $errores['nombre']  = "El campo nombre no puede estar vacio";
    }
    if (trim($datos['cantidad'])==='') {
        $errores['cantidad']  = "El campo cantidad no puede estar vacio";
    }
    if (trim($datos['descripcion']) === '') {
        $errores['descripcion']  = "El campo descripcion no puede estar vacio";
    }
    
    if (trim($datos['precio'])==='') {
        $errores['precio']  = "El campo precio no puede estar vacio";
    }
   


    //Validar la imagen - avatar
    if (isset($imagen)) {
        $imagen = $imagen['imagen']['name'];
        $ext = pathinfo($imagen, PATHINFO_EXTENSION);
        if ($imagen['imagen']['error'] != 0) {
            $errores['imagen'] = "Debe subir una imagen";
        } elseif ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
            $errores['imagen'] = "Debe seleccionar un archivo JPG, PGN  O  JPEG";
        }
    }

    return $errores;
}

//Funcion para armar imagen 
function armarImagen($imagen)
{
    //dd($imagen);
    $foto = $imagen['foto']['name'];
    $ext = pathinfo($imagen, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['foto']['tmp_name'];
    $archivoDestino = dirname(__DIR__) . "/imagenes/";
    $foto = uniqid('foto-') . '.' . $ext;
    $archivoDestino = $archivoDestino . $foto;
    //voy a guardar el archivo a la carpeta 
    move_uploaded_file($archivoOrigen, $archivoDestino);
    return $foto;
}
//Crear función para guardar los datos en la Base de Datos
function guardarProducto($bd, $tabla, $datos, $imagen)
{
    //1.- Organizar los datos a guardar
    $nombre = $datos['nombre'];
    $cantidad = $datos['cantidad'];
    $descripcion = $datos['descripcion'];
    $precio = $datos['precio'];
    $imagen = $imagen;
    //2.- Armar la consulta
    //                            Nombres de los campos en la tabla
    $sql = "insert into $tabla (nombre,cantidad,descripcion,precio,imagen) values (:nombre,:cantidad,:descripcion,:precio,:imagen)";
    //3.- Preparar la consulta
    $query = $bd->prepare($sql);
    //4.- Continuo con la preparación de la consulta de manera blindada
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':cantidad', $cantidad);
    $query->bindValue(':descripcion', $descripcion);
    $query->bindValue(':precio', $precio);
    $query->bindValue(':imagen', $imagen);
    //5.- Ejecutar la consulta
    $query->execute();
}