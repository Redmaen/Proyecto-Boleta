<?php
session_start();

if(isset($_SESSION["nombreProducto"]) && isset($_SESSION["precioProducto"])){
    $nombreProducto=$_SESSION["nombreProducto"];
    $precioProducto=$_SESSION["precioProducto"];
    foreach($nombreProducto as $index => $nombre){
        echo "Producto: ".htmlspecialchars($nombre)." - Precio: ".htmlspecialchars($precioProducto[$index])."<br>";
    }
}else{
    echo "Los datos del Prodcuto no esta disponible";
}

//LIMPIAR DATOS ESPECIFICAMENTE DE LA SECCION
//unset($_SESSION['nombreProducto']);
//unset($_SESSION['precioProducto']);

//DESTRUIR SECCIONES
//session_destroy();


?>