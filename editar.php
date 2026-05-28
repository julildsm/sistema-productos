<?php
include 'clases/Database.php';
include 'clases/Producto.php';
$database = new Database();
$db = $database->conectar();
$producto = new Producto($db);
$id = $_GET['id'];

$datos = $producto->obtenerProducto($id);

if($_POST){
    $producto->editar(
        $id,
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['precio'],
        $_POST['stock']
    );
    header("Location: productos.php");
}

include 'includes/header.php';
?>

<h2>Editar Producto</h2>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text"
               name="nombre"
               class="form-control"
               value="<?php echo $datos['nombre']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text"
               name="descripcion"
               class="form-control"
               value="<?php echo $datos['descripcion']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number"
               name="precio"
               class="form-control"
               value="<?php echo $datos['precio']; ?>">

    </div>

    <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number"
               name="stock"
               class="form-control"
               value="<?php echo $datos['stock']; ?>">
    </div>
    <button class="btn btn-primary">
        Guardar Cambios
    </button>
</form>

<?php

include 'includes/footer.php';

?>