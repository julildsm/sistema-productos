<?php
class Database {

    private $host = "localhost";
    private $db = "sistema";
    private $user = "root";
    private $pass = "";

    public function conectar() {

        try {

            $conexion = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db,
                $this->user,
                $this->pass
            );

            return $conexion;

        } catch(PDOException $e) {

            echo "Error de conexión";

        }
    }
}

?>