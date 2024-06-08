<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['ID_empresa'])) {
  echo "<script>alert('Por favor inicie sesión');
  window.location.href='../vistas/login_empresas.php';</script>";
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>crear cupón</title>
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
            <a class="nav-link active" aria-current="page" href="../vistas/Comida.php">Comida</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../vistas/Comida.php">Alojamiento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../vistas/Comida.php">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../vistas/Comida.php">Otros</a>
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


  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Crear cupón</p>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">



                  <form class="mx-1 mx-md-4" action="../Controladores/Insertar_cupon.php" method="post" enctype="multipart/form-data">


                    <!-- titulo -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-ticket-perforated"></i> Titulo del cupón </label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-2" name="titulo" autocomplete="off" placeholder="Titulo" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <!-- precio r-->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-ticket-perforated"></i>Precio regular</label>
                        <input type="number" id="form3Example1c" class="form-control form-control-lg py-2" name="PrecioR" autocomplete="off" placeholder="Precio regular" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <!-- precio oferta-->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-ticket-perforated"></i>Precio oferta</label>
                        <input type="number" id="form3Example1c" class="form-control form-control-lg py-2" name="PrecioO" autocomplete="off" placeholder="Precio oferta" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <!-- Fecha inicio -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-calendar fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-calendar-date"></i> Fecha inicio</label>
                        <input type="date" id="datepicker" class="form-control form-control-lg py-2" name="FechaI" autocomplete="off" placeholder="Mes / Día / Año" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <!-- Fecha fin -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-calendar fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-calendar-date"></i> Fecha final </label>
                        <input type="date" id="datepicker" class="form-control form-control-lg py-2" name="FechaF" autocomplete="off" placeholder="Mes / Día / Año" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <!-- Fecha limite -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-calendar fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-calendar-date"></i> Fecha limite de canje</label>
                        <input type="date" id="datepicker" class="form-control form-control-lg py-2" name="FechaL" autocomplete="off" placeholder="Mes / Día / Año" style="border-radius:25px ;" />

                      </div>
                    </div>


                    <!-- cantidad -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-123"></i> Cantidad de cupones</label>
                        <select class="form-select" aria-label="Default select example" name="Cantidad">

                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="25">25</option>
                        </select>
                      </div>
                    </div>


                    <!-- descripcion -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-card-text"></i> Descripción</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-2" name="Descripcion" autocomplete="off" placeholder="Descripción " style="border-radius:25px ;" />

                      </div>
                    </div>


                    <!-- imagen-->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"><i class="bi bi-card-image"></i> Imagen</label>
                        <input type="file" id="Imagen" class="form-control form-control-lg py-2" name="Imagen" autocomplete="off" placeholder="Escribe el E-mail de la empresa" style="border-radius:25px ;" />

                      </div>
                    </div>


                    <!-- Categoria -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Categoria</label>
                        <select class="form-select" aria-label="Default select example" name="Categoria">

                          <option value="1">Comida</option>
                          <option value="2">Alojamiento</option>
                          <option value="3">Servicios</option>
                          <option value="4">Otros</option>
                        </select>
                      </div>
                    </div>



                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Crear cupón" name="Rcupon" class="btn btn-warning btn-lg text-light my-2 py-2" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />

                    </div>

                  </form>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>