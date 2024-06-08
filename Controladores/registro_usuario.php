<?php
include_once('connection.php');

if(isset($_POST['registerUsuario']))
{
    $nombres=$_POST['Nombres'];
    $apellidos=$_POST['Apellidos'];
    $usuario=$_POST['Usuario'];
    $email=$_POST['Email'];
    $nacimiento=$_POST['Nacimiento'];
    $DUI=$_POST['DUI'];
    $pass= password_hash($_POST['Contrasena'], PASSWORD_DEFAULT);

//Validaciones
    if (empty($_POST['Nombres']) && empty($_POST['Apellidos']) && empty($_POST['Usuario'])
    && empty($_POST['Email']) && empty($_POST['Contrasena']) && empty($_POST['DUI']) && empty($_POST['Nacimiento'])) {
        echo "<script>alert('Por favor ingrese datos');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    }elseif (empty($_POST['Nombres']) ) {
        echo "<script>alert('Por favor ingrese sus nombres');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['Apellidos'])) {
        echo "<script>alert('Por favor ingrese sus apellidos');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['Usuario'])) {
        echo "<script>alert('Por favor ingrese un usuario');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['Email'])) {
        echo "<script>alert('Por favor ingrese su E-mail');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['Contrasena'])) {
        echo "<script>alert('Por favor ingrese una contraseña');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['DUI'])) {
        echo "<script>alert('Por favor ingrese su DUI');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    } elseif (empty($_POST['Nacimiento'])) {
        echo "<script>alert('Por favor ingrese su fecha de nacimiento');
        window.location.href='../vistas/Registro_usuarios.php';</script>";
        exit;
    }else{
    //Comprobación de usuario disponible
    $sql = "SELECT Usuario FROM `usuarios` WHERE `usuario`='$usuario'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<script>alert('Este usuario ya está en uso');
        window.location.href='../vistas/Registro_usuarios.php';</script>";  

    }else{

        //Insert de datos
    $sql   ="INSERT INTO `Usuarios`(`Nombres`, `Apellidos`, `Email`,`Usuario`, `Contrasena`, `DUI`,`Fecha_nacimiento`, `FK_rol`) 
    VALUES ('$nombres','$apellidos','$email','$usuario','$pass','$DUI','$nacimiento',1)";


    $result=mysqli_query($conn,$sql);
    if($result){ 
        echo "<script>alert('Usuario registrado con éxito');
        window.location.href='../vistas/login_usuarios.php';</script>";  
    }else{

        echo "<script>alert('Hubo un error en el registro');
        window.location.href='../vistas/login_usuarios.php';</script>";
        die(mysqli_error($conn)) ;

    }
    }
}
   
}
