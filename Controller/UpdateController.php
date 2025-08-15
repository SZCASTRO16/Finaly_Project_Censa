<?php  

include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

 if($conexion){
    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['Correo'];
    $Edad = $_POST['Edad'];
    $Telefono = $_POST['Telefono'];

    $CONSULTA = "UPDATE registropersonas SET 
                                            Id='$id',
                                            Nombre='$Nombre',
                                            Apellido='$Apellido',
                                            Edad='$Edad',
                                            Correo='$Correo',
                                            Telefono='$Telefono'
                                             WHERE Id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':Id', $id);
        $stmt->bindParam(':Nombre', $Nombre);
        $stmt->bindParam(':Apellido', $Apellido);
        $stmt->bindParam(':Edad', $Edad);
        $stmt->bindParam(':Correo', $Correo);
        $stmt->bindParam(':Telefono', $Telefono);
        $stmt->execute();

 }
 header("Location: ../Index.php?mensaje=Correcto");
        exit();
        
    catch (PDOException $e) {
        // Código de error 23000 = violación de restricción (clave duplicada, etc.)
        if ($e->getCode() == 23000) {
            header("Location: ../Index.php?mensaje=Duplicado");
        } else {
            // Otro tipo de error
            header("Location: ../Index.php?mensaje=Error");
        }
        exit();
    }
else {
    header("Location: ../Index.php?mensaje=SinConexion");
    exit();
}
?>
 $sql = "UPDATE registropersonas SET Nombre = :Nombre, Apellido = :Apellido, Edad = :Edad, Correo = :Correo, Telefono = :Telefono WHERE Id = :Id";
 $stmt = $conexion->prepare($sql);      