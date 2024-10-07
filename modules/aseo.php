<?php
    include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servs cocina</title>
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
                    <th scope="col" class="table-info">Descripcion del servicio</th>
                    <th scope="col" class="table-info">Precio del servicio</th>
                    <th scope="col" class="table-info">Foto del servicio</th>
                    <th scope="col" class="table-info">Editar</th>
                    <th scope="col" class="table-info">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result2 = mysqli_query($con,"SELECT * FROM serviciosc WHERE tipo_servs = 'aseo' ") or die("papu ");
                while($fila = mysqli_fetch_array($result2)){
                    $id = $fila['id_servicio'];
                
            ?>
                <tr>
                    <th scope="row"><?php echo ($fila['tipo_servs']);?> </th>
                    <td><?php echo ($fila['descripcion_servicio']);?></td>
                    <td><?php echo ($fila['precio_servicio']);?></td>
                    <td><img src="<?php echo ($fila['ft_servs']);?>" alt="foto de servicio" width="50px" height="50px"
                            class="rounded-circle"></td>
                    <td><button class="bi bi-pencil-square btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#editar_modal">Editar</button></td>
                    <td><button class="bi bi-trash-fill btn btn-info">Eliminar</button></td>
                </tr>
            </tbody>

            <!-- Modal -->
            <div class="modal fade" id="editar_modal" tabindex="-1" aria-labelledby="estoesModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="estoesModal">Editar servicio de aseo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="dashboard.php?mod=aseo" enctype="multipart/form-data">
                                <p>¿Quieres editar este servicio?</p>
                                <div class="mb-3">
                                    <label for="<?php echo $id_ase; ?>" class="form-label">Tipo de
                                        servicio</label>
                                    <input type="text" class="form-control" id="ServiceType<?php echo $id_ase; ?>"
                                        name="servs" value="<?php echo ($fila['tipo_servs']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="documentType<?php echo $id; ?>" class="form-label">
                                        Descripcion de servicio</label>
                                    <input type="text" class="form-control" id="documentType<?php echo $id_ase; ?>"
                                        name="document_type" value="<?php echo ($fila['descripcion_servicio']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="documentType<?php echo $id; ?>" class="form-label">
                                        Precio del servicio</label>
                                    <input type="number" class="form-control" id="documentType<?php echo $id_ase; ?>"
                                        name="document_type" value="<?php echo ($fila['precio_servicio']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="documentType<?php echo $id; ?>" class="form-label">
                                        Foto del servicio</label>
                                    <input type="file" class="form-control" id="documentType<?php echo $id_ase; ?>"
                                        name="document_type" value="<?php echo ($fila['ft_servs']); ?>">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" name="btn_update">Actualizar servicio</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </table>
    </div>
</body>

</html>