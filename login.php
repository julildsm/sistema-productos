<?php
session_start();

require_once "clases/database.php";
require_once "clases/usuario.php";

$db = new database();
$conn = $db->conectar();

$usuario = new usuario($conn);

if ($_POST) {
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

<form method="POST">
    <input type="email" name="email>
    <input type="password" name= "password">
    <button type="submit"> Ingresar </button>

</form>