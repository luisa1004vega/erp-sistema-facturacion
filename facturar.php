<?php
include("conexion.php");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];

    $consulta = $conexion->query("SELECT * FROM products WHERE id=$producto");
    $p = $consulta->fetch_assoc();

    if (!$p) {
        echo "<div class='alert alert-danger'>Producto no encontrado</div>";
    } elseif ($cantidad > $p["stock"]) {
        echo "<div class='alert alert-danger'>Stock insuficiente</div>";
    } else {

        $total = $p["price"] * $cantidad;

        $conexion->query("INSERT INTO invoices (user_id, total)
                          VALUES (1, $total)");

        $invoice_id = $conexion->insert_id;

        $conexion->query("INSERT INTO invoice_details 
            (invoice_id, product_id, cantidad, precio_unitario)
            VALUES ($invoice_id, $producto, $cantidad, {$p["price"]})");

        $conexion->query("UPDATE products
                          SET stock = stock - $cantidad
                          WHERE id=$producto");

        echo "<div class='alert alert-success'>
                Factura generada correctamente. Total: $".number_format($total,2)."
              </div>";
    }
}

// 🔥 ESTA CONSULTA VA DESPUES DEL POST
$productos = $conexion->query("SELECT * FROM products WHERE stock > 0");
?>

<h2 class="mb-4">Crear Factura</h2>

<div class="card shadow">
<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Producto</label>
<select class="form-select" name="producto" required>

<?php if ($productos->num_rows > 0) { ?>
    <?php while($row = $productos->fetch_assoc()) { ?>
        <option value="<?= $row['id'] ?>">
            <?= $row['name'] ?> - Stock: <?= $row['stock'] ?>
        </option>
    <?php } ?>
<?php } else { ?>
    <option value="">No hay productos disponibles</option>
<?php } ?>

</select>
</div>

<div class="mb-3">
<label class="form-label">Cantidad</label>
<input class="form-control" type="number" name="cantidad" min="1" required>
</div>

<button class="btn btn-success">Generar Factura</button>

</form>

</div>
</div>

</div>
</body>
</html>
