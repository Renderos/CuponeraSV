<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>CuponeraSV</title>
  <link rel="shortcut icon" type="image/png" href="../Imagenes/411714.png" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- partial:index.partial.html -->
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

        <a class="nav-link active" style="margin-right: 20px; font-size:25px;" aria-current="page" href="Carritodecompras.php"><i class="bi bi-cart4"></i></a>

        <form class="d-flex">
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a class="btn btn-warning" href="Login_usuarios.php" role="button">Usuarios</a>
            <a class="btn btn-primary" href="Login_empresas.php" role="button">Empresas</a>
          </div>
        </form>
      </div>
    </div>
  </nav>




  <?php
  include_once('connection.php');

  $query = "SELECT * From Cupones where FK_categoria = '1'";
  $query_run = mysqli_query($conn, $query);
  $check = mysqli_num_rows($query_run) > 0;

  if ($check) {
    while ($row = mysqli_fetch_assoc($query_run)) {
  ?>
      <div class="container py-5">

        <div class="card-group">
          <div class="card">
            <img src="../ImageneCupones/<?php echo $row['Imagen']; ?>" class="card-img-top" alt="sin imagen">
            <div class="card-body">
              <h4 class="card-title"> <?php echo $row['Titulo_cupon']; ?> </h4>
              <p class="card-title"> <?php echo "Precio antes: $" . $row['Precio_regular']; ?> </h3>
              <p class="card-title"> <?php echo "Precio oferta: $" . $row['Precio_oferta']; ?> </p>
              <p class="card-title"> <?php echo "Hasta: " . $row['Fecha_fin_oferta']; ?></p>
              <p class="card-title"> <?php echo $row['Descripcion']; ?> </p>

              <?php if (isset($_SESSION['ID_usuario'])) { ?>        
                <a href="../Controladores/agregar_carrito.php?cupon_id=<?php echo $row['ID_cupon']; ?>&pagina=Comida" class="btn btn-warning">Agregar al carrito</a>
              <?php } else { ?>
                <a href="Login_usuarios.php" class="btn btn-warning">Agregar al carrito</a>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
  <?php
    }
  } else {
    echo "Aun no hay cupones";
  }
  ?>
</body>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

</body>

</html>