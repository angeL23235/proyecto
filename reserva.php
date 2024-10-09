<?php
include "../conexion.php";
$numero = $_SESSION['doc'];

// Realizar la consulta para obtener reservas
$query = "SELECT * FROM reserva_hoteles WHERE fk_usuario_ = '$numero'";
$result2 = mysqli_query($con, $query);

if (!$result2) {
    die("Error en la consulta: " . mysqli_error($con));
}

// PROCESO DE ACTUALIZACION DATOS CRUD
if (isset($_POST['btn_actualizar'])) {
    $id_hotel = $_POST['id_hotel'];
    $n_h = $_POST['n_h'];
    $valor = $_POST['vl'];
    $tipo_h = $_POST['t_h'];
    $fecha = $_POST['date'];

    // Botón de actualización
    $update = "UPDATE reserva_hoteles SET nombre_hotel = '$n_h', valor_reserva = '$valor', 
    tipo_habitacion = '$tipo_h', fecha_reserva = '$fecha' WHERE id_hotel = '$id_hotel'";

    if (mysqli_query($con, $update)) {
        echo "<script>alert('Actualización exitosa');</script>";
        echo "<script>window.location='dashboard.php?mod=reserva';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// PROCESO DE ELIMINACIÓN
if (isset($_POST['btn_eliminar'])) {
    $delete = $_POST['dato_eliminar'];
    $borrar = mysqli_query($con, "DELETE FROM reserva_hoteles WHERE id_hotel = '$delete' AND fk_usuario_ = '$numero'");

    if ($borrar) {
        echo "<script>alert('Eliminación exitosa');</script>";
        echo "<script>window.location='dashboard.php?mod=reserva';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// PROCESO DE ADICIÓN DE NUEVO REGISTRO
if (isset($_POST['btn_agregar'])) {
    $id_hotel = $_POST['id_hotel']; // Se toma el id_hotel de la entrada
    $n_h = $_POST['n_h'];
    $valor = $_POST['vl'];
    $tipo_h = $_POST['t_h'];
    $fecha = $_POST['date'];
    $fk_usuario = $_POST['fk_usuario_'];

    // Inserción de nuevo registro
    $insert = "INSERT INTO reserva_hoteles (id_hotel, nombre_hotel, valor_reserva, tipo_habitacion, fecha_reserva, fk_usuario_)
               VALUES ('$id_hotel', '$n_h', '$valor', '$tipo_h', '$fecha', '$fk_usuario')";

    if (mysqli_query($con, $insert)) {
        echo "<script>alert('Registro añadido exitosamente');</script>";
        echo "<script>window.location='dashboard.php?mod=reserva';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios cocina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #EBEBEB;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-size: 16px;
}
</style>
<body>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número reserva</th>
                <th scope="col">Nombre del hotel</th>
                <th scope="col">Precio</th>
                <th scope="col">Tipo de habitación</th>
                <th scope="col">Fecha de reserva</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_array($result2)) {
                $id_hotel = $fila['id_hotel'];
                ?>
                <tr>
                    <th scope="row"><?php echo $fila['id_hotel']; ?></th>
                    <td><?php echo $fila['nombre_hotel']; ?></td>
                    <td><?php echo $fila['valor_reserva']; ?></td>
                    <td><?php echo $fila['tipo_habitacion']; ?></td>
                    <td><?php echo $fila['fecha_reserva']; ?></td>
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-Modal-<?php echo $id_hotel; ?>">
                            Editar
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-Modal-<?php echo $id_hotel; ?>">
                            Eliminar
                        </button>
                    </td>
                </tr>
                <?php
                // Modal para editar
                ?>
                <div class="modal fade" id="edit-Modal-<?php echo $id_hotel; ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo $id_hotel; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar servicio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="dashboard.php?mod=reserva">
                                    <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">
                                    <div class="mb-3">
                                        <label for="nombre_hotel<?php echo $id_hotel; ?>" class="form-label">Nombre del hotel</label>
                                        <input type="text" name="n_h" class="form-control" id="nombre_hotel<?php echo $id_hotel; ?>" value="<?php echo $fila['nombre_hotel']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor_reserva<?php echo $id_hotel; ?>" class="form-label">Valor de la reserva</label>
                                        <input type="text" class="form-control" id="valor_reserva<?php echo $id_hotel; ?>" name="vl" value="<?php echo $fila['valor_reserva']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipo_habitacion<?php echo $id_hotel; ?>" class="form-label">Tipo de habitación</label>
                                        <input type="text" class="form-control" id="tipo_habitacion<?php echo $id_hotel; ?>" name="t_h" value="<?php echo $fila['tipo_habitacion']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fecha_reserva<?php echo $id_hotel; ?>" class="form-label">Fecha de reserva</label>
                                        <input type="date" class="form-control" id="fecha_reserva<?php echo $id_hotel; ?>" name="date" value="<?php echo $fila['fecha_reserva']; ?>" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success" name="btn_actualizar">Actualizar servicio</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal eliminar -->
                <div class="modal fade" id="delete-Modal-<?php echo $id_hotel; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $id_hotel; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Eliminar Servicio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="dashboard.php?mod=reserva">
                                    <input type="hidden" name="dato_eliminar" value="<?php echo $id_hotel; ?>">
                                    <p>¿Está seguro de que desea eliminar este servicio?</p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger" name="btn_eliminar">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>

    
    <button class="btn btn" data-bs-toggle="modal" data-bs-target="#add-Modal">
        <img src="../img/subir.png" height="80px">
    </button>

    <!-- Modal para añadir -->
    <div class="modal fade" id="add-Modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Añadir nuevo servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="dashboard.php?mod=reserva">
                        <input type="hidden" name="fk_usuario_" value="<?php echo $numero; ?>">
                        <div class="mb-3">
                            <label for="id_hotel_new" class="form-label">Número de reserva</label>
                            <input type="text" name="id_hotel" class="form-control" id="id_hotel_new" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_hotel_new" class="form-label">Nombre del hotel</label>
                            <input type="text" name="n_h" class="form-control" id="nombre_hotel_new" required>
                        </div>
                        <div class="mb-3">
                            <label for="valor_reserva_new" class="form-label">Valor de la reserva</label>
                            <input type="text" class="form-control" id="valor_reserva_new" name="vl" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_habitacion_new" class="form-label">Tipo de habitación</label>
                            <input type="text" class="form-control" id="tipo_habitacion_new" name="t_h" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_reserva_new" class="form-label">Fecha de reserva</label>
                            <input type="date" class="form-control" id="fecha_reserva_new" name="date" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" name="btn_agregar">Añadir reserva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7ZWcsy" crossorigin="anonymous"></script>
</body>
</html>
