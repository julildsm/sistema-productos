<?php

class producto {
    private $conn;
    private $tabla = "productos";

    public function __construct($db){
        $this->conn = $db;
    }

    public function crear ($nombre, $descripcion, $precio, $stock){
        $sql = "INSERT INTO productos 
            (nombre, descripcion, precio, stock)
            VALUES
            (:nombre, :descripcion, :precio, :stock)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);

        return $stmt->execute();
    }

    public function listar(){
        $sql = "SELECT * FROM productos";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}

?>