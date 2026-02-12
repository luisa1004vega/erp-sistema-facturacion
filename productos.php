<?php
include("conexion.php");
include("navbar.php");

$resultado = $conexion->query("SELECT * FROM products");
?>

<h2 class="mb-4">Lista de Productos</h2>

<a href="agregar_producto.php" class="btn btn-primary mb-3">Agregar Producto</a>

<div class="card shadow">
<div class="card-body">

<table class="table table-hover table-striped">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Precio</th>
<th>Stock</th>
</tr>
</thead>

<tbody>
<?php while($row = $resultado->fetch_assoc()) { ?>
<tr>
<td><?= $row["id"] ?></td>
<td><?= $row["name"] ?></td>
<td>$<?= number_format($row["price"],2) ?></td>
<td><?= $row["stock"] ?></td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>

</div>
</body>
</html>
