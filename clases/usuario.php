<?php

class usuario{
    private $conn;
    private $tabla = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

   public function registrar($nombre, $email, $password) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO " . $this->tabla . "
                (nombre, email, password)
                VALUES
                (:nombre, :email, :password)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $passwordHash);

        return $stmt->execute();

    }
     public function login($email, $password) {

    $sql = "SELECT * FROM usuarios
            WHERE email = '$email'";

    $resultado = $this->conn->query($sql);

    $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

    if($usuario){

        if(password_verify($password, $usuario['password'])){

            return true;

        }

    }

    return false;
}
}

?>