<?php
// archivo.php

// Generar algunos datos en PHP
$nombre = "Juan";
$edad = 30;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Hola, <?= $nombre ?>!</h1>
    <p>Tienes <?= $edad ?> años.</p>

    <button id="miBoton">Presiona aquí</button>

    <script type="text/javascript">
        // Función JavaScript para mostrar una alerta
        function mostrarAlerta() {
            var nombre = "<?= $nombre ?>";
            var edad = <?= $edad ?>;
            alert("Hola, " + nombre + "! Tienes " + edad + " años.");
        }

        // Vincular el evento onclick del botón a la función mostrarAlerta
        document.getElementById('miBoton').onclick = mostrarAlerta;
    </script>
</body>
</html>