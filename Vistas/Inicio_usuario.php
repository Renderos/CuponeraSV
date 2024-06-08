<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol']) || $_SESSION['rol'] != 'Usuario') {
  header("Location: Login_usuarios.php");
  exit;
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Welcome Form</title>
  <link rel="shortcut icon" type="image/png" href="../Imagenes/411714.png"/>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

<div class="align-self-center">
      <h1 style="text-align:center">Bienvenido</h1>
      <h2 style="text-align:center">te has logueado como usuario</h2>
      <form method="POST" action="../Controladores/logout.php">
      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
      <input type="submit" value="Cerrar Sesión" class="btn btn-warning btn-lg text-light my-2 py-2" style="width:20% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;">
      </div>
    
    </form>
    </div>
    </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>