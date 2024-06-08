<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol']) || $_SESSION['rol'] != 'Administrador') {
    header("Location: Login_usuarios.php");
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Reporte de ventas</title>
    <link rel="shortcut icon" type="image/png" href="../Imagenes/411714.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Inicio_admin.php">
                <img src="../Imagenes/411714.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Regresar
            </a>
        </div>
    </nav>

    <div class="align-self-center">
        <br>
        <br>
        <h1 style="text-align:center">Reporte de ventas</h1>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID_empresa</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Total de cupones vendidos</th>
                                <th scope="col">Total de ganancias obtenidas (CuponeraSV)</th>
                                <th scope="col">Total de ventas por empresa</th>
                                <th scope="col">Total de ganancias por empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('../Controladores/connection.php');

                            $sql = "select e.ID_empresa, e.Nombre, COUNT(ce.ID_codigo) as Total_cupones, SUM(c.Precio_oferta) as ganancias_empresa,
                                SUM(c.Precio_oferta) * e.Comision / 100 as ganacias_cuponera from codigos_emitidos ce left join cupones c on
                                c.ID_cupon = ce.FK_cupon left join empresas e on e.ID_empresa = c.FK_empresa group by e.ID_empresa";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['ID_empresa'] . "</td>";
                                echo "<td>" . $row['Nombre'] . "</td>";
                                echo "<td>" . $row['Total_cupones'] . "</td>";
                                echo "<td>" . "$ " . number_format($row['ganacias_cuponera'], 2) . "</td>";
                                echo "<td>" . "$ " . number_format($row['ganancias_empresa'], 2) . "</td>";
                                echo "<td>" . "$ " . number_format($row['ganancias_empresa'] - $row['ganacias_cuponera'], 2) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>