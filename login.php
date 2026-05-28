<?php
session_start();

require_once "clases/database.php";
require_once "clases/usuario.php";

$db = new database();
$conn = $db->conectar();

$usuario = new usuario($conn);

if (isset($_POST['email']) && isset($_POST['password'])) {
    $login = $usuario->login(
        $_POST['email'],
        $_POST['password']
    );

    if ($login) {
        header("location: index.php");
    }
    else {
        echo "Datos incorrectos";
    }
}
?>
<h2>Iniciar Sesión</h2>
<form method="POST">
    <label>Email</label>
    <input type="email" name="email"><br></br>

    <label>Contraseña</label>
    <input type="password" name= "password"><br></br>
    <button type="submit"> Ingresar </button>

</form>