<?php
include("conexion.php");
include("navbar.php");

$sql = "
SELECT 
    invoices.id AS factura_id,
    products.name AS producto,
    invoice_details.cantidad,
    invoices.total,
    invoices.date
FROM invoices
JOIN invoice_details ON invoices.id = invoice_details.invoice_id
JOIN products ON invoice_details.product_id = products.id
ORDER BY invoices.id DESC
";

$facturas = $conexion->query($sql);
?>

<h2 class="mb-4">Historial de Facturas</h2>

<div class="card shadow">
<div class="card-body">

<table class="table table-hover table-striped">
<thead class="table-dark">
<tr>
<th>Factura</th>
<th>Producto</th>
<th>Cantidad</th>
<th>Total</th>
<th>Fecha</th>
</tr>
</thead>

<tbody>
<?php while($row = $facturas->fetch_assoc()) { ?>
<tr>
<td><?= $row["factura_id"] ?></td>
<td><?= $row["producto"] ?></td>
<td><?= $row["cantidad"] ?></td>
<td>$<?= number_format($row["total"],2) ?></td>
<td><?= $row["date"] ?></td>
</tr>
<?php } ?>
</tbody>

</table>

</div>
</div>

</div>
</body>
</html>
