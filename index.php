<?php

require('controladores/funciones.php');

$bd = conexion('localhost', 'listaproducto', 'root', '');
$productos = listar($bd, 'productos');


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
        <h1 class="text-center bg-info text-white p-3">Listado de Precio por Productos De Sublimacion</h1>
        <!-- las cartas de productos -->
        <section class="row">
            <?php foreach ($productos as $key => $productos) : ?>



                <article class="col-12 col-mf-6 col-lg-3">
                    <div class="card">
                        <img src="imagenes/<?= $productos['imagen'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-3 fw-bolder"><?= $productos['nombre'] ?></h5>
                            <p class="card-text fs-5"><?= $productos['descripcion'] ?></p>
                            <p class="card-text fs-4 "> CANTIDAD : <?= $productos['cantidad'] ?></p>
                            <p class="card-text fs-4 "> PRECIO : $<?= $productos['precio'] ?></p>
                            <a href="detalle.php?id=<?= $productos['id'] ?>" class="btn btn-primary"> VER DETALLES</a>
                            <a href="./editar.php?id=<?= $valor['id']; ?>" class="btn btn-success">editar</a> -
                            <a href="./borrar.php?id=<?= $valor['id']; ?>"class="btn btn-danger">borrar</a>

                        </div>
                    </div>
                </article>

            <?php endforeach ?>

        </section>




    </div>

    <!-- Botstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>