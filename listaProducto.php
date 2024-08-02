<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            background: #3498db url(paisaje.jpg)no-repeat center center / cover fixed;
        }
        
        .formtext{
            color:azure;
        }

        table{
            color:azure;
            background-color: rgba(41, 37, 37, 0.4);
            margin: 0 auto;
            display: inline-table;

            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
$numero=$_POST['cantidad'];
?>
    <form action="baken.php" method="post">
        <input type="hidden" name="listaProducto" value="listaProducto.php">
        <h1>Ingrese los datos de los productos</h1>
        <?php
        for($i=0;$i<$numero;$i++){
        ?>
            <br>
            <a>Nombre:</a>
            <input type="text" name="nombreProducto[]" required>
            <a>Precio:</a>
            <input type="number" step="0.1" min="0" name="precioProducto[]" required>
            <br>
        <?php
        };
        ?>
        <br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>


