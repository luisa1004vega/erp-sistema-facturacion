<?php
session_start();
include("conexion.php");

if ($_POST) {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["user"] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Usuario incorrecto";
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card p-4">
        <h2>Login</h2>

        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="POST">
            <input class="form-control mb-2" type="text" name="username" placeholder="Usuario">
            <input class="form-control mb-2" type="password" name="password" placeholder="Contraseña">
            <button class="btn btn-success">Ingresar</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</div>
