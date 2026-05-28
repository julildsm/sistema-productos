<?php
require_once "includes/auth.php";

require_once "clases/database.php";
require_once "clases/producto.php";

$database = new Database();

$conexion = $database->conectar();

if($conexion){

    echo "Conexión exitosa";

}else{

    echo "Error";

}

?>