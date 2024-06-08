<?php
session_start();
include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener los datos del query string
    $id = $_GET['cupon_id'];
    $cantidad = $_GET['cantidad'];
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

    // Validar que la cantidad sea mayor a 0
    if ($cantidad <= 0) {
        echo "<script>alert('Cantidad debe ser mayor a 0');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }

    // validar que la cantidad no sea mayor que la cantidad en la tabla cupones
    $sql = "SELECT * FROM `cupones` WHERE `ID_cupon`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($cantidad > $row['Cantidad_cupones']) {
        echo "<script>alert('Cantidad debe ser menor o igual a la cantidad en la tabla cupones');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }
    
    $sql = "UPDATE `carrito` SET `cantidad`='$cantidad' WHERE `ID_cupon`='$id' AND `ID_usuario`='$id_usuario'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cantidad actualizada');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error al actualizar cantidad');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }
}
