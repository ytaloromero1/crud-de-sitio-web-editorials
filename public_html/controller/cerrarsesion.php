<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio
echo '<script> window.location.href = "../view/home.php";</script>';

exit();



?>
