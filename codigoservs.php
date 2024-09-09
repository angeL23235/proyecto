<?php
include "conexion.php";
if(isset($_POST['btn_srvs'])){
    $cmbservs = $_POST['cmbservs'];
    $ns = $_POST['ns'];
    $desc = $_POST['desc'];
    $email = $_POST ['mail'];
    $prec = $_POST['prec'];
    $foto = $_FILES['foto2'];

    $directorio_destino = "img-servs/";
    $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $nombre_archivo = $ns . "." . $extension;
    $ubicacion_temporal = $foto['tmp_name'];
            
     $ruta_destino = $directorio_destino . $nombre_archivo;
     if(move_uploaded_file($ubicacion_temporal,$ruta_destino)){

        $subirservs = mysqli_query($con," INSERT INTO `serviciosc`(`tipo_servicio`, `nombre_servicio`, `descripcion_servicio`,`email`, `precio_servicio`, `ft_servs`) 
        VALUES ('$cmbservs','$ns','$desc','$email','$prec','$ruta_destino')");
        echo "<script>alert('a buena hora subiste el servicio')</script>";
        "<script>window.location=('../modules/subservs.php')</script>";
    }else{
         echo "<script>alert('revise y verifique bien los datos')</script>";
}
}
?>