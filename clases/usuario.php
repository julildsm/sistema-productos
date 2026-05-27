<?php

class usuario{
    private $conn;
    private $tabla = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar ($nom, $email, $contra){
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "insert into" . $this->tabla . " (nom, email, contra) VALUES (:nom, :email, :contra)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindparam(":email", $email);
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