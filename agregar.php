<?php
require_once "includes/auth.php";

require_once "clases/database.php";
require_once "clases/producto.php";

$database = new database();
$conexion = $database->conectar();

$producto = new producto($conexion);
$mensaje="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    
   $resultado = $producto->crear(
        $_POST['nombre'],
        $_POST['descripion'],
        $_POST['precio'],
        $_POST['stock']
    );
   if ($resultado){
      header("location: index.php");
      exit();

   }else{
    $mesnaje="Error al agregar";
   }
}
?>
<h2>Agregar Producto</h2>
<?php
if($mensaje){
    echo "<div class='alert alert-info'>$mensaje</div>";
}
?>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text"
               name="nombre"
               class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text"
               name="descripcion"
               class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number"
               name="precio"
               class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number"
               name="stock"
               class="form-control">
    </div>
    <button class="btn btn-primary">
        Agregar Producto
    </button>
</form>
<?php
include 'includes/footer.php';
?>
