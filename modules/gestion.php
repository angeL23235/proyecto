<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Gestion</title>
</head>

<style>
body {
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-size: 16px;
    background-color: #EBEBEB;

}

.bigtable {
    margin-top: 200px;
    margin-left: 199px;
}
</style>

<body>
    <div class="container text-center bigtable">
        <section class="buscar">
            <form action="" method="post">
                <input type="text" placeholder="Busque por documento">
                <input type="submit" value="Buscar" name="btn_search">
            </form>
        </section>
        <br>

        <table class="table table2">
            <thead>
                <tr>
                    <th scope="col" class="table-dark">Tipo de documento</th>
                    <th scope="col" class="table-dark">Documento</th>
                    <th scope="col" class="table-dark">Nombres</th>
                    <th scope="col" class="table-dark">Apellidos</th>
                    <th scope="col" class="table-dark">Email</th>
                    <th scope="col" class="table-dark">Foto</th>
                    <th scope="col" class="table-dark">Borrar</th>
                    <th scope="col" class="table-dark">Editar</th>
                </tr>
                <?php 
                  include "../conexion.php";
                  $con = mysqli_query($con,"SELECT * FROM usuario") or die ("REVISE PAAA");
                  while ($fila=mysqli_fetch_array($con)){
                  
                ?>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"><?php echo $fila['tipo_documento']; ?></td>
                    <td><?php echo $fila['numero_documento']; ?></td>
                    <td><?php echo $fila['nombres']; ?></td>
                    <td><?php echo $fila['apellidos']; ?></td>
                    <td><?php echo $fila['email']; ?></td>
                    <td><img src="<?php echo $_SESSION['ft'];?>" alt="imagen_usuario" width="50px" height="50px"></td>
                    <td><i class="bi bi-trash3-fill"></i></td>
                    <td><i class="bi bi-pencil-square"></i></td>
                </tr>
                <?php
                  }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>