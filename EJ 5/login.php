<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia" required><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>


<?php
session_start();

// Configura la conexión a la base de datos (cambia estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mibd_callisaya";

// Establece la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : null;

// Verifica si se enviaron datos por POST
if ($usuario !== null && $contrasenia !== null) {
    // Consulta para verificar si es estudiante
    $estudiante_query = "SELECT * FROM estudiante WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
    $estudiante_result = $conn->query($estudiante_query);

    if ($estudiante_result->num_rows > 0) {
        // Es un estudiante
        $_SESSION['usuario'] = $usuario;   
        header("Location: estudiante.php");
        exit();
    }

    // Consulta para verificar si es docente
    $docente_query = "SELECT * FROM docente WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
    $docente_result = $conn->query($docente_query);

    if ($docente_result->num_rows > 0) {
        // Es un docente
        $_SESSION['usuario'] = $usuario;
        header("Location: docente.php");
        exit();
    }

    // Si no es estudiante ni docente, mostrar mensaje de usuario o contraseña incorrectos
    echo "Usuario o contraseña incorrectos.";
} else {
    // Si no se enviaron datos por POST, mostrar mensaje de ingreso de datos
    echo "Por favor, ingresa usuario y contraseña.";
}


$conn->close();
?>
