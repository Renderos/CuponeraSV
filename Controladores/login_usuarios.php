<?php
session_start();
include_once('connection.php');

if (isset($_POST['login'])) {

    $usuarioForm = $_POST['usuario'];
    $contrasenaForm = $_POST['contrasena'];

    $sql = "SELECT * FROM `usuarios` INNER JOIN `roles` ON `usuarios`.`FK_rol`=`roles`.`ID_rol` WHERE `usuario`='$usuarioForm'";
    
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['usuario']) && empty($_POST['contrasena'])) {
        echo "<script>alert('Por favor ingrese usuario y contraseña');
        window.location.href='../vistas/login_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['contrasena'])) {
        echo "<script>alert('Por favor ingrese contraseña');
        window.location.href='../vistas/login_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['usuario'])) {
        echo "<script>alert('Por favor ingrese su usuario');
        window.location.href='../vistas/login_usuarios.php';</script>";
        exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $rol = $row['Rol'];
            $usuario = $row['Usuario'];
            $contrasena = $row['Contrasena'];   

            if ($usuario == $usuarioForm && password_verify($contrasenaForm, $contrasena)) {
                $_SESSION['ID_usuario'] = $row['ID_usuario'];
                $_SESSION['usuario'] = $usuario;
                $_SESSION['rol'] = $rol;

                if ($rol == 'Administrador') {
                    echo "<script>alert('Bienvenido administrador $usuario')
                    window.location.href='../vistas/Inicio_admin.php';</script>";
                    exit;
                }


                echo "<script>alert('Bienvenido $usuario')
                    window.location.href='../Index.php';</script>";


                exit;
            } else {
                echo "<script>alert('Usuario o contraseña invalido');
                window.location.href='../vistas/login_usuarios.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Usuario o contraseña invalido');
            window.location.href='../vistas/login_usuarios.php';</script>";

            exit;
        }
    }
}
