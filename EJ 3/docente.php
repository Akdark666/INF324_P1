<?php
session_start();


// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mibd_callisaya";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene el nombre de usuario del docente desde la sesión
$usuario_docente = $_SESSION['usuario'];

// Consulta para obtener los datos del docente
$sql = "SELECT nombre, ci, color FROM docente WHERE usuario = '$usuario_docente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtiene los datos del docente
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $ci = $row['ci'];
    $color = $row['color'];
} else {
    // Docente no encontrado
    $nombre = "Docente Desconocido";
    $ci = "CI Desconocido";
    $color = "#000000"; // Color predeterminado si no se encuentra en la base de datos
}

// Cierra la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Docente</title>
    <style>
        body {
            background-color: <?php echo $color; ?>;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido, <?php echo $nombre; ?></h1>
        <p>CI: <?php echo $ci; ?></p>
        <!-- Otros datos e información para el estudiante -->


    <label for="color_picker">Selecciona un color:</label>
    <input type="color" id="color_picker" name="color_picker">
<button onclick="guardarColor()">Guardar Color</button>

<script>
    function guardarColor() {
    var selectedColor = document.getElementById('color_picker').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar_color_do.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Verifica si la operación fue exitosa
            if (xhr.responseText.trim() === "Color guardado con éxito") {
                // Color guardado con éxito, recarga la página
                location.reload();
            } else {
                // Mensaje de error si la operación no fue exitosa
                alert("Error al guardar el color.");
            }
        }
    };
    xhr.send('color=' + encodeURIComponent(selectedColor));
}

</script>


    </div>

<div style="text-align: center; margin-top: 20px;">
    <a href="login.php" style="text-decoration: none; color: #fff; background-color: #333; padding: 10px 20px; border-radius: 5px;">Cerrar Sesión</a>
</div>


</body>
</html>
