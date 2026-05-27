<?php

include 'clases/Database.php';

$database = new Database();

$conexion = $database->conectar();

if($conexion){

    echo "Conexión exitosa";

}else{

    echo "Error";

}

?>