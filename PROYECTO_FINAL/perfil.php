<?php
session_start();
include("./componentes/encabezado.php");
require_once './API/conn/conexion.php'; // Conexión a la base de datos

// Comprobar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener información completa del usuario desde la tabla `usuarios`
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT nombre, apellidos, nombreUsuario, email, fecha_registro, edad FROM usuarios WHERE us_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nombre, $apellidos, $nombreUsuario, $email, $fecha_registro, $edad);
$stmt->fetch();
$stmt->close();

// Obtener pruebas realizadas asociadas al usuario desde la tabla `pruebas`
$pruebas_query = "
    SELECT 
        IFNULL(test1, 0) AS test1,
        IFNULL(test2, 0) AS test2,
        IFNULL(test3, 0) AS test3,
        IFNULL(test4, 0) AS test4
    FROM hpruebas
    WHERE us_id = ?";
$stmt_pruebas = $conn->prepare($pruebas_query);
$stmt_pruebas->bind_param("i", $user_id);
$stmt_pruebas->execute();
$pruebas_result = $stmt_pruebas->get_result();
$pruebas = $pruebas_result->fetch_assoc();
$stmt_pruebas->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Tarjeta de información del usuario -->
                <div class="card shadow-sm custom-card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="./imgs/user.png" alt="Foto de perfil" class="img-fluid rounded-circle" style="max-height: 100px;">
                        </div>
                        <h3 class="card-title"><?php echo htmlspecialchars($nombre . ' ' . $apellidos); ?></h3>
                        <p class="text-muted mb-2">Usuario: <?php echo htmlspecialchars($nombreUsuario); ?></p>
                        <p class="text-muted mb-2">Correo: <?php echo htmlspecialchars($email); ?></p>
                        <p class="text-muted mb-2">Edad: <?php echo htmlspecialchars($edad); ?> años</p>
                        <p class="text-muted mb-2">Fecha de registro: <?php echo htmlspecialchars($fecha_registro); ?></p>
                    </div>
                </div>

                <!-- Tarjeta de pruebas realizadas -->
                <div class="card mt-4">
                    <div class="card-header bg-dark text-white">
                        <h4>Pruebas Realizadas</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pruebas): ?>
                            <ul class="list-group">
                                <?php foreach ($pruebas as $test => $resultado): ?>
                                    <li class="list-group-item">
                                        <h5><?php echo htmlspecialchars(strtoupper($test)); ?></h5>
                                        <p><strong>Resultado:</strong> <?php echo $resultado ? 'Realizado' : 'No realizado'; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">No se han encontrado pruebas.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
$conn->close(); 
include("./componentes/pie.php");
?>