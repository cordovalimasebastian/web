<?php
include_once "../controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->obtenerUsuarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        $usuarioController->crearUsuario($_POST["nombre_usuario"], $_POST["contraseña"], $_POST["id_perfil"]);
    } elseif (isset($_POST["eliminar"])) {
        $usuarioController->eliminarUsuario($_POST["id_usuario"]);
    }
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <form method="POST" action="">
        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <input type="number" name="id_perfil" placeholder="ID Perfil" required>
        <button type="submit" name="crear">Crear Usuario</button>
    </form>

    <h2>Lista de Usuarios</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Perfil</th>
            <th>Acción</th>
        </tr>
        <?php while ($row = $usuarios->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row["id_usuario"]; ?></td>
                <td><?php echo $row["nombre_usuario"]; ?></td>
                <td><?php echo $row["id_perfil"]; ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id_usuario" value="<?php echo $row["id_usuario"]; ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>