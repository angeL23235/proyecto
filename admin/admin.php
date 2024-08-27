<?php
include "../conexion.php";
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../js/login.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<style>
.name {
    margin-left: 82%;
}

body {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-size: 16px;
        }
        
</style>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">Traslapp</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <div class="container">
            <!-- Navbar-->
            <span class="name" style="color:white; margin-right:20px;">
              Hola Admin: <?php echo $_SESSION['pn'], " ", $_SESSION['ape']; ?>
            </span>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle" width="50px" height="50px" src="<?php echo $_SESSION['ft']; ?>">
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                        <li><a class="dropdown-item" href="#!">Estado</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="../exit.php">
                                Salir
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </div>
    </nav>
    <?php
     if (@$_GET['mod'] == "") {
        require_once("admin.php");
    } else
            if (@$_GET['mod'] == "crear") {
        require_once("../modules/crear.php");
    } else
            if (@$_GET['mod'] == "gestion") {
        require_once("../modules/gestion.php");
    }
?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Incio</div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interfas</div>
                        <a class="nav-link" aria-current="page" href="admin.php?mod=crear">
                        <div class="sb-nav-link-icon"><i class="bi bi-building-gear"></i>
                           Create
                        </a>
                        <a class="nav-link" aria-current="page" href="admin.php?mod=gestion">
                        <div class="sb-nav-link-icon"><i class="bi bi-building-gear"></i>
                           Gestion
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
            </nav>
            <div class="container-fluid row">
                <div id="CRUD">

                </div>
                
            </div>
        </div>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>