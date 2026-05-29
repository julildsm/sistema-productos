<?php
require_once "includes/auth.php";

require_once "clases/database.php";
require_once "clases/producto.php";

$database = new Database();
$conexion = $database->conectar();

$producto = new producto($conexion);
$productos = $producto->listar();

include 'includes/header.php';
?>

<h2>Productos</h2>

<a href="agregar.php" class="btn btn-primary mb-3">
    Agregar
</a>


<a href="logout.php" class="btn btn-danger mb-3">
    Cerrar sesión
</a>

<table class="table table-bordered">

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>

<?php while($row = $productos->fetch(PDO::FETCH_ASSOC)) : ?>

<tr>

    <td><?= $row['id'] ?></td>

    <td><?= $row['nombre'] ?></td>

    <td><?= $row['precio'] ?></td>

    <td><?= $row['stock'] ?></td>

    <td>

        <a href="editar.php?id=<?= $row['id'] ?>"
           class="btn btn-warning">
           Editar
        </a>
        <a href="eliminar.php?id=<?= $row['id'] ?>"
           class="btn btn-danger">
           Eliminar
        </a>

    </td>
</tr>

<?php endwhile; ?>

</table>
<?php
include 'includes/footer.php';
?>