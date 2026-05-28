<?php
require_once "includes/auth.php";

require_once "clases/database.php";
require_once "clases/producto.php";

$db = new database();
$conn = $db->conectar();

$producto = new producto($conn);

if ($_POST) {
    $producto->crear(
        $_POST['nombre'],
        $_POST['descripion'],
        $_POST['precio'],
        $_POST['stock']
    );
}
?>