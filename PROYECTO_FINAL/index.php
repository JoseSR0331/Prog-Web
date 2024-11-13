<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        session_start();
        echo isset($_SESSION['username']) ? "<p>Usuario en sesión: " . $_SESSION['username'] . "</p>" : "<p>No hay usuario en sesión</p>";
        include("./componentes/encabezado.php"); 
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <!-- Bienvenida -->
        <h1 class="text-center mb-4">Bienvenido a CognitiCare</h1>
        <p class="text-center">Descubre información útil sobre el deterioro cognitivo, tipos de enfermedades y cómo prevenirlo.</p>

        <!-- Nueva Sección Explicativa -->
        <div class="section-explicativa my-4">
            <h3>¿Qué encontrarás en CognitiCare?</h3>
            <p>En esta página, podrás acceder a información completa sobre el deterioro cognitivo, conocer gerontólogos y 
            instituciones especializadas relevantes, y realizar pruebas cognitivas de manera gratuita si te registras 
            y accedes con tu usuario.</p>
            <p>¡Explora los recursos que CognitiCare tiene para ofrecerte y aprende cómo cuidar tu salud cognitiva!</p>
        </div>


        <!-- Carrusel de Noticias -->
        <h2 class="my-4">Últimas Noticias</h2>
        <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imgs/noticia1.jpg" class="d-block w-100" alt="Noticia 1">
                    <a href="https://www.infobae.com/america/ciencia-america/2024/11/08/un-estudio-asocio-la-somnolencia-diurna-con-el-sindrome-que-antecede-a-la-demencia/" class="text-decoration-none">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Un estudio asoció la somnolencia diurna con el síndrome que antecede a la demencia</h5>
                        <p>Investigadores de los Estados Unidos hicieron una investigación en más de 400 personas que no tenían deterioro cognitivo y encontraron dos comportamientos que podrían dar indicios de la enfermedad. Qué recomiendan a partir de los resultados</p>
                    </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <img src="imgs/noticia2.webp" class="d-block w-100" alt="Noticia 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Mes Mundial del Alzhéimer 2024: es hora de actuar por la demencia</h5>
                        <p>En septiembre de 2024 se celebra la 13ª edición del Mes Mundial del Alzheimer, una iniciativa mundial dedicada a concienciar sobre las demencias y promover una sociedad más inclusiva y solidaria con las personas que viven con esta enfermedad.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="imgs/noticia3.jpg" class="d-block w-100" alt="Noticia 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>El cerebro de los gatos esconde claves para entender el deterioro cognitivo de las personas</h5>
                        <p>Según hallazgos veterinarios recientes envejecen de manera similar, mostrando atrofia y señales comparables a los observados en humanos. Pueden ser modelos esenciales para estudiar enfermedades como el alzheimer</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <!-- Tipos de Enfermedades Cognitivas -->
        <h2 class="my-5">Tipos de Enfermedades Cognitivas</h2>
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="imgs/alzheimer.png" class="img-fluid rounded" alt="Alzheimer">
            </div>
            <div class="col-md-6">
                <h3>Alzheimer</h3>
                <p>El Alzheimer es una enfermedad neurodegenerativa que afecta la memoria y otras funciones cognitivas. Es más común en personas mayores y puede progresar de manera rápida o lenta.</p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 order-md-2">
                <img src="imgs/demencia.jpg" class="img-fluid rounded" alt="Demencia">
            </div>
            <div class="col-md-6 order-md-1">
                <h3>Demencia</h3>
                <p>La demencia es un síndrome que implica el deterioro de la memoria, el pensamiento, el comportamiento y la capacidad para realizar actividades diarias. Existen varios tipos, como la demencia vascular y la demencia por cuerpos de Lewy.</p>
            </div>
        </div>

        <!-- Consejos para Prevenir el Deterioro Cognitivo -->
        <h2 class="my-5">Cómo Prevenir el Deterioro Cognitivo</h2>
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="imgs/ejercicio.jpg" class="img-fluid rounded" alt="Ejercicio físico">
            </div>
            <div class="col-md-6">
                <h3>Realiza Ejercicio Físico</h3>
                <p>El ejercicio físico regular ayuda a mejorar la salud del cerebro y reduce el riesgo de deterioro cognitivo. Caminar, nadar o realizar actividades aeróbicas son excelentes opciones.</p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 order-md-2">
                <img src="imgs/alimentacion.jpg" class="img-fluid rounded" alt="Alimentación saludable">
            </div>
            <div class="col-md-6 order-md-1">
                <h3>Mantén una Alimentación Saludable</h3>
                <p>Una dieta balanceada rica en frutas, verduras y grasas saludables, como el aceite de oliva y los frutos secos, puede beneficiar el cerebro y prevenir el deterioro cognitivo.</p>
            </div>
        </div>
    </div>

    <?php include("./componentes/pie.php"); ?>
</body>
</html>

