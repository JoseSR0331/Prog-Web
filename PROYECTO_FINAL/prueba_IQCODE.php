<!DOCTYPE html>
<html lang="es">
<?php
session_start();
include("./componentes/encabezado.php");
include("./API/conn/conexion.php"); // Incluye la conexión a la base de datos

// Verificar si el usuario está conectado y tiene acceso a esta prueba
if (!isset($_SESSION['us_id'])) {
    echo "Acceso denegado. Por favor inicia sesión.";
    exit();
}

$us_id = $_SESSION['us_id'];

// Recuperar el test ID correspondiente a IQCODE
$test_id_query = "SELECT test_id FROM hpruebas WHERE us_id = ? AND test1 = 1"; // Cambiar a `test1`, `test2`, etc., según corresponda
$stmt = $conn->prepare($test_id_query);
$stmt->bind_param("i", $us_id);
$stmt->execute();
$stmt->bind_result($test_id);
$stmt->fetch();
$stmt->close();

if (!$test_id) {
    echo "No tienes acceso a esta prueba.";
    exit();
}

// Obtener las preguntas de IQCODE desde la tabla `preguntas`
$query = "SELECT pregunta_id, texto FROM preguntas WHERE test_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $test_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - IQCODE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Prueba IQCODE</h1>
        <form action="procesar_iqcode.php" method="POST">
            <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
            <input type="hidden" name="us_id" value="<?php echo $us_id; ?>">

            <?php while ($pregunta = $result->fetch_assoc()): ?>
                <div class="mb-4">
                    <label class="form-label">
                        <?php echo htmlspecialchars($pregunta['texto']); ?>
                    </label>
                    <input type="hidden" name="pregunta_ids[]" value="<?php echo $pregunta['pregunta_id']; ?>">

                    <select name="respuestas[<?php echo $pregunta['pregunta_id']; ?>]" class="form-select" required>
                        <?php
                        // Obtener las opciones de respuesta y puntaje para cada pregunta
                        $respuesta_query = "SELECT respuesta_id, texto, puntaje FROM respuestas WHERE pregunta_id = ?";
                        $respuesta_stmt = $conn->prepare($respuesta_query);
                        $respuesta_stmt->bind_param("i", $pregunta['pregunta_id']);
                        $respuesta_stmt->execute();
                        $respuestas_result = $respuesta_stmt->get_result();

                        while ($respuesta = $respuestas_result->fetch_assoc()):
                        ?>
                            <option value="<?php echo $respuesta['respuesta_id']; ?>">
                                <?php echo htmlspecialchars($respuesta['texto']) . " - Puntuación: " . $respuesta['puntaje']; ?>
                            </option>
                        <?php endwhile; ?>
                        <?php $respuesta_stmt->close(); ?>
                    </select>
                </div>
            <?php endwhile; ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar Respuestas</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include("./componentes/pie.php"); ?>
</html>
