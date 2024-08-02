<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombreProducto=filter_input(INPUT_POST, 'nombreProducto', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $precioProducto=filter_input(INPUT_POST, 'precioProducto', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

    if(ISSET($_POST["listaProducto"]) && $_POST["listaProducto"]=="listaProducto.php"){
        $_SESSION["nombreProducto"]=$nombreProducto;
        $_SESSION["precioProducto"]=$precioProducto;

        header("Location: tablas.php");
        exit();
    }
}

?>