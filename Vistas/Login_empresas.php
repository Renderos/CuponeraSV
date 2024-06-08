<!doctype html>
<html lang="en">

<head>
  <title>Login Empresas</title>
  <link rel="shortcut icon" type="image/png" href="../Imagenes/411714.png"/>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
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



  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-7 col-lg-6 col-xl-5">
          <img src="../Imagenes/Business.png" class="img-fluid" alt="Phone image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="../Controladores/login_empresas.php" method="post">
            <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Login para empresas</p>
            <!-- Email -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13"> <i class="bi bi-person-circle"></i> Usuario</label>
              <input type="text" id="form1Example13" class="form-control form-control-lg py-3" name="usuario" autocomplete="off" placeholder="Ingresa tu usuario" style="border-radius:25px ;" />

            </div>

            <!-- Contrasena -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i> Contraseña</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg py-3" name="contrasena" autocomplete="off" placeholder="Ingresa tu contraseña" style="border-radius:25px ;" />

            </div>


            <!-- Bonton entrar -->
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Entrar" name="login" class="btn btn-primary btn-lg text-light my-2 py-2" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />

                    </div>

          </form><br>
          <p align="center">Si no tienes una cuenta <a href="Registro_empresas.php" class="text-primary" style="font-weight:600;text-decoration:none;">Registra tu empresa aquí</a></p>
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