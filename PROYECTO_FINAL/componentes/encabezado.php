<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Top Bar -->
<div class="top-bar fixed-top">
    <div class="logo d-flex align-items-center">
        <img src="./imgs/logo.jpg" alt="Logo">
    </div>
    <div class="user-info">
        <?php 
            $usuario = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            echo "<span>Bienvenido" . ($usuario ? ", $usuario" : "") . "</span>";
        ?>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-dark navbar-custom fixed-top" style="top: 120px;">
    <div class="container-fluid">
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Inicio</a>
        <a class="navbar-brand" href="mapa.php">CEMAM</a>
        <a class="navbar-brand" href="relacionados.php">Relacionados</a>
        <a class="navbar-brand" href="faq.php">FAQ</a>

        <!-- Offcanvas con Static Backdrop -->
        <div class="offcanvas offcanvas-start text-bg-dark" id="offcanvasDarkNavbar" tabindex="-1" data-bs-backdrop="static">
            <div class="offcanvas-header">
                <h5>Menu de Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column justify-content-between">
                <ul class="navbar-nav flex-grow-1 pe-3">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item d-flex align-items-center">
                            <img src="./imgs/user.png" alt="Usuario" style="width: 30px; height: 30px; margin-right: 10px;">
                            <a class="nav-link" href="perfil.php"><?php echo $_SESSION['username']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pruebas.php">Pruebas</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesión / Registrarse</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="offcanvas-footer mt-auto">
                        <a class="btn btn-danger w-100" href="logout.php">Cerrar sesión</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<!-- Pie de página -->
<?php include("./componentes/pie.php"); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>