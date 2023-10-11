<?php
session_start();

$color = $_POST['color'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mibd_callisaya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario_docente = $_SESSION['usuario'];

// Actualiza el color en la base de datos para el estudiante actual
$sql = "UPDATE docente SET color='$color' WHERE usuario='$usuario_docente'";

if ($conn->query($sql) === TRUE) {
    // Operación exitosa
    echo "Color guardado con éxito";
} else {
    echo "Error al guardar el color: " . $conn->error;
}

$conn->close();
?>
