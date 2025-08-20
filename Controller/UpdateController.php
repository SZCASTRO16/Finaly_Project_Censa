<?php  

include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

 if($conexion){
    $id = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['Correo'];
    $Edad = $_POST['Edad'];
    $Telefono = $_POST['Telefono'];

    $CONSULTA = "UPDATE registropersonas SET 
                                            Id=:id,
                                            Nombre=:Nombre,
                                            Apellido=:Apellido,
                                            Edad=:Edad,
                                            Correo=:Correo,
                                            Telefono=:Telefono
                                             WHERE Id = :id";
        $stmt = $conexion->prepare($CONSULTA);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Nombre', $Nombre);
        $stmt->bindParam(':Apellido', $Apellido);
        $stmt->bindParam(':Edad', $Edad);
        $stmt->bindParam(':Correo', $Correo);
        $stmt->bindParam(':Telefono', $Telefono);
        $stmt->execute();
        header("Location: ../Index.php?mensaje=Correcto");
        exit();

 }  
else {
    header("Location: ../Index.php?mensaje=SinConexion");
    exit();
}
?>
    