<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lionel Messi - El GOAT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f4f4;
    }
    h2, h3 {
      font-weight: bold;
    }
    .section {
      padding: 60px 0;
    }
    .bg-light-blue {
      background-color: #e3f2fd;
    }
    .estadistica-card {
      border-radius: 8px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgb(31, 192, 255);
      padding: 20px;
      margin-bottom: 20px;
    }
    footer {
      background-color: #0095ff;
      color: white;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<?php include "Layout/Layout.php" ?>

<!-- Sección Biografía -->
<section id="bio" class="section bg-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-md-2">
        <img src="portada.webp" class="img-fluid rounded shadow" alt="Messi Mundial">
      </div>
      <div class="col-md-6 order-md-1">
        <h2>Vida en el Fútbol</h2>
        <p>Lionel Messi, considerado uno de los mejores futbolistas de todos los tiempos, comenzó su carrera profesional en el FC Barcelona, donde ganó múltiples títulos y rompió numerosos récords. Posteriormente, jugó en el PSG y ahora brilla en el Inter Miami. Con Argentina, logró la Copa América 2021, la Finalissima 2022 y el Mundial 2022.</p>
      </div>
    </div>
  </div>
</section>

<!-- Sección Logros -->
<section id="logros" class="section bg-light-blue">
  <div class="container">
    <h2 class="text-center mb-5">Logros Personales</h2>
    <div class="row text-center">
      <div class="col-md-4 estadistica-card">
        <h4>8 Balones de Oro</h4>
        <p>Récord histórico</p>
      </div>
      <div class="col-md-4 estadistica-card">
        <h4>91 Goles</h4>
        <p>Máxima cantidad en un año</p>
      </div>
      <div class="col-md-4 estadistica-card">
        <h4>2 Copas América</h4>
        <p>2021 y 2024</p>
      </div>
      <div class="col-md-4 estadistica-card">
        <h4>4 Champions League</h4>
        <p>Con el FC Barcelona</p>
      </div>
      <div class="col-md-4 estadistica-card">
        <h4>Máximo goleador del Barça</h4>
        <p>672 goles</p>
      </div>
      <div class="col-md-4 estadistica-card">
        <h4>Mundial 2022</h4>
        <p>Campeón del mundo</p>
      </div>
    </div>
  </div>
</section>

<!-- Estadísticas en tabla -->
<section id="estadisticas" class="section bg-white">
  <div class="container">
    <h2 class="text-center mb-4">Estadísticas por Club</h2>
    <div class="table-responsive">
      <table class="table table-bordered text-center">
        <thead class="table-dark">
          <tr>
            <th>Equipo</th>
            <th>Goles</th>
            <th>Asistencias</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>FC Barcelona</td><td>672</td><td>305</td></tr>
          <tr><td>PSG</td><td>32</td><td>35</td></tr>
          <tr><td>Inter Miami</td><td>40</td><td>33</td></tr>
          <tr><td>Argentina</td><td>106</td><td>56</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Video -->
<section id="video" class="section text-center bg-light-blue">
  <div class="container">
    <h2 class="mb-4">Modal</h2>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  TABLA REGISTRO
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered border-primary">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Edad</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
<?php	
include_once "Controller/Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();
if ($conexion){
  $sql = "SELECT * FROM registropersonas";
  $consulta = $conexion->prepare($sql);
  $consulta->execute();
  $i = 0;
  while($fila=$consulta-> fetch(PDO::FETCH_ASSOC)){
    $i += 1;
  


    
  
?>
  <div class="table-responsive">
    
      <tbody class="table-group-divider">
        <tr>
          <th scope="row"><?php $i?></td>
          <td><?php echo $fila["Nombre"]; ?></td>
          <td><?php echo $fila["Apellido"]; ?></td>
          <td><?php echo $fila["Edad"]; ?></td>
          <td><?php echo $fila["Correo"]; ?></td>
          <td><?php echo $fila["Telefono"]; ?></td>
          <td><a href="Update.php" type="button" class="btn btn-success">Editar</button></td>
          <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
        </tr>
      </tbody>

    <?php
      }}
      else {
        echo "No existe conexion";
      } 
      ?>
    </table>
  </div>
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
  </div>
</section>

<!-- Galería Carrusel -->
<section id="galeria" class="section bg-white">
  <div class="container">
    <h2 class="text-center mb-4">Galería de Messi</h2>
    <div id="carrusel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="messi copa amarica.jpg" class="d-block w-100 rounded" alt="Copa América">
        </div>
        <div class="carousel-item">
          <img src="champions messi.jpeg" class="d-block w-100 rounded" alt="Champions">
        </div>
        <div class="carousel-item">
          <img src="balon de oro.jpg" class="d-block w-100 rounded" alt="Balón de Oro">
        </div>
        <div class="carousel-item">
          <img src="mundial.webp" class="d-block w-100 rounded" alt="Mundial 2022">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </div>
</section>

<!-- Formulario centrado -->
<form action="Controller/registro.php" method="POST">

<div class="container">
  <h3>Formulario de Registro</h3>
    
      <div class="row">
        <div class="col">
        <label for="Name" class="">Id</label>
      <input type="text" class="form-control" id="Name" placeholder="Ingrese el id" name="Id">
        </div>
        <div class="col">
        <label fot="Nombre" class="">Nombre</label>
      <input type="text" class="form-control" id="Name" placeholder="Ingrese el Nombre" name="Nombre">
        </div>
      </div>
     
   <div class="row">  
    <div class="col">
    <label fot="Apellido" class="Form-label">Apellido</label>
      <input type="text" class="form-control" id="Name" placeholder="Ingrese el apellido" name="Apellido">
    </div>
    <div class="col">

    <label fot="Apellido" class="Form-label">Edad</label>
      <input type="text" class="form-control" id="Name" placeholder="Ingrese el apellido" name="Edad">
    </div>
   </div>
     
      <div class="row">
        <div class="col">
        <label fot="Apellido" class="Form-label">Correo</label>
      <input type="email" class="form-control" id="Name" placeholder="Ingrese el correo" name="Correo">
        </div>
    <div class="col">
    <label fot="Apellido" class="Form-label">Telefono</label>
      <input type="text" class="form-control" id="Name" placeholder="Ingrese el telefono" name="Telefono">

      </div>
   </div>

   <div class="d-grid gap-2 col-6 mx-auto">
<button class="btn btn-info" type="submit">Enviar</button>
<form>

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
</body>
</html>