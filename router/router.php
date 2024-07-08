          <!-- Algoritmo de modulacion -->
<?php
include "../admin/admin.php";
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
            if (@$_GET['mod'] == "crear_usuario") {
        require_once("../modules/crear.php");
    } else
            if (@$_GET['mod'] == "gestion") {
        require_once("../modules/gestion.php");
    } else
            if (@$_GET['mod'] == "admin") {
        require_once("../admin/admin.php");
    }

?>
            <!-- Fin algoritmo de modulacion -->
        </div>