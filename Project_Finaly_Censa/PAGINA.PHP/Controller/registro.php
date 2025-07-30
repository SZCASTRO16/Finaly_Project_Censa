<?php
// Llamar la conexión
include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Cedula = $_POST['Id'];
$Correo = $_POST['Correo'];
$Edad = $_POST['Edad'];
$Telefono = $_POST['Telefono'];

if ($conexion) {
    try {
        $consulta = "INSERT INTO registropersonas(Id, Nombre, Apellido, Edad, Correo, Telefono) 
                     VALUES (:Id, :Nombre, :Apellido, :Edad, :Correo, :Telefono)";
        
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':Id', $Cedula);
        $stmt->bindParam(':Nombre', $Nombre);
        $stmt->bindParam(':Apellido', $Apellido);
        $stmt->bindParam(':Edad', $Edad);
        $stmt->bindParam(':Correo', $Correo);
        $stmt->bindParam(':Telefono', $Telefono);
        $stmt->execute();

        header("Location: ../Index.php?mensaje=Correcto");
        exit();
        
    } catch (PDOException $e) {
        // Código de error 23000 = violación de restricción (clave duplicada, etc.)
        if ($e->getCode() == 23000) {
            header("Location: ../Index.php?mensaje=Duplicado");
        } else {
            // Otro tipo de error
            header("Location: ../Index.php?mensaje=Error");
        }
        exit();
    }
} else {
    header("Location: ../Index.php?mensaje=SinConexion");
    exit();
}
?>