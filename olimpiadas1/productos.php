<?php
include 'connection.php';

$sql = "SELECT id, nombre, descripcion, precio, imagen FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='" . $row["imagen"] . "' class='card-img-top' alt='" . $row["nombre"] . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["nombre"] . "</h5>";
        echo "<p class='card-text'>" . $row["descripcion"] . "</p>";
        echo "<p class='card-text'>$" . $row["precio"] . "</p>";
        echo "<button class='btn btn-primary' onclick='agregarAlCarrito(" . $row["id"] . ")'>Agregar al carrito</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No hay productos disponibles";
}

$conn->close();
?>
