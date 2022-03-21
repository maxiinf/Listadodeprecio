<?php
require_once('helpers/dd.php');
require('controladores/funciones.php');

if ($_POST) {
    //dd($_POST);
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $errores = [];
    //dd($_POST);
    //Debo hacer una validación
    $errores = validarProducto($_POST, $_FILES);
    //dd($errores);
    if (count($errores) === 0) {

        $bd = conexion('localhost', 'listaproducto', 'root', '');
        //dd($bd);
        $imagen = armarImagen($_FILES);



        //Guardar al usuario que se está registrando
        guardarProducto($bd, 'libreria', $_POST, $imagen);


        //Envio al usuario a donde yo desee
        header("location: index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Botstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Listado de Precio</title>
</head>

<body>
    <div class="container-fluid">

        <?php require('partials/navegacion.php'); ?>


        <!-- Titulo -->
        <h1 class="text-center bg-info text-white p-3">Agregar Un Producto De Libreria</h1>

        <?php if (isset($errores)) : ?>
            <ul class="text-center alert alert-danger">

                <?php foreach ($errores as $error) : ?>
                    <li><?= $error; ?></li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ""; ?>" />
            </div>
            <div class="col-md-6">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?= isset($_POST['cantidad']) ? $_POST['cantidad'] : ""; ?>" />
            </div>
            <div class="col-12">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Aqui describir producto" value="<?= isset($_POST['descripcion']) ? $_POST['descripcion'] : ""; ?>" />
            </div>
            <div class="col-12">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio Decimal $" value="<?= isset($_POST['precio']) ? $_POST['precio'] : ""; ?>" />
            </div>

            

            <div class="form-group">
                <input class="form-control" type="file" name="imagen">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">AGREGAR PRODUCTO</button>
            </div>
        </form>

    </div>

    <!-- Botstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>