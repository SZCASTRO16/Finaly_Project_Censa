<?php
// Validar que venga el parámetro id y que no esté vacío
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?error=ID no válido");
    exit();
}

$id = $_GET['id'];

// Incluir la conexión
include_once "Controller/Conexion.php";

// Crear conexión
$con = new Conexion();
$con = $con->conectar();

if (!$con) {
    header("Location: index.php?error=Error de conexión");
    exit();
}

// Verificar que el registro exista
$sql = "SELECT * FROM registropersonas WHERE Id = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    // No existe el registro con ese ID
    header("Location: index.php?error=Registro no encontrado");
    exit();
}

// Preparar la consulta para eliminar
$sqlDelete = "DELETE FROM registropersonas WHERE Id = :id";
$stmtDelete = $con->prepare($sqlDelete);
$stmtDelete->bindParam(':id', $id);

// Ejecutar la eliminación y verificar
if ($stmtDelete->execute()) {
    header("Location: index.php?success=Registro eliminado correctamente");
    exit();
} else {
    header("Location: index.php?error=No se pudo eliminar el registro");
    exit();
}
?>