<?php
// Iniciar sesión
session_start();

// Destruir la sesión
session_destroy();

// Redirigir a una página de inicio de sesión u otra página deseada
echo "<script>alert('Sesión cerrada exitosamente');
window.location.href='../Index.php';</script>";
exit();

?>