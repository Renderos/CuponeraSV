<?php
include_once('connection.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $empresa = $_SESSION['ID_empresa'];
    $titulo = $_POST['titulo'];
    $precioR = $_POST['PrecioR'];
    $precioO = $_POST['PrecioO'];
    $fechaI = $_POST['FechaI'];
    $fechaF = $_POST['FechaF'];
    $fechaL = $_POST['FechaL'];
    $cantidad = $_POST['Cantidad'];
    $descripcion = $_POST['Descripcion'];
    $categoria = $_POST['Categoria'];

    // Validaciones generales
    if (empty($titulo)) {
        echo "<script>alert('Por favor ingrese un titulo');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if (empty($precioR)) {
        echo "<script>alert('Por favor ingrese un precio regular');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    } elseif (!is_numeric($precioR)) {
        echo "<script>alert('Por favor ingrese un precio regular valido');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if (empty($precioO)) {
        echo "<script>alert('Por favor ingrese un precio oferta');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    } elseif (!is_numeric($precioO)) {
        echo "<script>alert('Por favor ingrese un precio oferta valido');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if ($precioO >= $precioR) {
        echo "<script>alert('El precio oferta debe ser menor que el precio regular');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if (empty($fechaI) || empty($fechaF) || empty($fechaL)) {
        echo "<script>alert('Por favor ingrese todas las fechas solicitadas');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    $fechaInicio = strtotime($fechaI);
    $fechaFin = strtotime($fechaF);
    if ($fechaInicio > $fechaFin) {
        echo "<script>alert('La fecha de inicio debe ser menor que la fecha de fin');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    $fechaLimite = strtotime($fechaL);
    if ($fechaLimite > $fechaFin || $fechaLimite < $fechaInicio) {
        echo "<script>alert('La fecha limite debe ser menor que la fecha de fin y mayor que la fecha de inicio');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if (empty($cantidad)) {
        echo "<script>alert('Por favor ingrese una cantidad');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    } elseif (!is_numeric($cantidad)) {
        echo "<script>alert('Por favor ingrese una cantidad valida');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if (empty($descripcion)) {
        echo "<script>alert('Por favor ingrese una descripcion');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    if (empty($categoria)) {
        echo "<script>alert('Por favor ingrese una categoria');
        window.location.href='../vistas/Crear_cupon.php';</script>";
        exit;
    }

    // check if photo is included and return the path
    $photoPath = NULL;
    if (isset($_FILES['Imagen'])) {

        $target_dir = '../Imagenes/';
        $target_file = $target_dir . basename($_FILES['Imagen']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['Imagen']['tmp_name']);
        // print_r($check);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
           // alerta de error con un script
            echo "<script>alert('No se pudo subir la imagen');
            window.location.href='../vistas/Crear_cupon.php';</script>";
            exit;
        } else {
            if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $target_file)) {
                $photoPath = $target_file;
            } else {
                echo "<script>alert('No se pudo subir la imagen');
                window.location.href='../vistas/Crear_cupon.php';</script>";
                exit;
            }
        }
    }

    $sql = "INSERT INTO Cupones ( FK_empresa,Titulo_cupon,Precio_regular, Precio_oferta,Fecha_inicio_oferta, Fecha_fin_oferta, Fecha_limite_canje, 
    Cantidad_cupones, Descripcion,Imagen,FK_categoria,FK_estado_oferta) 
    VALUES ($empresa, '$titulo', ' $precioR', '$precioO', '$fechaI', '$fechaF', '$fechaL', '$cantidad', ' $descripcion', '$photoPath', '$categoria', 1)";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Cupon exitosamente');
        window.location.href='../vistas/Crear_cupon.php'; </script>";
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
