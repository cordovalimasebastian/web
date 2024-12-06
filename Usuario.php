<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public $id_usuario;
    public $nombre_usuario;
    public $contraseña;
    public $id_perfil;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerUsuarios() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crearUsuario() {
        $query = "INSERT INTO " . $this->table . " (nombre_usuario, contraseña, id_perfil) VALUES (:nombre_usuario, :contraseña, :id_perfil)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre_usuario", $this->nombre_usuario);
        $stmt->bindParam(":contraseña", $this->contraseña);
        $stmt->bindParam(":id_perfil", $this->id_perfil);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function eliminarUsuario($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_usuario", $id);
        return $stmt->execute();
    }
}
?>

