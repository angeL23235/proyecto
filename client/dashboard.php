<?php
include "../conexion.php";
session_start();
?>
<!DOCTYPE html>
<html lang="es">

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
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-size: 16px;
}
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">Traslapp</a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Busar servicios..."
                    aria-label="Buscar servicios..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>

        <!-- Navbar-->
        <span style="color:white; margin-right:20px;"><?php echo $_SESSION['pn'], " ", $_SESSION['ape']; ?></span>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><img class="rounded-circle" src="<?php echo $_SESSION['ft']; ?>" width="50px"
                        height="50px"></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                    <li><a class="dropdown-item" href="#!">Estado</a></li>
                    <li><a class="dropdown-item" href="dashboard.php?mod=perfil">Perfil</a></li>
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
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Incio</div>
                        <a class="nav-link" href="dashboard.php?mod=inicio">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interfas</div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#deslizante"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot"></i></div>
                            Ubicación
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="deslizante" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dashboard.php?mod=navegacion">Navegacion</a>
                                <a class="nav-link" href="dashboard.php?mod=medio4trans">Medios de transporte
                                    publico</a>
                                <a class="nav-link" href="dashboard.php?mod=restaurantes">Restaurantes</a>
                                <a class="nav-link" href="dashboard.php?mod=hoteles">Hoteles</a>

                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Servicios
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <a class="nav-link" href="dashboard.php?mod=servicios">Explorar servicios</a>
                                <?php
                            if ($_SESSION['rl']== 2 ){
                                "<script>window.location='';</script>";
                            ?>
                                <a class="nav-link" href="dashboard.php?mod=subs">Cargar servicios</a>
                                <?php
                            }
                            ?>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logueado en :</div>
                    Traslapp
                </div>
            </nav>
        </div>
        <!-- Algoritmo de modulacion -->
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
            if (@$_GET['mod'] == "servicios") {
        require_once("../modules/servs.php");
    } else
            if (@$_GET['mod'] == "crear_usuario") {
        require_once("../modules/crear.php");
    } else
            if (@$_GET['mod'] == "gestion") {
        require_once("../modules/gestion.php");
    } else
            if (@$_GET['mod'] == "admin") {
        require_once("../admin/admin.php");
    } else
            if (@$_GET['mod'] == "perfil") {
        require_once("../modules/perfiles.php");
    } else
            if (@$_GET['mod'] == "subs") {
        require_once("../modules/subservs.php");
        }


?>
        <!-- Fin algoritmo de modulacion -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>