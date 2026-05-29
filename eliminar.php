<?php
include 'clases/Database.php';
include 'clases/Producto.php';

$database = new Database();
$db = $database->conectar();
$producto = new Producto($db);
$id = $_GET['id'];

$producto->eliminar($id);

header("Location: index.php");

?>