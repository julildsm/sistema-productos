<?php

class producto {
    private $conexion;
    private $tabla = "productos";

    public function __construct($database){
        $this->conexion = $database;
    }

    public function crear ($nombre, $descripcion, $precio, $stock){
        $sql = "INSER TO productos 
            (nombre, descripcion, precio, stock)
            VALUES
            (:nombre, :descripcion, :precio, :stock)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":nombre", nombre);
        $stmt->bindParam(":descripcion", descripcion);
        $stmt->bindParam(":precio", precio);
        $stmt->bindParam(":stock", stock);

        return $stmt->execute();
    }

    public function listar(){
        $sql = "SELECT * FROM productos";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}

?>