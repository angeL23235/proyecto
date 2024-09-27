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
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.card {
    height: 500px;
    margin-right: 600px;
}

.carrusel {
    margin-top: 100px;
    margin-left: 500px;
    height: 30%;
    width: 50%;
}



body {
    background: #dadada;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-size: 16px;
    background-color: #EBEBEB;
}

.autos {
    margin-left: 42%;
    margin-top: -55%;

}

.alquilera {
    margin-top: 8%;
}

.aseo {
    margin-left: 88%;
    margin-top: -55%;


}

.text {
    margin top: -20%;
}
</style>

<body>
    <div class="container">
        <section class="cards kitchen">
            <div class="card cocina" style="width: 18rem; height:525px;">
                <img src="../img/cocina.png" class="card-img-top" alt="Hotel budge itagui">
                <div class="card-body">
                    <h4 class="card-title text-center">
                       <strong>Cociname</strong> 
                    </h4>
                    <h5 class="card-title">Encuentra tus servicios de cocina aqui</h5>
                    <p class="card-text"> Informacion de personas confiables</p>
                    <p>a tu mano</p>
                    <a href="dashboard.php?mod=cocina" class="btn btn-primary btn_cocina">rentar servicio de
                        cocina</a>
                </div>

        </section>
        <section class="cards autos">
            <div class="card alquiler" style="width: 19rem;">
                <img src="../img/autos.jpg" class="card-img-top" alt="Hotel budge itagui" height="800px">
                <div class="card-body"><br><br>
                    <h5 class="card-title">¿Necesitas un auto? no busques más</h5>
                    <p class="card-text">Ahora ven y alquila uno</p>
                    <p>Desde hoy</p>
                    <a href="dashboard.php?mod=autos" class="btn btn-primary btn_auto alquilera">alquilar autos </a>
                </div>

        </section>
        <section class="cards aseo">
            <div class="card alquiler" style="width: 19rem;">
                <img src="../img/aseo.jpg" class="card-img-top" alt="Hotel budge itagui" height="800px">
                <div class="card-body"><br>
                    <div class="text">
                        <h5 class="card-title">¡Te sientes incomodo con la suciedad?</h5>
                        <p class="card-text">Pero te da pereza "zzzz"</p>
                        <p>Sientete comodo y contrata alguien limpie por ti </p>
                        <a href="dashboard.php?mod=aseo" class="btn btn-primary btn_limpieza asea">Busca
                            limpieza</a>
                    </div>
                </div>

        </section>
    </div>
</body>

</html>