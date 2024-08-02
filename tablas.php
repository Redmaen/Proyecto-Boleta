<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Producto</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        table, th, td{
            border: 1px solid black;
        }
        th,td{
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>&nbsp Indice &nbsp</th>
            <th>&nbsp Producto &nbsp</th>
            <th>&nbsp Precio &nbsp</th>
        </tr>
        
        <?php 
        session_start();

        if(isset($_SESSION["nombreProducto"]) && isset($_SESSION["precioProducto"])){
            $nombreProducto=$_SESSION["nombreProducto"];
            $precioProducto=$_SESSION["precioProducto"];
        }

        foreach($nombreProducto as $index => $nombres){
            $precio=$precioProducto[$index];
            $num=$index+1;
        ?>
        <tr>
            <td>&nbsp<?php echo " ".$num." "?>&nbsp</td>
            <td>&nbsp<?=$nombres?>&nbsp</td>

            <td>&nbsp<?=$precio?>&nbsp</td>
        </tr>
        <?php
        }
        ?>
        
    </table>

    <form action="tablas.php" method="post">
        <br><br>
        <a class="formtext">Indice del Producto:</a>
        <input type="number" name="indiceProducto"  min="1" required>
        <br><br>
        <a class="formtext">Cantidad:</a>
        <input type="number" name="cantidad"  min="1" required>
        <input type="submit" values="Calcular">
    </form>
    <br>
<?php

if($_SERVER['REQUEST_METHOD']=='POST' && count($nombreProducto)>=$_POST['indiceProducto'] 
&& isset($_POST['cantidad'])){
    $indice=$_POST['indiceProducto'];
    $productoNombre=$nombreProducto[$indice-1];
    $productoPrecio=$precioProducto[$indice-1];
    $cantidad=$_POST['cantidad'];
    $subTotal=$productoPrecio*$cantidad;
    
    if(isset($_SESSION['datos'])){
        $_SESSION['datos'][]=['nombre'=>$productoNombre,'precio'=>$productoPrecio,'cantidad'=>$cantidad,'subtotal'=>$subTotal];
    }

    if(!isset($_SESSION['datos'])){
        $_SESSION['datos']=[];
    }
    if(!isset($_SESSION['controler'])){
        $_SESSION['controller']="si";
        $_SESSION['datos'][]=['nombre'=>$productoNombre,'precio'=>$productoPrecio,'cantidad'=>$cantidad,'subtotal'=>$subTotal];
    }
}

if(isset($_SESSION['datos']) && count($_SESSION['datos']) > 0){
    echo"<table>
        <tr>
            <th>&nbsp INDICE &nbsp</th>
            <th>&nbsp NOMBRE &nbsp</th>
            <th>&nbsp PRECIO &nbsp</th>
            <th>&nbsp CANTIDAD &nbsp</th>
            <th>&nbsp SUBTOTAL &nbsp</th>
        </tr>";
    $tabla=$_SESSION['datos'];
    $suma=0;
    foreach($tabla as $indiceProducto => $producto){
        $suma+=$producto['subtotal'];
        echo "<tr>
                <td>".htmlspecialchars($indiceProducto+1)."</td>
                <td>".htmlspecialchars($producto['nombre'])."</td>
                <td>".htmlspecialchars($producto['precio'])."</td>
                <td>".htmlspecialchars($producto['cantidad']*1)."</td>
                <td>".htmlspecialchars($producto['subtotal'])."</td>
        </tr>";
    }
    echo"<tr>
            <td colspan='3'></td>
            <th>TOTAL:</th>
            <td>".htmlspecialchars($suma)."</td>
        </tr>";
    echo "</table>";
}
?>
<br><br>
<button id="mi-boton">Borrar Factura</button>
<script type="text/javascript">
    function borrarDatos() {
        $.ajax({
        url:'borrar_datos.php',
        method: 'POST',
        success: function(response){
            alert("Datos Borrados...");
            location.reload();
        },
        error: function(){
            alert("Ah ocurrido un error al moemnto de borrar los datos...");
        }
        });
    }

    document.getElementById('mi-boton').onclick = borrarDatos;
    
</script>
</body>
</html>