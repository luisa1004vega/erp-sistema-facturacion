<?php
include("conexion.php");
include("navbar.php");

if ($_POST) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    $conexion->query("INSERT INTO products (name, price, stock)
                      VALUES ('$name', '$price', '$stock')");
    echo "<div class='alert alert-success'>Producto agregado</div>";
}
?>

<div class="container">
<h2>Agregar Producto</h2>

<form method="POST">
<input class="form-control mb-2" name="name" placeholder="Nombre">
<input class="form-control mb-2" type="number" step="0.01" name="price" placeholder="Precio">
<input class="form-control mb-2" type="number" name="stock" placeholder="Stock">
<button class="btn btn-success">Guardar</button>
<a href="productos.php" class="btn btn-secondary">Volver</a>
</form>
</div>
