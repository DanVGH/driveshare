
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
     echo "Bienvenido, " . $_SESSION['nombre'] . "!";
  
  
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
  <title>Driveshare</title>
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
  
      <?php if (isset($_SESSION['email'])) {

  echo'
      <li class="nav-item">
        <a class="nav-link" href="buscar.php">Buscar viajes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publicar.php">Publicar viaje</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfil.php">Mi perfil</a>
      </li>';
      }else{
        echo'
        <li class="nav-item">
          <a class="nav-link" >Buscar viajes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" >Publicar viaje</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Mi perfil</a>
        </li>';
      }
?>

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

<section class="hero align-items-stretch">
<div class="hero-principal d-flex flex-column justify-content-center align-items-center">
  <img class="hero-imagen-desarrollador rounded-circle" src="imagenes/logo.png" alt="Foto de Jane Doe">
  <h1>Bienvenido a Driveshare</h1>
  <h2>Encuentra viajes compartidos con otros usuarios</h2>
</div>
<div class="hero-inferior">
  <img class="hero-inferior-imagen img-fluid" src="imagenes/imagen 1.png" alt="Monitor, laptop y logos de HTML, CSS, JavaScript y React.">
</div>
</section>

  <!-- Sobre mi -->
  <section id="sobre-mi" class="sobre-mi seccion-oscura">
    <div class="contenedor">
      <h2 class="seccion-titulo">¿Qué es Driveshare?</h2>
      <p class="seccion-texto">Driveshare es una aplicación web que permite a los usuarios compartir y buscar viajes en automóvil. Su objetivo principal es facilitar la conexión entre personas que necesitan realizar un viaje y aquellas que tienen espacio disponible en sus vehículos y están dispuestas a compartirlo.</p>
    </div>
  </section>

      <!-- Experiencia -->
      <section class="experiencia seccion-clara">
        <div class="container text-center">
          <div class="row">
            <!-- Desarrollo Web -->
            <div class="columna col-12 col-md-4">
              <i class="bi bi-car-front-fill"></i>
              <p class="experiencia-titulo">Viajes</p>
              <p>Encuentra viajes publicados </p>
              <div class="badges-contenedor">
               
              </div>
            </div>
            <!-- Articulos -->
            <div class="columna col-12 col-md-4">
              <i class="bi bi-car-front-fill"></i>
              <p class="experiencia-titulo">Viajero</p>
              <p>Perfil de viajero</p>
              <div class="badges-contenedor">
      
              </div>
            </div>
            <!-- Estudiante -->
            <div class="columna col-12 col-md-4">
              <i class="bi bi-car-front-fill"></i>
              <p class="experiencia-titulo">Experiencias</p>
              <p> </p>
              <div class="badges-contenedor">
               
              </div>
            </div>
          </div>
        </div>
      </section>
          <!-- Proyectos -->
  <section id="proyectos" class="proyectos-recientes seccion-clara d-flex flex-column">
    <h2 class="seccion-titulo texto-negro">Opciones</h2>
    <h3 class="seccion-descripcion">Puedes elegir una opcion para ser parte de esta comunidad</h3>
    <!-- Galeria de Proyectos -->
    <div class="container text-center proyectos-contenedor">
      <div class="row">
        <!-- Proyecto 1 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="proyecto">
            <img src="imagenes/paisaje1.jpg" alt="paisaje1">
            <div class="overlay">
              <p>Iniciar sesion</p>
              <div class="iconos-contenedor">
                <a href="login.html" target="_blank" rel="noopener noreferrer">
                  <i class="bi bi-person"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Proyecto 2 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="proyecto">
            <img src="imagenes/paisaje2.jpg" alt="paisaje2">
            <div class="overlay">
              <p>Registro</p>
              <div class="iconos-contenedor">
                <a href="registro.html" target="_blank" rel="noopener noreferrer">
                  <i class="bi bi-person-add"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Proyecto 3 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="proyecto">
            <img src="imagenes/paisaje3.jpg" alt="paisaje3">
            <div class="overlay">
              <p>Viajes</p>
              <div class="iconos-contenedor">
                <a href="buscar.html" target="_blank" rel="noopener noreferrer">
                  <i class="bi bi-airplane"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <section id="testimonios" class="testimonios seccion-clara">
          <h2 class="seccion-titulo">RESEÑAS</h2>
          <h3 class="seccion-descripcion">Algunas reseñas de usuarios</h3>
              <!-- Carrusel -->
    <div id="testimonios-carrusel" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <img class="testimonio-imagen rounded-circle" src="imagenes/persona1.jpg" alt="Foto de amara">
            <p class="testimonio-texto">Muy buen servicio 10/10</p>
            <div class="testimonio-info">
              <p class="cliente">Amara Lopez Mateo</p>
              <p class="cargo">Nivel 10</p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="container">
            <img class="testimonio-imagen rounded-circle" src="imagenes/cliente2.svg" alt="Foto de Nora">
            <p class="testimonio-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel iaculis urna. Fusce a ornare enim, vel interdum turpis. Sed aliquam interdum nisi a placerat.</p>
            <div class="testimonio-info">
              <p class="cliente">hgchkhkchflk</p>
              <p class="cargo">jdjjdksjndkdjhdhf</p>
            </div>
          </div>
        </div>
        
        <div class="carousel-item">
          <div class="container">
            <img class="testimonio-imagen rounded-circle" src="imagenes/cliente2.svg" alt="Foto de Nora">
            <p class="testimonio-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel iaculis urna. Fusce a ornare enim, vel interdum turpis. Sed aliquam interdum nisi a placerat.</p>
            <div class="testimonio-info">
              <p class="cliente">Nora</p>
              <p class="cargo">Gerente de DiseñaMiPáginaWeb</p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <img class="testimonio-imagen rounded-circle" src="imagenes/cliente3.svg" alt="Foto de Leonardo">
            <p class="testimonio-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel iaculis urna. Fusce a ornare enim, vel interdum turpis. Sed aliquam interdum nisi a placerat.</p>
            <div class="testimonio-info">
              <p class="cliente">Leonardo</p>
              <p class="cargo">Director de AprendeAProgramar</p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonios-carrusel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonios-carrusel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </section>


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