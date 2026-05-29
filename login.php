<?php
session_start();

require_once "clases/database.php";
require_once "clases/usuario.php";

$database = new Database();

$conexion = $database->conectar();

$usuario = new usuario($conexion);

$mensaje = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $login = $usuario->login(
        $_POST['email'],
        $_POST['password']
    );

    var_dump($login);
    
    if ($login) {
        $_SESSION['usuario'] = $_POST['email'];
        header("location: index.php");
        exit();
    }
    else {
        echo "Datos incorrectos";
    }
}
include 'includes/header.php';

?>

<h2>Iniciar Sesión</h2>
<?php
if($mensaje){
    echo "<div class='alert alert-danger'>$mensaje</div>";
}
?>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">
        Ingresar
    </button>
</form>
<?php

include 'includes/footer.php';

?>