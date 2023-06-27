<?php

session_start();


// Cerrar sesión
session_unset();
session_destroy();

// Redireccionar a la misma página
if (isset($_GET['logout'])) {
header('Location: perfil.php ');
exit;
}
?>