<?php
session_start();
include("./componentes/encabezado.php");
require_once './API/conn/conexion.php'; // Conexión a la base de datos

// Comprobar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener información del usuario
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT nombre, apellidos, email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nombre, $apellidos, $email);
$stmt->fetch();
$stmt->close();

// Obtener pruebas y puntajes del usuario
$pruebas_query = "SELECT p.nombre_prueba, p.descripcion, COALESCE(SUM(pr.puntaje), 0) AS puntaje
                  FROM pruebas p
                  LEFT JOIN preguntas pr ON p.id_prueba = pr.id_prueba
                  GROUP BY p.id_prueba";
$pruebas_result = $conn->query($pruebas_query);
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
                <div class="card shadow-sm custom-card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="./imgs/user.png" alt="Foto de perfil" class="img-fluid rounded-circle" style="max-height: 100px;">
                        </div>
                        <h3 class="card-title"><?php echo htmlspecialchars($nombre . ' ' . $apellidos); ?></h3>
                        <p class="text-muted"><?php echo htmlspecialchars($email); ?></p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-dark text-white">
                        <h4>Pruebas Realizadas</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pruebas_result->num_rows > 0): ?>
                            <ul class="list-group">
                                <?php while ($prueba = $pruebas_result->fetch_assoc()): ?>
                                    <li class="list-group-item">
                                        <h5><?php echo htmlspecialchars($prueba['nombre_prueba']); ?></h5>
                                        <p><?php echo htmlspecialchars($prueba['descripcion']); ?></p>
                                        <p><strong>Puntaje:</strong> <?php echo $prueba['puntaje']; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">No hay pruebas disponibles en este momento.</p>
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
