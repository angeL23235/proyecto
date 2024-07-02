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
        echo "<center><font color='red'>Los datos de usuario no coinciden</font></center>";
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
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
       <!-- CSS -->
       <style>
        body {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 400;
            font-size: 16px;
        }

        .encabezado h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.5rem; 
            font-weight: 400;
            color: white; 
        }

        .myform h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem; 
            font-weight: 400; 
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

    <div class="container text-center align-items:center">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Iniciar Sesión</h1>
                            </div>
                        </div>
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="documento">Número de documento</label>
                                <input type="text" name="doc" class="form-control" id="documento" aria-describedby="emailHelp" placeholder="Número de documento">
                            </div>
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input type="password" name="pass" id="clave" class="form-control" aria-describedby="emailHelp" placeholder="Ingrese su clave">
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm" name="btn_ing">Iniciar Sesión</button>
                            </div>
                            <div class="col-md-12 mb-3"></div>
                            <div class="form-group">
                                <p class="text-center">¿No tienes cuenta? <a href="register.php" id="iniciasesion">Regístrate aquí</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
