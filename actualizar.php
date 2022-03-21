<?php
require_once('helpers/dd.php');
require('controladores/funciones.php');
$id = intval($_GET['id']);


$bd = conexion('localhost', 'listaproducto', 'root', '');
$productos = buscar($bd, 'productos', $id);

if ($_POST) {
    //dd($_POST);
  //  $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
 //   $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    //dd($_POST);
    //Debo hacer una validación
  //  $errores = validarProducto($_POST, $_FILES);
    //dd($errores);
   

      //  $bd = conexion('localhost', 'listaproducto', 'root', '');
        //dd($bd);
    $_UPDATE_SQL ="UPDATE $productos set cantidad=$cantidad, precio=$precio";
    $query = $bd->prepare($_UPDATE_SQL);
    $query->execute();

        //Envio al usuario a donde yo desee
        header("location: index.php");
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
        <h1 class="text-center bg-info text-white p-3">Actualizar el Precio</h1>

        <?php if (isset($errores)) : ?>
            <ul class="text-center alert alert-danger">

                <?php foreach ($errores as $error) : ?>
                    <li><?= $error; ?></li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            <
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?= isset($_POST['cantidad']) ? $_POST['cantidad'] : ""; ?>" />
            </div>
            <div class="col-12">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio Decimal $" value="<?= isset($_POST['precio']) ? $_POST['precio'] : ""; ?>" />
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
            <div class="col-12">
                <button type="index.php" class="btn btn-danger">Cancelar</button>
            </div>
            
        </form>

    </div>

    <!-- Botstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>