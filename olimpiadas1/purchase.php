<?php
// Conectar a la base de datos
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productos = json_decode($_POST['productos'], true);

    if ($productos) {
        // Aquí podrías agregar la lógica para registrar la compra en la base de datos
        // Ejemplo: insertar datos en la tabla de pedidos

        echo 'success';
    } else {
        echo 'error';
    }
}

$conn->close();
?>
