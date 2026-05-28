<?php

class Database {

    private $host = "localhost";
    private $dbname = "sistema";
    private $user = "root";
    private $pass = "";

    public function conectar() {

        try {

            $conexion = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname,
                $this->user,
                $this->pass
            );

            return $conexion;

        } catch(PDOException $e) {

            echo "Error de conexión: " . $e->getMessage();
        }
    }
}