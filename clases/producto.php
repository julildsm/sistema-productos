<?php

class producto {
    private $conexion;
    private $tabla = "productos";


    public function __construct($database){
        $this->conexion = $database;
    }

    public function crear ($nombre, $descripcion, $precio, $stock){
        $sql = "INSERT INTO productos 
            (nombre, descripcion, precio, stock)
            VALUES
            (:nombre, :descripcion, :precio, :stock)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);

        return $stmt->execute();
    }

    public function listar(){
        $sql = "SELECT * FROM productos";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function obtenerProducto($id){
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nombre, $descripcion, $precio, $stock){
        $sql = "UPDATE productos
                SET nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    stock = :stock
                WHERE id = :id";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);
        return $stmt->execute();
    }
}

?>