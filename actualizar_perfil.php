



<?php
session_start();
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


// Verificar si se ha enviado una imagen
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
  // Obtener información del archivo
  $nombreArchivo = $_FILES['foto_perfil']['name'];
  $tipoArchivo = $_FILES['foto_perfil']['type'];
  $rutaTemporal = $_FILES['foto_perfil']['tmp_name'];

  // Definir la ubicación donde se guardará la imagen
  $directorioDestino = 'imagenes/'; // Ruta donde se guardarán las imágenes

  // Generar un nombre único para la imagen
  $nombreUnico = uniqid() . '_' . $nombreArchivo;

  // Mover la imagen del directorio temporal al directorio de destino
  if (move_uploaded_file($rutaTemporal, $directorioDestino . $nombreUnico)) {
    // La imagen se ha movido correctamente

    // Guardar el nombre de la imagen en la base de datos para el usuario actual
    $nombreImagen = $directorioDestino . $nombreUnico;
    $id = $_SESSION['id'];

    // Realizar la consulta SQL para actualizar la columna "foto_perfil" en la tabla de usuarios
    $query = "UPDATE usuarios SET foto_perfil = '$nombreImagen' WHERE id = $id";
    // Ejecutar la consulta...
    $resultado = mysqli_query($conn, $query);
    // Verificar si la consulta se ejecutó correctamente y mostrar un mensaje
    if ($resultado) {
      echo "La foto de perfil se ha actualizado correctamente.";
    //  header('Location: perfil.php' );

    } else {
      echo "Error al actualizar la foto de perfil.";
    }
  } else {
    echo "Error al mover la imagen al directorio de destino.";
  }
}



$conn->close();
?>
