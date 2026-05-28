<?php

include 'clases/database.php';
include 'clases/usuario.php';

$database = new Database();
$db = $database->conectar();

$usuario = new Usuario($database);

$mensaje = "";

if($_POST){

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $resultado = $usuario->registrar($nombre, $email, $password);

    if($resultado){

        $mensaje = "Usuario registrado";
        header("Location: login.php");

    }else{

        $mensaje = "Error al registrar";

    }

}

include 'includes/header.php';
?>
<h2>Registro de Usuario</h2>
<?php

if($mensaje){
    echo "<div class='alert alert-info'>$mensaje</div>";
}

?>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button class="btn btn-primary">
        Registrarse
    </button>

</form>

<?php

include 'includes/footer.php';
?>