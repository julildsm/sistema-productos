<?php

class usuario{
    private $conn;
    private $tabla = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar ($nombre, $email, $password){
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "insert into" . $this->tabla . " (nombre, email, password) VALUES (:nombre, :email, :password)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindparam(":nombre", $nombre);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":password", $password);
        
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['nombre'];

            return true;
        }
        return false;
    }
}



?>