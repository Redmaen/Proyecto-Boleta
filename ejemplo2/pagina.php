<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario y Tabla en la Misma Página</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Formulario de Datos</h2>
<form method="post" action="">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>
    <label for="edad">Edad:</label><br>
    <input type="number" id="edad" name="edad" required><br><br>
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    
    session_start();
    if (!isset($_SESSION['datos'])) {
        $_SESSION['datos'] = [];
    }
    $_SESSION['datos'][] = ['nombre' => $nombre, 'edad' => $edad];
}

if (isset($_SESSION['datos']) && count($_SESSION['datos']) > 0) {
    echo "<h2>Datos Enviados</h2>";
    echo "<table>
            <tr>
                <th>Indice</th>
                <th>Nombre</th>
                <th>Edad</th>
            </tr>";
            
    $suma=0;
    $tabla=$_SESSION['datos'];
    foreach ($tabla as $indiso => $dato) {
        $suma+=htmlspecialchars($dato['edad']);
        echo "<tr>
                <td>" . htmlspecialchars($indiso+1) . "</td>
                <td>" . htmlspecialchars($dato['nombre']) . "</td>
                <td>" . htmlspecialchars($dato['edad']) . "</td>
              </tr>";
    }
    echo "<tr>
                <td></td>
                <th>TOTAL:</th>
                <td>".htmlspecialchars($suma)."</td>
            </tr>";
    echo "</table>";
    echo "<tr>
                <td></td>
                <th></th>
                <td>".$tabla[0]['edad']."</td>
            </tr>";
//unset($_SESSION['datos']);
}
?>

</body>
</html>
