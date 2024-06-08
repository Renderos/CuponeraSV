<?php
session_start();
include_once('connection.php');

if (isset($_POST['login'])) {

    $usuarioForm = $_POST['usuario'];
    $contrasenaForm = $_POST['contrasena'];

    $sql = "SELECT * FROM `empresas` WHERE `usuario`='$usuarioForm'";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['usuario']) && empty($_POST['contrasena'])) {
        echo "<script>alert('Por favor ingrese usuario y contraseña');
        window.location.href='../vistas/login_empresas.php';</script>";
        exit;
    } elseif (empty($_POST['contrasena'])) {
        echo "<script>alert('Por favor ingrese contraseña');
        window.location.href='../vistas/login_empresas.php';</script>";
        exit;
    } elseif (empty($_POST['usuario'])) {
        echo "<script>alert('Por favor ingrese usuario');
        window.location.href='../vistas/login_empresas.php';</script>";
        exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $ID_empresa = $row['ID_empresa'];
            $usuario = $row['Usuario'];
            $contrasena = $row['Contrasena'];

            if ($usuario == $usuarioForm && password_verify($contrasenaForm, $contrasena)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['ID_empresa'] = $ID_empresa;
                echo "<script>alert('Bienvenido $usuario')
                window.location.href='../vistas/Crear_cupon.php';</script>";
                exit;                
            } else {
                echo "<script>alert('Usuario o contraseña invalido');
                window.location.href='../vistas/login_empresas.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Usuario o contraseña invalido');
            window.location.href='../vistas/login_empresas.php';</script>";
            exit;
        }
    }
}
