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
               
               if($_SESSION['rl'] == 1){
                header("location:client/dashboard.php");
                }
                elseif($_SESSION['rl'] == 2){
                    header("location:seller/vendedor.html");
                }elseif($_SESSION['rl'] == 3){
                    header("location:admin/admin.php");
                }else{
                    "<script>alert('rectifica tus datos')</script>";
                }
           }
        
       } else {
           echo "<center><font color='red'>Los datos de usuario se encuentran</font></center>";
           echo "<script>alert('revisa los datos ingresados')</script>";
       }
   }
?> 