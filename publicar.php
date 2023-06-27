<?php
session_start();

if (isset($_SESSION['id'])) {
   // Obtener los datos del usuario desde la variable de sesión
   $nombre = $_SESSION['nombre'];
   $email= $_SESSION['email'];
   $id= $_SESSION['id'];
   $tienecoche = $_SESSION['tiene_coche'];
   $colorcoche= $_SESSION['color_coche'];
   $modelocoche= $_SESSION['modelo_coche'];
   $placacoche= $_SESSION['placa_coche'];
   $nombreimagen = $_SESSION['foto_perfil'];


}else {
   // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
   header('Location: login.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Driveshare - Publicar Viaje</title>
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
    <h1>Publicar Viaje</h1>
    <form action="/enviardatospublicar.php" method="POST" class="search-form">
      <label for="from">De donde:</label>
      <input type="text" id="from" name="from" required>
      
      <label for="to">A donde:</label>
      <input type="text" id="to" name="to" required>
      
      <label for="cooperation">Monto de cooperación:</label>
      <input type="number" id="cooperation" name="cooperation" required>
      
      <label for="capacity">Cantidad de usuarios que puede recibir:</label>
      <input type="number" id="capacity" name="capacity" required>
      
      <label for="departure">Hora de salida:</label>
      <input type="time" id="departure" name="departure" required>
      
      <label for="description">Descripción breve :</label>
<textarea id="description" name="description" maxlength="50" required></textarea>

<input type="submit" name="publicar_viaje" value="Publicar viaje">

</form>
 
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