<?php
require_once "includes/auth.php";

require_once "clases/database.php";
require_once "clases/producto.php";

$database = new database();
$conn = $database->conectar();

$producto = new producto($conn);

if ($_POST) {
    $producto->crear(
        $_POST['nombre'],
        $_POST['descripion'],
        $_POST['precio'],
        $_POST['stock']
    );

    header("location: index.php");
}
?>

<form method="POST">

    <input type="text" name="nombre">

    <textarea name="descripcion"></textarea>

    <input type="number" step="0.01" name="precio">

    <input type="number" name="stock">

    <button type="submit">Guardar</button>

</form>