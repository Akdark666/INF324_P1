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



 table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #0000f0;
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


<center>Usando vectores</center>
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


<?php
$servername = "localhost";
$username = "root"; // Cambia a tu usuario de base de datos
$password = ""; // Cambia a tu contraseña de base de datos
$dbname = "mibd_callisaya"; // Cambia a tu nombre de base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = "
    SELECT
        d.nombre AS Departamento,
        AVG(em.nota) AS Media_Depto
    FROM
        estudiante e
    JOIN
        departamento d ON e.id_dep = d.id_dep
    LEFT JOIN
        estudiante_materia em ON e.ci = em.ci
    GROUP BY
        d.nombre;
";

$result = $conn->query($query);

// Vectores para almacenar los nombres de los departamentos y las medias
$departamentos = [];
$medias = [];

while ($row = $result->fetch_assoc()) {
    $departamentos[] = $row["Departamento"];
    $medias[] = $row["Media_Depto"];
}

$conn->close();
?>


<table>
    <tr>
        <th>Departamento</th>

        <?php
        // Imprime los nombres de los departamentos como encabezados de columna
        foreach ($departamentos as $departamento) {
            echo "<th>" . $departamento . "</th>";
        }
        ?>
    </tr>
    <tr>
        <td>Media de Notas</td>

        <?php
        // Imprime la media de notas para cada departamento
        foreach ($medias as $media) {
            echo "<td>" . $media . "</td>";
        }
        ?>
    </tr>
</table>










    </div>

<div style="text-align: center; margin-top: 20px;">
    <a href="login.php" style="text-decoration: none; color: #fff; background-color: #333; padding: 10px 20px; border-radius: 5px;">Cerrar Sesión</a>
</div>


</body>
</html>
