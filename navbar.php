<?php
// navbar.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ERP System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f4f6f9;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">ERP SYSTEM</a>

        <div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="facturar.php">Crear Factura</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver_facturas.php">Ver Facturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
