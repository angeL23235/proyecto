<?php
if (isset($_POST['btn_ing'])) {
    include "conexion.php";
    session_start();
    $doc = $_POST['doc'];
    $pass = $_POST['pass'];
    $encrip = md5($pass);

    $consulta = mysqli_query($con, "SELECT * FROM usuario WHERE numero_documento=$doc AND clave='$encrip';") or die($con . "Error en la consulta");
    $resultado = mysqli_num_rows($consulta);

    if ($resultado == 1) {
        while ($fila = mysqli_fetch_array($consulta)) {
            $_SESSION['doc'] = $fila['numero_documento'];
            $_SESSION['pn'] = $fila['nombres'];
            $_SESSION['ape'] = $fila['apellidos'];
            $_SESSION['ft'] = $fila['foto_perfil'];
            $_SESSION['rl'] = $fila['id_rol'];
            echo "<script>window.location=('dashboard.php');</script>";
        }
    } else {
        echo "<center><font color='red'>Los datos de usuario se encuentran</font></center>";
        echo "<script>alert('revisa los datos ingresados')</script>";
    }
}
?> 
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
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="num">Numero de documento</label>
                        <input type="text" name="doc" class="form-control" id="num" aria-describedby="emailHelp" placeholder="Numero de Documento">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" id="pass" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                    </div>
                    <div class="col-md-12 text-center mb-3">
                        <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm" name="btn_ing">Ingresa</button>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <p class="text-center">¿Aún no tienes cuenta?<br><a href="register.php">Ingresa aqui</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
