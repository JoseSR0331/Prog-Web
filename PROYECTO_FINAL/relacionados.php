<!DOCTYPE html>
<html lang="es">
<?php
session_start();
include("./componentes/encabezado.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Relacionados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Bienvenido a CognitiCare</h1>
        <div class="row">
            <!-- Primer Panel: Lista de Pruebas y Descripciones -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Pruebas Cognitivas que ofrece la pagina</h2>
                        <ul class="list-group mb-4">
                            <li class="list-group-item">IQCODE</li>
                            <li class="list-group-item">Escala de Depresión Geriátrica</li>
                            <li class="list-group-item">Escala de Ansiedad Geriátrica</li>
                            <li class="list-group-item">Escala de Quejas Subjetivas de Memoria</li>
                        </ul>
                        <div class="text-muted">
                            <p><strong>IQCODE:</strong> Prueba para evaluar cambios en memoria y comportamiento.</p>
                            <p><strong>Escala de Depresión Geriátrica:</strong> Autoevaluación para medir síntomas de depresión.</p>
                            <p><strong>Escala de Ansiedad Geriátrica:</strong> Evalúa niveles de ansiedad en adultos mayores.</p>
                            <p><strong>Escala de Quejas Subjetivas de Memoria:</strong> Evalúa quejas sobre la memoria para detectar posibles problemas cognitivos.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segundo Panel: Videos de YouTube -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Videos Educativos</h2>
                        <div class="ratio ratio-16x9 mb-4">
                            <iframe src="https://www.youtube.com/embed/btC6Gt7oVsw" title="Video sobre demencia" allowfullscreen></iframe>
                        </div>
                        <div class="ratio ratio-16x9 mb-4">
                            <iframe src="https://www.youtube.com/embed/FiCE1yw54zU" title="Video sobre deterioro cognitivo" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tercer Panel: Fichas de Gerontólogos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Ubicación de Gerontólogos en la ZMG</h2>
                        <div class="card-mb-3">
                            <img src="imgs/clinica1.png" class="card-img-top" alt="Clínica 1">
                            <div class="card-body">
                                <h5 class="card-title">CENTRO DE SALUD SANTA MARGARITA</h5>
                                <p class="card-text">Av Acueducto S/N, Las Bobedas, 45130 Zapopan, Jal. Teléfono: 33 3685 5485</p>
                            </div>
                        </div>
                        <div class="card-mb-3">
                            <img src="imgs/clinica2.jpg" class="card-img-top" alt="Clínica 2">
                            <div class="card-body">
                                <h5 class="card-title">Santé Clínica de Especialidades</h5>
                                <p class="card-text">C. Justo Sierra, Núm. 2432, Col. Ladron De Guevara, Guadalajara. Teléfono: +52 (33) 24510502 Ext.4278</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("./componentes/pie.php");
    ?>
</body>
</html>
