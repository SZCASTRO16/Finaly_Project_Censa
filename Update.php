<?php

if(!isset($_GET['id']) || empty($_GET['id'])){
    header("Location: index.php?error"."Invalid ID");
    exit();
}
$id= $_GET['id'];

?>
<?php 

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?error="."Invalid ID");
    exit();
}
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'Layout/Layout.php'; ?>
    <div class="container mt-5">
        <!-- Aquí va el contenido de tu página, por ejemplo el formulario de actualización -->
        <h2>Actualizar Registro</h2>
        <!-- ... -->
    </div>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>