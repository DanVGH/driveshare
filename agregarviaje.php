
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
// Obtener el ID del viaje desde la URL
$idViaje = $_GET['id'];

// Actualizar el cupo del viaje en la base de datos
$query = "UPDATE viajes SET cupo = cupo - 1 WHERE id = $idViaje";
$query2="INSERT INTO participantes(id_viaje, id_usuario) VALUES ($idViaje, $id)";


mysqli_query($conn, $query);
mysqli_query($conn, $query2);

$sql = "SELECT * FROM viajes WHERE id= $idViaje ";
$sql2="SELECT usuarios.* FROM usuarios INNER JOIN participantes ON usuarios.id= participantes.id_usuario WHERE participantes.id_viaje = $idViaje";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);


$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);

ob_start();
// Crear una instancia de TCPDF
$pdf = new TCPDF();
// Agregar una página al PDF
$pdf->AddPage();
// Definir el contenido del PDF
$contenido = 'Detalles del Viaje:' . "\n";
$contenido .= 'Origen: ' . $row['origen'] . "\n";
$contenido .= 'Destino: ' . $row['destino']. "\n";
$contenido2 = 'PARTICIPANTES:' . "\n";
$contenido2 .= 'Participante: ' . $row2['nombre']. "\n";


// Agrega aquí el resto de los datos del viaje

// Escribir el contenido en el PDF
$pdf->Write(0, $contenido);
$pdf->Write(5, $contenido2);

// Generar el archivo PDF
$pdf->Output('viaje.pdf', 'D');




//header('Location: enviardatospublicar.php?agregado=' . $idViaje);



$conn->close();
?>