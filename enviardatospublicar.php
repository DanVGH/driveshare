<?php
include('generarpdf/tcpdf.php');
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

$servername = "localhost";
$username = "root";
$password = "";
$database = "driveshare";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Comprobar si la conexión es exitosa
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

echo '
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <link rel="stylesheet" href="driveshare.css">
    <!--por si las moscas <link href="driveshare.css>"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Rubik+Dirt&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <!--bosstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
';


if(!isset($_POST['iniciarsesion'])){
echo '
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
        <a class="nav-link" href="perfil.php">Mi perfil</a>';
     if (isset($_SESSION['email'])) {
          echo '<li class="nav-item">
            <a class="nav-link" href="cerrarsesion.php?logout=1">CERRAR SESION</a> 

          </li>';
          }
         else{
          echo'<li class="nav-item">
            <a class="nav-link" href="login.php">Iniciar sesion</a>
          </li>';
        }
echo' </ul>
    <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>-->
    </div>
    </div>
    </nav>
';


if (isset($_POST['publicar_viaje'])) {
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $from = $_POST["from"];
      $to = $_POST["to"];
      $cooperation = $_POST["cooperation"];
      $capacity = $_POST["capacity"];
      $departure = $_POST["departure"];
      $description = $_POST["description"];
  
      $sql = "INSERT INTO Viajes (id_usuario, origen, destino, monto_cooperacion, cupo, hora_salida, descripcion) 
              VALUES ('$id','$from', '$to', $cooperation, $capacity, '$departure', '$description')";
      if ($conn->query($sql) === TRUE) {
          //echo '<div class="success-message">El viaje se ha publicado exitosamente.</div>';
          $message = "El viaje se ha publicado exitosamente";
      } else {
          //echo "Error al publicar el viaje: " . $conn->error;
          $message = "Error al publicar el viaje";
      }
          echo '
          <section class="hero align-items-stretch">
              <div class="hero-principal d-flex flex-column justify-content-center align-items-center">
              <img class="hero-imagen-desarrollador rounded-circle" src="imagenes/logo.png" alt="Foto de Jane Doe">';
          echo "<h2>$message</h2>";
          echo'
              <button type="button" class="btn btn-primary btn-lg">Volver al inicio</button>
              </div>
              <div class="hero-inferior">
              <img class="hero-inferior-imagen img-fluid" src="imagenes/imagen 1.png" alt="Monitor, laptop y logos de HTML, CSS, JavaScript y React.">
              </div>
          </section>' . $conn->error;
  }
  }
  
  if (isset($_POST['registro'])) {
   
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nombre = $_POST["nombre"];
          $email = $_POST["email"];
          $pass = $_POST["pass"];
          $tienecoche = $_POST["tiene_coche"];
          $colorcoche = $_POST["color_coche"];
          $modelocoche = $_POST["modelo_coche"];
          $placacoche = $_POST["placa_coche"];
      
          $sql = "INSERT INTO usuarios (nombre, email, pass, tiene_coche, color_coche, modelo_coche, placa_coche) 
                  VALUES ('$nombre', '$email', '$pass', '$tienecoche', '$colorcoche', '$modelocoche', '$placacoche')";
      
          if ($conn->query($sql) === TRUE) {
              //echo '<div class="success-message">Te has registrado exitosamente.</div>';
              echo'
                  <main>
                      <h1>Te has registrado exitosamente</h1>
                      <div class="user-profile">
                      <img src="profile-image.png" alt="Foto de perfil">';
                  echo "<h2>$nombre</h2>";
                  echo "<p>Correo Electrónico: $email</p>";
              echo'
                      </div>
                  </main>';
                  //header('Location: login.php');

                  
          } 
          else {
              //echo "Error al registrarse " . $conn->error;
          echo'
          <section class="hero align-items-stretch">
              <div class="hero-principal d-flex flex-column justify-content-center align-items-center">
                  <img class="hero-imagen-desarrollador rounded-circle" src="imagenes/logo.png" alt="Foto de Jane Doe">
                  <h2>Error al registrarse</h2>
                  <button type="button" class="btn btn-primary btn-lg">Volver al inicio</button>
              </div>
              <div class="hero-inferior">
                  <img class="hero-inferior-imagen img-fluid" src="imagenes/imagen 1.png" alt="Monitor, laptop y logos de HTML, CSS, JavaScript y React.">
              </div>
          </section>'. $conn->error;
          }
      }
      }
  
  

      if (isset($_GET['agregado'])) {
        $idViajeAgregado = $_GET['agregado'];
        // Muestra un mensaje de éxito o realiza cualquier otra acción
        echo '<div class="hero-principal d-flex flex-column justify-content-center align-items-center">
        <h1>Viaje Agregado con ID:</h1>';
        echo '<h1>';
        echo $idViajeAgregado;
        echo'</h1>';        
        echo '<h2>Encuentra viajes compartidos con otros usuarios</h2>
      </div>';


        $sql = "SELECT * FROM viajes WHERE id= $idViajeAgregado ";
        $result = mysqli_query($conn, $sql);
    
        echo "<h2>Resultados de búsqueda</h2>";
      
    // Verificar si se encontraron resultados

      if (mysqli_num_rows($result) > 0) {
      // Iterar sobre los resultados obtenidos y mostrarlos
      echo '
      <table class="table table-hover">
      <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Hora</th>
            <th scope="col">Cooperacion</th>
            <th scope="col">Cupo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Detalles</th>
            


          </tr>
        </thead>
        <tbody class="table-group-divider">
        ';
        $contador = 0;
      while ($row = mysqli_fetch_assoc($result)) {
          // Imprimir los detalles del viaje, por ejemplo:
          echo '<tr>';
            echo "<th scope=\"row\">" . $contador . "</th>";
            echo "<td>" . $row['origen'] . "</td>";
            echo "<td>" . $row['destino'] . "</td>";
            echo "<td>" . $row['hora_salida'] . "</td>";
            echo "<td>" . $row['monto_cooperacion'] . "</td>";
            echo "<td>" . $row['cupo'] . "</td>";
            echo "<td>" . $row['fecha_publicacion'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo '<td><a href="agregarviaje.php?id=' . $row['id'] . '">Agregar</a></td>';

          echo '</tr>';
          $contador++;
          // ...continúa con los demás campos de información que desees mostrar
      }
      echo '</table>';
  } else {
      echo '
          <section class="hero align-items-stretch">
              <div class="hero-principal d-flex flex-column justify-content-center align-items-center">
                  <img class="hero-imagen-desarrollador rounded-circle" src="imagenes/logo.png" alt="Foto de Jane Doe">
                  <h2>Error al registrarse</h2>
                  <button type="button" class="btn btn-primary btn-lg">Volver al inicio</button>
              </div>
              <div class="hero-inferior">
                  <img class="hero-inferior-imagen img-fluid" src="imagenes/imagen 1.png" alt="Monitor, laptop y logos de HTML, CSS, JavaScript y React.">
              </div>
          </section>';
  }
    
    
    
    
    
    
        
    
    }







  if (isset($_POST['buscar_viaje'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener los datos del formulario
      $origen = $_POST['origen'];
      $destino = $_POST['destino'];
      echo "<h2>Resultados de búsqueda</h2>";
      echo "<p>Viajes de $origen a $destino:</p>";

      $sql = "SELECT * FROM viajes WHERE origen = '$origen' AND destino = '$destino' ";
  $result = mysqli_query($conn, $sql);
  // Verificar si se encontraron resultados

  



  if (mysqli_num_rows($result) > 0) {
      // Iterar sobre los resultados obtenidos y mostrarlos
      echo '
      <table class="table table-hover">
      <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Hora</th>
            <th scope="col">Cooperacion</th>
            <th scope="col">Cupo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Detalles</th>
            


          </tr>
        </thead>
        <tbody class="table-group-divider">
        ';
        $contador = 0;
      while ($row = mysqli_fetch_assoc($result)) {
          // Imprimir los detalles del viaje, por ejemplo:
          echo '<tr>';
            echo "<th scope=\"row\">" . $contador . "</th>";
            echo "<td>" . $row['origen'] . "</td>";
            echo "<td>" . $row['destino'] . "</td>";
            echo "<td>" . $row['hora_salida'] . "</td>";
            echo "<td>" . $row['monto_cooperacion'] . "</td>";
            echo "<td>" . $row['cupo'] . "</td>";
            echo "<td>" . $row['fecha_publicacion'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
           if($id==$row['id_usuario']){
            echo '<td><a>Agregar</a></td>';
            }else{echo '<td><a href="agregarviaje.php?id=' . $row['id'] . '">Agregar</a></td>';
}


          echo '</tr>';
          $contador++;
          // ...continúa con los demás campos de información que desees mostrar
      }
      echo '</table>';
  } else {
      echo '
          <section class="hero align-items-stretch">
              <div class="hero-principal d-flex flex-column justify-content-center align-items-center">
                  <img class="hero-imagen-desarrollador rounded-circle" src="imagenes/logo.png" alt="Foto de Jane Doe">
                  <h2>Error al registrarse</h2>
                  <button type="button" class="btn btn-primary btn-lg">Volver al inicio</button>
              </div>
              <div class="hero-inferior">
                  <img class="hero-inferior-imagen img-fluid" src="imagenes/imagen 1.png" alt="Monitor, laptop y logos de HTML, CSS, JavaScript y React.">
              </div>
          </section>';
  }
  }
  }
  
  echo'
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
  ';
  
  
}
  
  $conn->close();
  ?>