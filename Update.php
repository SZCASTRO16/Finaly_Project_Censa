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

include_once "Controller/Conexion.php";
$con=new Conexion();
$con=$con->conectar();

if(!$con) {
    header("Location:  index.php?error="."Sin Conexion");
    exit();
}

$sql  = "SELECT * FROM `registropersonas` WHERE Id = :id";
$con=$con->prepare($sql);
$con->bindparam(':id', $id);
$con->execute();

//vereficar que un valor no lo devuelva vacio
if($con->Rowcount() == 0){
    header("Location:  index.php?error="."No existe el dato ");
    exit();
}

$registro = $con->fetch(PDO::FETCH_ASSOC);


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

        <form action="Controller/registro.php" method="POST">

<div class="container">
  <h3>Formulario de Registro</h3>
    
      <div class="row">
        <div class="col">
        <label for="Name" class="">Id</label>
      <input type="text" class="form-control" id="Name" value="<?php  echo  htmlspecialchars($registro['Id'])?>" name="Id">
        </div>
        <div class="col">
        <label fot="Nombre" class="">Nombre</label>
      <input type="text" class="form-control" id="Name" value="<?php  echo  htmlspecialchars($registro['Nombre']);?> " name="Nombre">
        </div>
      </div>
     
   <div class="row">  
    <div class="col">
    <label fot="Apellido" class="Form-label">Apellido</label>
      <input type="text" class="form-control" id="Name" value="<?php  echo  htmlspecialchars($registro['Apellido'])?>" name="Apellido">
    </div>
    <div class="col">

    <label fot="Apellido" class="Form-label">Edad</label>
      <input type="text" class="form-control" id="Name" value="<?php  echo  htmlspecialchars($registro['Edad'])?>" name="Edad">
    </div>
   </div>
     
      <div class="row">
        <div class="col">
        <label fot="Apellido" class="Form-label">Correo</label>
      <input type="email" class="form-control" id="Name" value="<?php  echo  htmlspecialchars($registro['Correo'])?>" name="Correo">
        </div>
    <div class="col">
    <label fot="Apellido" class="Form-label">Telefono</label>
      <input type="text" class="form-control" id="Name" value="<?php  echo  htmlspecialchars($registro['Telefono'])?>" name="Telefono">

      </div>
   </div>

   <div class="d-grid gap-2 col-6 mx-auto">
<button class="btn btn-info" type="submit">Enviar</button>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>Página creada sobre del GOAT MESSI © 2025</p>
    <p>Desarrollada por [SAMUEL/CASTRO] [JUAN/LOZANO]</p>
    <p>Contacto: <a href="samucastro128@gmail.com" class="text-white">juanestebanlozano123@gmail.com</a></p>
  </footer>

  <!-- Modal genérico -->
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mensajeModalLabel">Resultado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="mensajeTexto">
        <!-- Aquí va el mensaje dinámico -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/Modal.js"></script>

</div></div></form>
        <!-- ... -->
    </div>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>