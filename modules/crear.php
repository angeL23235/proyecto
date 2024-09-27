
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Crear</title>
</head>

<body>
<style>
body {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-size: 16px;
            background-color:#EBEBEB;
        }

    </style>
    <section class="container encabezado text-center">
        <header>
            <div class="row">
                <div class="col-12 col-md-4">
                    <img class="foto_traslapp rounded-circle" width="120px" height="100px" src="img/traslapp.png" alt="imagen traslapp">
                </div>
                <div class="titulo col-12 col-md-4">
                    <h1 style="color: white;">Traslapp</h1>
                </div>
            </div>
        </header>
    </section>

    <div class="contenedor-register container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6 myform">
                <div class="logo mb-3">
                    <div class="text-center">
                        <h1>Crear</h1>
                    </div>
                </div>
                <form class="formulario" action="../codigocreate.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="cmbident2" id="" class="form-control">
                            <option value="">Elija documento</option>
                            <option value="RC">Registro civil</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="CC">Cedula de ciudadania</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="num">Numero de documento</label>
                        <input type="text" name="doc1" class="form-control" id="num" aria-describedby="emailHelp" placeholder="Numero de Documento">
                    </div>

                    <div class="form-group">
                        <label for="primer">Nombres</label>
                        <input type="text" name="pnn" class="form-control" id="primer" aria-describedby="emailHelp" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="ape">Apellidos</label>
                        <input type="text" name="ape1" class="form-control" id="ape" aria-describedby="emailHelp" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <select name="cmb2" id="rol" class="form-control">
                            <option value="" disabled>Rol</option>
                            <option value="1">Cliente</option>
                            <option value="2">Vendedor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto de perfil</label>
                        <input type="file" name="foto2" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass2" id="pass" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <label for="pass11">Confirmar contraseña</label>
                        <input type="password" name="pass3" id="pass11" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                    </div>
                    <div class="form-group"></div>
                    <a class="nav-link" href="admin.php?mod=crear">
                    <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm" name="btn_create" >Crear</button>
                    </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (@$_GET['mod'] == "") {
        require_once("../modules/inicio.php");
    } else
            if (@$_GET['mod'] == "inicio") {
        require_once("../modules/inicio.php");
    } else
            if (@$_GET['mod'] == "navegacion") {
        require_once("../modules/navegacion.php");
    } else
            if (@$_GET['mod'] == "mediotrans") {
        require_once("../modules/mediotrans.php");
    } else
            if (@$_GET['mod'] == "restaurantes") {
        require_once("../modules/resta.php");
    } else
            if (@$_GET['mod'] == "hoteles") {
        require_once("../modules/hoteles.php");
    } else
            if (@$_GET['mod'] == "alquiler-autos") {
        require_once("../modules/alquileraut.php");
    } else
            if (@$_GET['mod'] == "aseo") {
        require_once("../modules/servsv.php");
    } else
            if (@$_GET['mod'] == "cocina") {
        require_once("../modules/servscos.php");
    } else
            if (@$_GET['mod'] == "crear") {
        require_once("../modules/crear.php");
    } else
            if (@$_GET['mod'] == "gestion") {
        require_once("../modules/gestion.php");
    } else
            if (@$_GET['mod'] == "admin") {
        require_once("../admin/admin.php");
    }

?>

</body>

</html>

</body>
</html>