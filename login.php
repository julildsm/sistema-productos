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
}

?>