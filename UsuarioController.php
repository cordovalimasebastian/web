<?php
include_once "../config/Database.php";
include_once "../models/Usuario.php";

class UsuarioController {
    private $usuario;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuario = new Usuario($db);
    }

    public function obtenerUsuarios() {
        return $this->usuario->obtenerUsuarios();
    }

    public function crearUsuario($nombre, $contraseña, $perfil) {
        $this->usuario->nombre_usuario = $nombre;
        $this->usuario->contraseña = $contraseña;
        $this->usuario->id_perfil = $perfil;
        return $this->usuario->crearUsuario();
    }

    public function eliminarUsuario($id) {
        return $this->usuario->eliminarUsuario($id);
    }
}
?>

