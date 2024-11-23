<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $precioTotal = $precio * $cantidad;

    // Guardar los datos de la compra en la sesión
    $_SESSION['compras'][] = [
        'nombre' => $nombre,
        'dni' => $dni,
        'producto' => $producto,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'precioTotal' => $precioTotal
    ];

    // Redirigir al formulario para mostrar las compras
    header('Location: formulario.php');
    exit();
}
?>
