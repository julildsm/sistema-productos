<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Proyecto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">

        <span class="navbar-brand">
            Sistema de Productos
        </span>

        <?php if(isset($_SESSION['usuario'])): ?>

            <div>
                <span class="text-white me-3">
                    Hola, <?= $_SESSION['usuario'] ?>
                </span>

                <a href="logout.php"
                   class="btn btn-danger btn-sm">
                   Cerrar sesión
                </a>
            </div>

        <?php endif; ?>

    </div>
</nav>

<div class="container mt-4">