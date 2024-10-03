<?php
    include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios cocina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #dadada;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-size: 16px;
    background-color: #EBEBEB;
}
</style>

<body>
    <div class="tabla_m">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="table-info">Tipo de servicio</th>
                    <th scope="col" class="table-info">Descripción del servicio</th>
                    <th scope="col" class="table-info">Precio del servicio</th>
                    <th scope="col" class="table-info">Foto del servicio</th>
                    <th scope="col" class="table-info">Editar</th>
                    <th scope="col" class="table-info">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result2 = mysqli_query($con, "SELECT * FROM serviciosc WHERE tipo_servs = 'alquiler_au'") or die("Error en la consulta de servicio autos");
                while ($fila = mysqli_fetch_array($result2)) {
                    $id_serv = $fila['id_servicio'];
                ?>
                <tr>
                    <th scope="row"><?php echo $fila['tipo_servs']; ?></th>
                    <td><?php echo $fila['descripcion_servicio']; ?></td>
                    <td><?php echo $fila['precio_servicio']; ?></td>
                    <td><img src="<?php echo $fila['ft_servs']; ?>" alt="foto de servicio" width="50px" height="50px"
                            class="rounded-circle"></td>
                    <td>
                        <i type="button" class="bi bi-pencil-square btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#edit-Modal-<?php echo $id_serv; ?>">Editar</i>
                    </td>
                    <td><button class="bi bi-trash-fill btn btn-info">Eliminar</button></td>
                </tr>

                <!-- Modal para editar -->
                <div class="modal fade" id="edit-Modal-<?php echo $id_serv; ?>" tabindex="-1"
                    aria-labelledby="editModalLabel-<?php echo $id_serv; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="editModalLabel-<?php echo $id_serv; ?>">Editar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="admin.php?mod=autos.php" enctype="multipart/form-data">
                                    <input type="hidden" name="id_serv" value="<?php echo $fila['tipo_servs']; ?>">
                                    <p>¿Está seguro de que desea eliminar este usuario?</p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger" name="btn_delete">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7ZWcsy"
    crossorigin="anonymous"></script>
</body>

</html>