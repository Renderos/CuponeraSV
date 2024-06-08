<?php
include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $nit = $_POST['nit'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $pass = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);


    //Validaciones
    if (empty($_POST['nombre']) && empty($_POST['nit']) && empty($_POST['telefono'])
    && empty($_POST['email'])  && empty($_POST['usuario']) && empty($_POST['contrasena'])) {
        echo "<script>alert('Por favor ingrese datos');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    }elseif (empty($_POST['nombre']) ) {
        echo "<script>alert('Por favor ingrese el nombre de la empresa');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    } elseif (empty($_POST['nit'])) {
        echo "<script>alert('Por favor ingrese el NIT de la empresa');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    
    } elseif (empty($_POST['telefono'])) {
        echo "<script>alert('Por favor ingrese el telefono de la empresa');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    } elseif (empty($_POST['email'])) {
        echo "<script>alert('Por favor el email de la empresa');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    } elseif (empty($_POST['usuario'])) {
        echo "<script>alert('Por favor ingrese un usuario');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    } elseif (empty($_POST['contrasena'])) {
        echo "<script>alert('Por favor ingrese una contraseña');
        window.location.href='../vistas/Registro_empresas.php';</script>";
        exit;
    }else{
    //Comprobación de usuario disponible
    $sql = "SELECT Usuario FROM `empresas` WHERE `usuario`='$usuario'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<script>alert('Este usuario ya está en uso');
        window.location.href='../vistas/login_empresas.php';</script>";  

    }else{


    $sql = "INSERT INTO Empresas (Nombre, NIT, Direccion, Telefono, Email, Usuario, Contrasena, FK_estado_aprobacion, Comision) VALUES ('$nombre', '$nit', 'Text', '$telefono', '$email', '$usuario', '$pass', '1', '0.00')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Compañia registrada exitosamente');
            window.location.href='../vistas/login_empresas.php';</script>";
        exit;
    } else {
        die(mysqli_error($conn));
    }
    }
}
}
