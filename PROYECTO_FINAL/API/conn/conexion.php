<?php
$servername = "localhost";
$username = "root";
$password = "31jose2000";
$database = "cogniticare";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
