<?php
session_start();
include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener los datos del query string
    $id = $_GET['cupon_id'];
    $pagina = $_GET['pagina'];
    $id_usuario = $_SESSION['ID_usuario'];

    // Validaciones generales
    if (empty($id)) {
        echo "<script>alert('Cupon no encontrado');
        window.location.href='../vistas/$pagina.php';</script>";
        exit;
    }

    // Validar que el cupon exista
    $sql = "SELECT * FROM `cupones` WHERE `ID_cupon`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "<script>alert('Cupon no encontrado');
        window.location.href='../vistas/$pagina.php';</script>";
        exit;
    }

    // Validar que el cupon no este en el carrito
    $sql = "SELECT * FROM `carrito` WHERE `ID_cupon`='$id' AND `ID_usuario`='$id_usuario'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "<script>alert('Cupon ya esta en el carrito');
        window.location.href='../vistas/$pagina.php';</script>";
        exit;
    }

    $sql = "INSERT INTO `carrito` (`ID_cupon`, `ID_usuario`, `cantidad`) VALUES ('$id', '$id_usuario', 1)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cupon agregado al carrito');
        window.location.href='../vistas/$pagina.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error al agregar cupon al carrito');
        window.location.href='../vistas/$pagina.php';</script>";
        exit;
    }
}
