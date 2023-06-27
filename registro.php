<?php
session_start();

if (isset($_SESSION['email'])) {
    echo "Bienvenido, " . $_SESSION['email'] . "!";
} else {
    echo '<a href="login.php">Iniciar sesión</a>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Driveshare - Registro</title>
  <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
  <!-- Enlaces a archivos CSS -->
  <link rel="stylesheet" href="estilos/driveshare.css">
  <!--por si las moscas <link href="driveshare.css>"-->
  <!--fuente de letras-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Rubik+Dirt&family=Share+Tech+Mono&display=swap" rel="stylesheet">
  <!--bosstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<!--encabezaado-->
<nav class="navbar navbar-expand-md navbar-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-toggler">
      <a class="navbar-brand" href="#">
        <img src="imagenes/logo.png" width="50" alt="Logo de la pagina web">
      </a>
      <ul class="navbar-nav d-flex justify-content-center align-items-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="buscar.php">Buscar viajes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publicar.php">Publicar viaje</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perfil.php">Mi perfil</a>
        </li>
        <?php if (isset($_SESSION['email'])) {
          echo '<li class="nav-item">
            <a class="nav-link" href="cerrarsesion.php?logout=1">CERRAR SESION</a> 

          </li>';
          }
         else{
          echo'<li class="nav-item">
            <a class="nav-link" href="login.php">Iniciar sesion</a>
          </li>';
}
?>
      </ul>
      <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>
  
  <!-- Contenido principal de la página -->
  <main>
    <h1>Registro</h1>
    <form action="/enviardatospublicar.php" method="POST" >
        <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>
      
      <label for="email">Correo Electrónico:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Contraseña:</label>
      <input type="password" id="pass" name="pass" required>
      
      <div class="form-group">
        <label for="tiene-coche">¿Tienes un coche?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tiene_coche" id="tiene-coche-si" value="1" checked>
          <label class="form-check-label" for="tiene-coche-si">Sí</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tiene_coche" id="tiene-coche-no" value="0" checked>
          <label class="form-check-label" for="tiene-coche-no">No</label>
        </div>
      </div>
      
      <div id="datos-coche" style="display: none;">
        <div class="form-group">
          <label for="color-coche">Color del coche</label>
          <input type="text" class="form-control" id="color_coche" name="color_coche">
        </div>
        
        <div class="form-group">
          <label for="modelo-coche">Modelo del coche</label>
          <input type="text" class="form-control" id="modelo_coche" name="modelo_coche">
        </div>
        
        <div class="form-group">
          <label for="placa-coche">Placa del coche</label>
          <input type="text" class="form-control" id="placa_coche" name="placa_coche">
        </div>
      </div>


      <input type="submit" name="registro" value="REGISTRAR">
</form>

<script src="archivo.js"></script>

    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
  </main>
  
   <!-- Pie de página -->
   <footer class="seccion-oscura d-flex flex-column align-items-center justify-content-center"> 
    <img class="footer-logo" src="imagenes/logo.png" alt="Logo del portafolio">
    <p class="footer-texto text-center">Al Final todo estara bien y si no esta bien<br>no hemos llegamos al final</p>
    <div class="iconos-redes-sociales d-flex flex-wrap align-items-center justify-content-center">
      <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-twitter"></i>
      </a>
      <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-linkedin"></i>
      </a>
      <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-instagram"></i>
      </a>
      <a href="correofalso@gmail.com" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-envelope"></i>
      </a>
    </div>
    <div class="derechos-de-autor">2023 Driveshare. Todos los derechos reservados &#169;</div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
