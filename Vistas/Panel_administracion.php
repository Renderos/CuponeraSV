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
    <title>Panel de administración</title>
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
        <h1 style="text-align:center">Panel de administración</h1>
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
                                <th scope="col">Estado</th>
                                <th scope="col">Comision</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('../Controladores/connection.php');

                            $sql = "SELECT empresas.ID_empresa, empresas.Nombre, estado_aprobacion.Estado_aprobacion AS Estado, 
                            empresas.Comision FROM `empresas` INNER JOIN `estado_aprobacion` 
                            ON empresas.FK_estado_aprobacion = estado_aprobacion.ID_estado_aprobacion";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . "<input type='hidden' name='ID_empresa' value='" . $row['ID_empresa'] . "'>" . $row['ID_empresa'] . "</td>";
                                echo "<td class='nombre-empresa'>" . $row['Nombre'] . "</td>";

                                // Seleccionar los estados de aprobacion
                                $sql = "SELECT * FROM `estado_aprobacion`";
                                $result2 = mysqli_query($conn, $sql);

                                // Imprimir el estado de aprobacion en un dropdown menu, 
                                echo "<td>" . "<select class='form-select' aria-label='Default select example' style='width: 50%; display: inline-grid;'>";
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    if ($row['Estado'] == $row2['Estado_aprobacion']) {
                                        echo "<option value='" . $row2['ID_estado_aprobacion'] . "' selected>" . $row2['Estado_aprobacion'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row2['ID_estado_aprobacion'] . "'>" . $row2['Estado_aprobacion'] . "</option>";
                                    }
                                }
                                echo "</select>" . "</td>";

                                // Impresion del porcentaje de comision
                                echo "<td style='width: 20%;'>" . "<input type='text' name='Comision' value='" . $row['Comision']
                                    . "' class='form-control' aria-label='Default select example' style='width: 30%; display: inline-grid;'>" . "  %  " . "</td>";

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col" style="display:flex; justify-content:center;">
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="actualizar()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function actualizar() {
            var table = document.getElementsByTagName("table")[0];
            var tbody = table.getElementsByTagName("tbody")[0];
            var rows = tbody.getElementsByTagName("tr");
            var data = [];
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var inputs = row.getElementsByTagName("input");
                var nombre = row.getElementsByClassName("nombre-empresa")[0];
                var select = row.getElementsByTagName("select")[0];
                var row_data = {
                    id_empresa: inputs[0].value,
                    estado_aprobacion: select.value,
                    comision: inputs[1].value,
                    nombre: nombre.innerHTML
                };
                data.push(row_data);
            }
            var json = JSON.stringify(data);
            console.log(json);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controladores/actualizar_panel.php", true);
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            xhr.onload = function() {
                console.log(xhr.responseText);
                // var users = JSON.parse(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == "201") {
                    // desplegar mensaje de exito en alerta y recargar la pagina
                    alert("Datos actualizados correctamente");
                    location.reload();
                } else {
                    // desplegar mensaje de error en alerta
                    alert("Error al actualizar los datos");
                }
            }
            xhr.send(json);
        }
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>