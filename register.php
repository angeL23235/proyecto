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
    <link rel="stylesheet" href="css/register.css">
    <title>Registro</title>
    
</head>

<body>
<style>
body {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-size: 16px;
            background-color:grey;
        }

        .titulo h1 {
            font-family: "Bebas Neue", sans-serif;
            font-size: 36px;
            font-weight: 700;
            margin-top: 20px;
        }

        .myform h1 {
            font-family: "Bebas Neue", sans-serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .foto_traslapp{
            background-color:aliceblue;
            border-color:aliceblue;
            border-style:inset;
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
                        <h1>Registrarse</h1>
                    </div>
                </div>
                <form class="formulario" action="codigoregistrar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="cmbident" id="" class="form-control">
                            <option value="">Elija documento</option>
                            <option value="RC">Registro civil</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="CC">Cedula de ciudadania</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="num">Numero de documento</label>
                        <input type="text" name="doc" class="form-control" id="num" aria-describedby="emailHelp" placeholder="Numero de Documento">
                    </div>

                    <div class="form-group">
                        <label for="primer">Nombres</label>
                        <input type="text" name="pn2" class="form-control" id="primer" aria-describedby="emailHelp" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="ape">Apellidos</label>
                        <input type="text" name="ape1" class="form-control" id="ape" aria-describedby="emailHelp" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email2" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <select name="cmb1" id="rol" class="form-control">
                            <option value="" disabled>Rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                            <option value="3">Cliente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto de perfil</label>
                        <input type="file" name="foto" class="form-control-file" id="foto">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass2" id="pass" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <label for="pass11">Confirmar contraseña</label>
                        <input type="password" name="passc" id="pass11" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                    </div>

                    <div class="col-md-12 text-center mb-3">
                        <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm" name="btn_registrar">Registrate</button>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <p class="text-center">¿Ya tienes cuenta?<br><a href="index.php">Ingresa aqui</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
