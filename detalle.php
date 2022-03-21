<?php

require('controladores/funciones.php');
$id = intval($_GET['id']);


$bd = conexion('localhost', 'listaproducto', 'root', '');
$productos = buscar($bd, 'productos', $id)



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
        <h1 class="text-center bg-info text-white p-3">Listado de Precio por Productos</h1>
        <!-- las cartas de productos -->

        <section class="row">
            <article class="col-12">
                <div class="card">
                    <img src="imagenes/<?= $productos['imagen'] ?>" class="card-img-top w-50 m-auto" alt="Perrita">
                    <div class="card-body text-center">
                        <h5 class="card-title fs-1  fw-bold" ><?= $productos['nombre'] ?></h5>
                        <p class="card-text"><?= $productos['descripcion'] ?></p>
                        <p class="card-text  fs-3  fw-bold" > CANTIDAD : <?= $productos['cantidad'] ?></p>
                        <p class="card-text fs-3  fw-bold" > PRECIO : $<?= $productos['precio'] ?></p>

                        <a href="actualizar.php?id=<?= $productos['id'] ?>" class="btn btn-success">Actualizar</a>
                        <a href="index.php" class="btn btn-danger">Volver</a>
                    </div>
                </div>
            </article>
        </section>


        <!-- Botstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>