
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>
<style>
body {
    background: #dadada;
    display: flex;
    font-family: "Bebas Neue", sans-serif;
    font-size: 16px;
    background-color: #EBEBEB;
    width: 60%;
}

.contservs {
    margin-left: 400px;
    margin-top: 70px;

}
</style>

<body>
    <div class="container-fluid">
        <div class="contservs container text-center">
            <div class="row justify-content-center">
                <div class="col-md-6 myform">
                    <div class="logo mb-3">
                        <div class="text-center">
                            <h1>Crear Servicio</h1>
                        </div>
                    </div>
                    <form class="formulario" action="../codigoservs.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <select name="cmbservs" class="form-control">
                                <option value="">Servicios</option>
                                <option value="" disabled>Elija el servicio que desea cargar</option>
                                <hr>
                                <option value="Cocina">Cocina</option>
                                <option value="Alquiler autos">alquiler de autos</option>
                                <option value="aseo">aseo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nombre de vendedor</label>
                            <input type="text" name="ns" class="form-control" aria-describedby="emailHelp"
                                placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <label>Descripcion de servicio ofrecido </label>
                            <input type="text" name="desc" class="form-control" aria-describedby="emailHelp"
                                placeholder="Descripcion">
                        </div>
                        <div class="form-group">
                            <label>Email de vendedor</label>
                            <input type="text" name="mail" class="form-control" aria-describedby="emailHelp"
                                placeholder="Correo">
                        </div>
                        <div class="form-group">
                            <label>Precio a pagar por su servicio</label>
                            <input type="number" name="prec" class="form-control" aria-describedby="emailHelp"
                                placeholder="Precio">
                        </div>
                </div>
                <div class="form-group">
                    <br>
                    <label for="foto">Foto del servicio</label>
                    <br>
                    <input type="file" name="foto2" class="form-control-file">
                </div>
                <div>
                    <br>
                    <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm" name="btn_srvs">Crear
                        Servicio</button>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>