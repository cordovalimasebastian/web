<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras Realizadas</title>
</head>
<body>
    <h2>Compras Realizadas</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['compras'])) {
                foreach ($_SESSION['compras'] as $compra) {
                    echo "<tr>
                            <td>{$compra['nombre']}</td>
                            <td>{$compra['dni']}</td>
                            <td>{$compra['producto']}</td>
                            <td>{$compra['precio']}</td>
                            <td>{$compra['cantidad']}</td>
                            <td>{$compra['precioTotal']}</td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <form action="generar_pdf.php" method="post">
        <button type="submit">Generar PDF</button>
    </form>
</body>
</html>
