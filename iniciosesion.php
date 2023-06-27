
<?php
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


if (isset($_POST['iniciarsesion'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM usuarios WHERE email= '$email' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows == 1) {
            session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $email;
            $id = $row['id'];
            $nombre = $row['nombre'];
            $tienecoche = $row['tiene_coche'];
            $colorcoche = $row['color_coche'];
            $modelocoche = $row['modelo_coche'];
            $placacoche = $row['placa_coche'];
            $nombreimagen = $row['foto_perfil'];


            echo $nombre;     
            echo $id;
            echo $tienecoche;     
            echo $colorcoche;
            echo $modelocoche;     
            echo $placacoche;
            echo $nombreimagen;



            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['tiene_coche'] = $tienecoche;
            $_SESSION['color_coche'] = $colorcoche;
            $_SESSION['modelo_coche'] = $modelocoche;
            $_SESSION['placa_coche'] = $placacoche;
            $_SESSION['foto_perfil'] = $nombreimagen;



            // Los datos son válidos, el usuario existe en la base de datos


            $_SESSION['loggedin'] = true;

          //  $_SESSION['nombre'] = $nombreUsuario;

         header('Location: perfil.php');
            exit();

        } else {
            // Los datos no son válidos, el usuario no existe o las credenciales son incorrectas
            echo "Nombre de usuario o contraseña incorrectos";


        }
        
    }
}
  
$conn->close();
?>