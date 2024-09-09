<?php
include "../conexion.php";
session_start();

if (isset($_POST['btn_edit'])) {
    $id_user = $_POST['id_user'];
    $numdoc = $_POST['document_number'];
    $names = $_POST['names'];
    $apes = $_POST['apes'];
    $foto = $_FILES['photo'];
    $directorio_destino = "../imagen-user/";
    $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $nombre_archivo = $numdoc . "." . $extension;
    $ubicacion_temporal = $foto['tmp_name'];
    $ruta_destino = $directorio_destino . $nombre_archivo;

    $es_imagen = getimagesize($ubicacion_temporal);

    if ($es_imagen !== false) {
        if (move_uploaded_file($ubicacion_temporal, $ruta_destino)) {
            
        } else {
            echo "<script>alert('No se pudo cargar la imagen');</script>";
        }
    } else {
        echo "<script>alert('El archivo subido no es una imagen');</script>";
    }

    $update = "UPDATE usuario SET numero_documento = '$numdoc', nombres = '$names', apellidos = '$apes'";
    if ($ruta_destino) {
        $update .= ", foto_perfil = '$ruta_destino'";
    }
    $update .= " WHERE id_user = '$id_user'";
    

    if (mysqli_query($con, $update)) {
        echo "<script>alert('Registro Exitoso');</script>";
        echo "<script>window.location='admin.php?mod=gestion';</script>";
    } else {
        echo "Error en la consulta mysql" ;
    }
}
if (isset($_POST['btn_delete'])) {
    $dato = $_POST['dato_eliminar'];
    $delete = "DELETE FROM usuario WHERE numero_documento = '$dato'";

    if (mysqli_query($con, $delete)) {
        echo "<script>alert('Eliminación exitosa');</script>";
        echo "<script>window.location='admin.php?mod=gestion';</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Gestion</title>
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
</head>

<body>
    <div class="container text-center bigtable">
        <section class="buscar">
            <form method="post">
                <input type="txt_bucar" placeholder="Busque por documento">
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
            </thead>
            <tbody>
                <?php
                
                $result = mysqli_query($con, "SELECT * FROM usuario") or die("Error en la consulta");

                while ($fila = mysqli_fetch_array($result)) {
                    $id = $fila['id_user'];
                ?>
                <tr>
                    <td scope="row"><?php echo($fila['tipo_documento']); ?></td>
                    <td><?php echo ($fila['numero_documento']); ?></td>
                    <td><?php echo ($fila['nombres']); ?></td>
                    <td><?php echo ($fila['apellidos']); ?></td>
                    <td><?php echo ($fila['email']); ?></td>
                    <td><img src="<?php echo $fila['foto_perfil']; ?>" alt="imagen_usuario" width="50px" height="50px"
                            class="rounded-circle"></td>
                    <td>
                        <button class="bi bi-trash-fill" type="button" data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?php echo $id; ?>">Eliminar</button>
                    </td>
                    <td><i type="button" class="bi bi-pencil-square" data-bs-toggle="modal"
                            data-bs-target="#editModal<?php echo $id; ?>">Editar</i></td>
                </tr>

                <div class="modal fade" id="deleteModal<?php echo $id; ?>" tabindex="-1"
                    aria-labelledby="deleteModalLabel<?php echo $id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="deleteModalLabel<?php echo $id; ?>">Eliminar
                                    usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="admin.php?mod=gestion">
                                    <input type="hidden" name="dato_eliminar"
                                        value="<?php echo($fila['numero_documento']); ?>">
                                    <p>¿Está seguro de que desea eliminar este usuario?</p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger" name="btn_delete">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal<?php echo $id; ?>" tabindex="-1"
                    aria-labelledby="editModalLabel<?php echo $id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="editModalLabel<?php echo $id; ?>">Actualizar
                                    datos del usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="admin.php?mod=gestion" enctype="multipart/form-data">
                                    <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                                    <div class="mb-3">
                                        <label for="documentType<?php echo $id; ?>" class="form-label">Tipo de
                                            documento</label>
                                        <input type="text" class="form-control" id="documentType<?php echo $id; ?>"
                                            name="document_type" value="<?php echo ($fila['tipo_documento']); ?>"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="documentNumber<?php echo $id; ?>" class="form-label">Número de
                                            documento</label>
                                        <input type="text" class="form-control" id="documentNumber<?php echo $id; ?>"
                                            name="document_number" readonly
                                            value="<?php echo ($fila['numero_documento']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="names<?php echo $id; ?>" class="form-label">Nombres</label>
                                        <input type="text" class="form-control" id="names<?php echo $id; ?>"
                                            name="names" value="<?php echo ($fila['nombres']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="surnames<?php echo $id; ?>" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="surnames<?php echo $id; ?>"
                                            name="apes" value="<?php echo ($fila['apellidos']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo<?php echo $id; ?>" class="form-label">Foto</label>
                                        <img src="../<?php echo($fila['foto_perfil']); ?>" alt="modificar imagen"
                                            width="50px" height="50px" class="rounded-circle">
                                        <input type="file" class="form-control" id="photo<?php echo $id; ?>"
                                            name="photo">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="btn_edit">Guardar
                                            cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7ZWcsy"
        crossorigin="anonymous"></script>
</body>

</html>