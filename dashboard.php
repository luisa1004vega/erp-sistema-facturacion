<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
include("navbar.php");
?>

<h2 class="mb-4">Bienvenido <?php echo $_SESSION["user"]; ?></h2>

<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title">Sistema ERP</h5>
        <p class="card-text">El sistema esta funcionando correctamente.</p>
    </div>
</div>

</div>
</body>
</html>
