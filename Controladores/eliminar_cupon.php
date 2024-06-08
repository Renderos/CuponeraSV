<?php
session_start();
include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener los datos del query string
    $id = $_GET['cupon_id'];
    $id_usuario = $_SESSION['ID_usuario'];

    // Validaciones generales
    if (empty($id)) {
        echo "<script>alert('Cupon no encontrado');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }

    // Validar que el cupon exista en el carrito
    $sql = "SELECT * FROM `carrito` WHERE `ID_cupon`='$id' AND `ID_usuario`='$id_usuario'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "<script>alert('Cupon no encontrado');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }

    $sql = "DELETE FROM `carrito` WHERE `ID_cupon`='$id' AND `ID_usuario`='$id_usuario'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cupon eliminado del carrito');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error al eliminar cupon del carrito');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }
}
