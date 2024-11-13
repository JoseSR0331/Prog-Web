<!DOCTYPE html>
<html lang="es">
<?php
session_start();
include("./componentes/encabezado.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Pruebas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <!-- Script para jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenido a CognitiCare</h1>
        <p class="text-center mb-5">Accede a las pruebas cognitivas diseñadas para apoyar el bienestar de los adultos mayores. Selecciona una prueba a continuación:</p>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Prueba 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Escala de Quejas Subjetivas de Memoria</h5>
                        <p class="card-text">Evalúa las quejas subjetivas de memoria para detectar posibles problemas cognitivos.</p>
                        <a href="prueba_EscaladeQuejasSubjetivasdeMemoria.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                    </div>
                </div>
            </div>
            <!-- Prueba 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Escala de Ansiedad Geriátrica</h5>
                        <p class="card-text">Mide niveles de ansiedad en adultos mayores para facilitar el diagnóstico y tratamiento.</p>
                        <a href="prueba_EscalaAnsiedadGeriatrica.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                    </div>
                </div>
            </div>
            <!-- Prueba 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Escala de Depresión Geriátrica (GDS)</h5>
                        <p class="card-text">Una herramienta de tamizaje para evaluar síntomas de depresión en adultos mayores.</p>
                        <a href="prueba_GDS.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                    </div>
                </div>
            </div>
            <!-- Prueba 4 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">IQCODE</h5>
                        <p class="card-text">Cuestionario para observar cambios cognitivos con el tiempo, útil en la detección de demencia.</p>
                        <a href="prueba_IQCODE.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include("./componentes/pie.php");
?>
</html>
