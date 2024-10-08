<?php
include "../conexion.php";
$numero = $_SESSION['doc'];

// PROCESO DE ACTUALIZACION DATOS CRUD
if (isset($_POST['btn_actualizar'])) {
    $idserv = $_POST['id_serv'];
    $tipo_s = $_POST['cmbserv'];
    $desc_serv = $_POST['desc_serv'];
    $prec = $_POST['precio_servicio'];

    // Proceso de manejo de imagen
    $ft_servicio = $_FILES['foto_servicio'];
    $direc_des = "../img-servs/";
    $extension = pathinfo($ft_servicio['name'], PATHINFO_EXTENSION); 
    $nombre_archivo = $_SESSION['doc'] . "." . $extension;
    $ubicacion_temporal = $ft_servicio['tmp_name']; 
    $ruta_destino = $direc_des . "." . $nombre_archivo; 
    $es_imagen = getimagesize($ubicacion_temporal);

    if ($es_imagen !== false) {
        if (move_uploaded_file($ubicacion_temporal, $ruta_destino)) {
            echo "<script>alert('Imagen subida con éxito');</script>";
        } else {
            echo "<script>alert('Revisa que la imagen sea válida');</script>";
        }
    }

    // Botón de actualización
    $update = "UPDATE serviciosc SET tipo_servs = '$tipo_s', descripcion_servicio = '$desc_serv', 
    precio_servicio = '$prec'";

if ($ruta_destino) {
    $update .= ", ft_servs = '$ruta_destino'"; 
}
$update .= " WHERE id_servicio = '$idserv'";


    if (mysqli_query($con, $update)) { 
        echo "<script>alert('Actualización exitosa');</script>";
        echo "<script>window.location='dashboard.php?mod=cocina';</script>"; 
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

if (isset($_POST['btn_eliminar'])) {
    $delete = $_POST['dato_eliminar'];
    $borrar = mysqli_query($con, "DELETE FROM serviciosc WHERE id_servicio = '$delete' and fk_user = '$numero'");

    if ($borrar) {
        echo "<script>alert('Eliminación exitosa');</script>";
        echo "<script>window.location='dashboard.php?mod=cocina';</script>"; 
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
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

    <div class="tabla_m text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="table-info">Tipo de servicio</th>
                    <th scope="col" class="table-info">Nombre del vendedor</th>
                    <th scope="col" class="table-info">Descripción del servicio</th>
                    <th scope="col" class="table-info">Precio del servicio</th>
                    <th scope="col" class="table-info">Foto del servicio</th>
                    <?php
            if ($_SESSION['rl'] == 2) {
            ?>
                    <th scope="col" class="table-info">Editar</th>
                    <th scope="col" class="table-info">Eliminar</th>
                    <?php
            }
            ?>
                    <?php
            if ($_SESSION['rl'] == 1) {
            ?>
                    <th scope="col" class="table-info">Contactar</th>
                    <?php
            }
            ?>
                </tr>
            </thead>
            <tbody>
                <?php
        if ($_SESSION['rl'] == 2) {
            $result2 = mysqli_query($con, "SELECT * FROM serviciosc WHERE tipo_servs = 'cocina' and fk_user = '$numero'") or die("Error en la consulta de servicio autos");
        } elseif ($_SESSION['rl'] == 1) {
            $result2 = mysqli_query($con, "SELECT * FROM serviciosc WHERE tipo_servs = 'cocina'");
        }

        while ($fila = mysqli_fetch_array($result2)) {
            $id_serv = $fila['id_servicio'];
            ?>
                <tr>
                    <th scope="row"><?php echo $fila['tipo_servs']; ?></th>
                    <td><?php echo $fila['nombre_vendedor'];?></td>
                    <td><?php echo $fila['descripcion_servicio']; ?></td>
                    <td><?php echo $fila['precio_servicio']; ?></td>
                    <td><img src="<?php echo $fila['ft_servs']; ?>" alt="foto de servicio" width="50px" height="50px"
                            class="rounded-circle"></td>
                    <?php if ($_SESSION['rl'] == 2) { ?>
                    <td>
                        <i type="button" class="bi bi-pencil-square btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#edit-Modal-<?php echo $id_serv; ?>"></i>
                    </td>
                    <td><button class="bi bi-trash-fill btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-Modal-<?php echo $id_serv; ?>"></button></td>
                    <?php } ?>
                    <?php if ($_SESSION['rl'] == 1) { ?>
                    <td><button class="bi bi-chat-right-dots-fill btn btn-success"></button></td>
                    <?php } ?>
                </tr>

                <!-- Modal para editar -->
                <div class="modal fade text-center" id="edit-Modal-<?php echo $id_serv; ?>" tabindex="-1"
                    aria-labelledby="editModalLabel-<?php echo $id_serv; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="editModalLabel-<?php echo $id_serv; ?>">Editar
                                    servicio de auto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="dashboard.php?mod=cocina" enctype="multipart/form-data">
                                    <input type="hidden" name="id_serv" value="<?php echo $id_serv; ?>">
                                    <p>
                                        <strong>
                                            ¿Quieres editar este servicio?
                                        </strong>
                                    </p>
                                    <label for="prec<?php echo $id_serv; ?>" class="form-label">Tipo de servicio</label>
                                    <input type="text" name="cmbserv" class="form-control"
                                        id="documentType<?php echo $id_serv; ?>"
                                        value="<?php echo ($fila['tipo_servs']); ?>">
                                    <label for="descripcion<?php echo $id_serv; ?>" class="form-label">Descripción del
                                        servicio</label>
                                    <input type="text" class="form-control" id="descripcion<?php echo $id_serv; ?>"
                                        name="desc_serv" value="<?php echo ($fila['descripcion_servicio']); ?>">
                                    <label for="precio<?php echo $id_serv; ?>" class="form-label">Precio del
                                        servicio</label>
                                    <input type="number" class="form-control" id="precio<?php echo $id_serv; ?>"
                                        name="precio_servicio" value="<?php echo ($fila['precio_servicio']); ?>">
                                    <label for="foto<?php echo $id_serv; ?>" class="form-label">Foto del
                                        servicio</label>
                                    <input type="file" class="form-control" id="foto<?php echo $id_serv; ?>"
                                        name="foto_servicio">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success" name="btn_actualizar">Actualizar
                                            servicios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal eliminar -->
                <div class="modal fade" id="delete-Modal-<?php echo $id_serv; ?>" tabindex="-1"
                    aria-labelledby="deleteModalLabel<?php echo $id_serv; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="deleteModalLabel<?php echo $id_serv; ?>">
                                    Eliminar Servicio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="dashboard.php?mod=cocina">
                                    <input type="hidden" name="dato_eliminar" value="<?php echo($fila['id_servicio']); ?>">
                                    <p>¿Está seguro de que desea eliminar este servicio?</p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger"
                                            name="btn_eliminar">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } // while ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7ZWcsy"
        crossorigin="anonymous"></script>
</body>

</html>