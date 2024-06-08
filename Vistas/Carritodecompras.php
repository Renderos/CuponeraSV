<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Carrito de compras</title>
  <link rel="shortcut icon" type="image/png" href="../Imagenes/411714.png" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../Index.php">
        <img src="../Imagenes/Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        CuponeraSV
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Comida.php">Comida</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Alojamiento.php">Alojamiento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Servicios.php">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Otros.php">Otros</a>
          </li>
        </ul>
        <form class="d-flex">
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a class="btn btn-warning" href="Login_usuarios.php" role="button">Usuarios</a>
            <a class="btn btn-primary" href="Login_empresas.php" role="button">Empresas</a>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <div class="align-self-center">
    <br>
    <br>
    <h1 style="text-align:center">Carrito de compras</h1>
    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID_cupon</th>
                <th scope="col">Título</th>
                <th scope="col">Precio oferta</th>
                <th scope="col">Total</th>
                <th scope="col">Cantidad</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once('../Controladores/connection.php');

              $sql = "select cupones.ID_cupon, cupones.Titulo_cupon, cupones.Precio_oferta, carrito.cantidad * cupones.Precio_oferta AS Precio_total, carrito.cantidad from
                      carrito inner join cupones on carrito.ID_cupon  = cupones.ID_cupon  where carrito.ID_usuario =" . $_SESSION['ID_usuario'];

              $result = mysqli_query($conn, $sql);
              $num_filas = 0;
              while ($row = mysqli_fetch_array($result)) {
                $num_filas++;
                echo "<tr>";
                echo "<td>" . $row['ID_cupon'] . "</td>";
                echo "<td>" . $row['Titulo_cupon'] . "</td>";
                echo "<td>" . "$" . $row['Precio_oferta'] . "</td>";
                echo "<td>" . "$" . $row['Precio_total'] . "</td>";

                echo "<td>" . "<input type='number' name='Cantidad' value='" . $row['cantidad'] . "' class='form-control' aria-label='Default select example' style='width: 30%; display: inline-grid;' min='1'>" . "</td>";

                echo "<td>" . "<button type='button' class='btn btn-primary' onclick='actualizarCantidad(" . $num_filas . "," . $row['ID_cupon'] . ")'>Actualizar</button>" . "</td>";

                echo "<td style='d'>" . "<button type='button' class='btn btn-danger' onclick='eliminarCupon(" . $row['ID_cupon'] . ")'>Eliminar</button>" . "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col" style="display:flex; justify-content:center;">
          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="pagar()">Pagar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function actualizarCantidad(fila, id) {
      var cantidad = document.getElementsByName("Cantidad")[fila - 1].value;
      window.location.href = "../Controladores/actualizar_cantidad.php?cupon_id=" + id + "&cantidad=" + cantidad;
    }

    // funcion para eliminar un cupon del carrito
    function eliminarCupon(id) {
      window.location.href = "../Controladores/eliminar_cupon.php?cupon_id=" + id;
    }

    // funcion para pagar los cupones
    function pagar() {
      window.location.href = "../Vistas/Pagotarjeta.php";
    }
  </script>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>