<?php
session_start();
include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener los datos del query string
    $id_usuario = $_SESSION['ID_usuario'];

    // crear factura con la fecha actual, cantidad total del carrito y el id del usuario
    $sql = "INSERT INTO `facturas` (`Fecha_compra`, `Monto`, `FK_usuario`) VALUES (NOW(), 0, '$id_usuario')";

    if (mysqli_query($conn, $sql)) {
        // obtener el id de la factura recien creada
        $id_factura = mysqli_insert_id($conn);

        // obtener los cupones del carrito
        $sql = "SELECT * FROM `carrito` WHERE `ID_usuario`='$id_usuario'";
        $result = mysqli_query($conn, $sql);

        // recorrer los cupones del carrito
        while ($row = mysqli_fetch_assoc($result)) {
            // obtener el cupon
            $id_cupon = $row['ID_cupon'];
            $cantidad = $row['cantidad'];

            // obtener el cupon de la tabla cupones
            $sql = "SELECT * FROM `cupones` WHERE `ID_cupon`='$id_cupon'";
            $result2 = mysqli_query($conn, $sql);
            $row2 = mysqli_fetch_assoc($result2);

            // validar que la cantidad del carrito no sea mayor a la cantidad en la tabla cupones
            if ($cantidad > $row2['Cantidad_cupones']) {
                echo "<script>alert('Cantidad debe ser menor o igual a la cantidad en la tabla cupones');
                window.location.href='../vistas/Carritodecompras.php';</script>";
                exit;
            }

            // crear los cupones con codigos unicos en la tabla de codigos_emitidos con el id de la factura y el id del cupon
            for ($i = 0; $i < $cantidad; $i++) {
                $codigo = uniqid();
                $sql = "INSERT INTO `codigos_emitidos` (`Codigo`, `FK_factura`, `FK_cupon`) VALUES ('$codigo', '$id_factura', '$id_cupon')";
                mysqli_query($conn, $sql);
            }

            // actualizar cantidad de cupones en la tabla cupones
            $sql = "UPDATE `cupones` SET `Cantidad_cupones`=`Cantidad_cupones`-'$cantidad' WHERE `ID_cupon`='$id_cupon'";
            mysqli_query($conn, $sql);
        }

        // actualizar el monto de la factura
        $sql = "UPDATE `facturas` SET `Monto`=`Monto`+'$cantidad' WHERE `ID_factura`='$id_factura'";
        mysqli_query($conn, $sql);
        // eliminar los cupones del carrito
        $sql = "DELETE FROM `carrito` WHERE `ID_usuario`='$id_usuario'";
        mysqli_query($conn, $sql);

        echo "<script>alert('Compra realizada con exito');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error al realizar compra');
        window.location.href='../vistas/Carritodecompras.php';</script>";
        exit;
    }


}
