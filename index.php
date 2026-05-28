<?php
require_once "includes/auth.php";

require_once "clases/database.php";
require_once "clases/producto.php";

$database = new Database();
$conexion = $database->conectar();

$producto = new producto($conexion);
$producto = $producto->listar();

if($conexion){

    echo "Conexión exitosa";

}else{

    echo "Error";

}
?>

<h1>Productos</h1>

<a href="agregar.php">Agregar</a>

<a href="logout.php">Cerrar sesión</a>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
</tr>

<?php while($row = $productos->fetch(PDO::FETCH_ASSOC)) : ?>

<tr>

    <td><?= $row['id'] ?></td>

    <td><?= $row['nombre'] ?></td>

    <td><?= $row['precio'] ?></td>

    <td><?= $row['stock'] ?></td>

</tr>

<?php endwhile; ?>

</table>