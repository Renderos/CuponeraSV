<!doctype html>
<html lang="en">

<head>
  <title>Registro Empresas</title>
  <link rel="shortcut icon" type="image/png" href="../Imagenes/411714.png"/>
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
          <a class="nav-link active" aria-current="page" href="Mantenimiento.php">Comida</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Mantenimiento.php">Alojamiento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Mantenimiento.php">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Mantenimiento.php">Otros</a>
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
              <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Registro para empresas</p>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  

                  <form class="mx-1 mx-md-4" action="../Controladores/registro_empresas.php" method="post">


                   <!-- Nombre -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-shop"></i> Nombre de la empresa</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-2" name="nombre" autocomplete="off" placeholder="Ingresa el nombre de la empresa" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <!-- NIT -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-shop-window"></i> NIT</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-2" name="nit" autocomplete="off" placeholder="Ingresa el NIT con guiones" style="border-radius:25px ;" />

                      </div>
                    </div>


                    <!-- Telefono -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-telephone-fill"></i> Telefono de empresa</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-2" name="telefono" autocomplete="off" placeholder="Ingresa el telefono de la empresa" style="border-radius:25px ;" />

                      </div>
                    </div>


                    <!-- Usuario -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-person-circle"></i> Usuario</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-2" name="usuario" autocomplete="off" placeholder="Ingresa el usuario que deseas " style="border-radius:25px ;" />

                      </div>
                    </div>


                    <!-- E-mail -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"><i class="bi bi-envelope-at-fill"></i> Email</label>
                        <input type="email" id="form3Example3c" class="form-control form-control-lg py-2" name="email" autocomplete="off" placeholder="Escribe el E-mail de la empresa" style="border-radius:25px ;" />

                      </div>
                    </div>

                    
                    <!-- Contraseña -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Contraseña</label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-2" name="contrasena" autocomplete="off" placeholder="Escribe una contraseña" style="border-radius:25px ;" />
                      </div>
                    </div>

 

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Registrar empresa" name="register" class="btn btn-primary btn-lg text-light my-2 py-2" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />

                    </div>

                  </form>
                  <p align="center">¿Ya tienes una cuenta de empresa? <a href="Login_empresas.php" class="text-primary" style="font-weight:600; text-decoration:none;">Login Empresas</a></p>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="../Imagenes/Business.png" class="img-fluid" alt="Sample image" height="300px" width="500px">

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