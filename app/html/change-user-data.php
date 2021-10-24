<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Vinculin - Empleo</title>

    <link rel="stylesheet" href="./assets/css/maicons.css">

    <link rel="stylesheet" href="./assets/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="./assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="300">
            <div class="container">
                <a href="index.php" class="navbar-brand">Vincul<span class="text-primary">in.</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="job-form.php">Publicar empleo</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="jobs.php">Buscar empleo</a>
                        </li>
                        <li>
                            <a class="btn btn-primary ml-lg-2" href="logout.php" type="button">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <script type="text/javascript">
                function passwordValidation() {

                    //comprobar que los campos no están vacíos
                    var nombre = document.registro.NombreApellidos.value;
                    var fecha = document.registro.fNacimiento.value;
                    var password = document.registro.contra1.value;
                    var password2 = document.registro.contra2.value;
                    var dni = document.registro.dni.value;
                    var email = document.registro.Email.value;
                    var telf = document.registro.Telefono.value;

                    if (nombre === "" || fecha === "" || dni === "" || email === "" || telf === "") {
                        alert('Hay campos vacíos. Por favor rellene todos los campos.');
                        window.location.replace("change-user-data.php");
                        return;
                    }


                    //comprobar que contraseña y repite contraseña coinciden
                    if (password != password2) {
                        alert("Las contraseñas no coinciden. ");
                        window.location.replace("change-user-data.php");
                        return;
                    }
                    //comprobar que el dni cumple con el formato

                    var numero;
                    var letr;
                    var letra;
                    var expresion_regular_dni;

                    expresion_regular_dni = /^\d{8}\-+[A-Z]$/;

                    if (expresion_regular_dni.test(dni)) {
                        numero = dni.substr(0, dni.length - 2);
                        letr = dni.substr(dni.length - 1, 1);
                        numero = numero % 23;
                        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
                        letra = letra.substring(numero, numero + 1);
                        if (letra != letr.toUpperCase()) {
                            alert('Dni erroneo, la letra del NIF no se corresponde');
                            window.location.replace("change-user-data.php");
                            return;
                        }
                    } else {
                        alert('Dni erroneo, formato no válido');
                        window.location.replace("change-user-data.php");
                        return;
                    }
                    //comprobar formato correo

                    var expresion_regular_email = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
                    if (!expresion_regular_email.test(email)) {
                        alert('Email incorrecto. Siga el formato ejemplo@ejemplo.com');
                        window.location.replace("change-user-data.php");
                        return;
                    }

                    //comprobar telefono

                    var expresion_regular_telefono = /[0-9]{9}/;
                    if (!expresion_regular_telefono.test(telf)) {
                        alert('El número de teléfono solo puede contener números y debe ser de 9 dígitos.')
                        window.location.replace("change-user-data.php");
                        return;
                    }

                    document.registro.submit();
                }
            </script>
    <div class="page-section pt-5">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ul class="breadcrumb p-0 mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="datos-usuario.php">Mi perfil</a></li>

                </ul>
            </nav>          
            <div class="row">

                <?
                $hostname = "db";
                $username = "admin";
                $password = "test";
                $db = "database";
                $con = mysqli_connect($hostname, $username, $password);
                if ($con->connect_error) {
                    echo "Database connectin failed.";
                    die("Database connection failed: " . $con->connect_error);
                }
                mysqli_select_db($con, $db);
                $email = $_SESSION['usuario']['Email'];

                $datos = mysqli_query($con, "SELECT * FROM Usuario WHERE Email='$email'");
                $row = mysqli_fetch_array($datos);
                ?>
                <div class="comment-form-wrap pt-5">
                    <h2 class="mb-5">Datos de usuario</h2>
                    <form name="registro" action="update-user-data.php" method="post">
                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="name">Nombre y apellidos </label>
                                <input type="text" id="text" class="form-control" name="NombreApellidos" value="<?php echo $row['NombreApellidos'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email </label>
                                <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="text" class="form-control" name="Email" value="<?php echo $row['Email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">Teléfono</label>
                            <input type="text" pattern="[0-9]{9}" title="Debe ser un número de 9 dígitos" id="text" class="form-control" name="Telefono" value="<?php echo $row['Telefono'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="website">DNI</label>
                            <input type="text" id="text" class="form-control" name="dni" value="<?php echo $row['DNI'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="website">Fecha de nacimiento</label>
                            <input type="date" id="text" class="form-control" name="fNacimiento" value="<?php echo $row['FechaNacimiento'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="website">Contraseña</label>
                            <input type="password" id="text" class="form-control" name="contra1" placeholder="Ingrese la nueva contraseña.">
                        </div>
                        <div class="form-group">
                            <label for="website">Repita contraseña</label>
                            <input type="password" id="text" class="form-control" name="contra2" placeholder="Por favor repita la contraseña.">
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <input type="button" value="Guardar Cambios" class="btn btn-primary" onclick="passwordValidation()">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>


    <footer class="page-footer bg-image" style="background-image: url(./assets/img/world_pattern.svg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 py-3">
                    <h3>Vinculin</h3>
                    <br>
                    <br>

                    <div class="social-media-button">
                        <a href="https://github.com/DannyelYankee/Vinculin" target="_blank"><span class="mai-logo-github"></span></a>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>General</h5>
                    <ul class="footer-menu">
                        <li><a href="./about.php">Acerca de</a></li>
                        <li><a href="./jobs.php">Empleos</a></li>
                        <li><a href="./signup.php">Regístrate</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Contáctanos</h5>
                    <p>Universidad del País Vasco, Ingeniero Torres Quevedo Plaza, 1, 48013 Bilbao, Vizcaya</p>
                    <p>+34 123 456 78</p>
                    <a href="mailto:vinculin@inventedmail.com" title="Enviar correo electronico">vinculin@inventedmail.com</a>
                </div>
            </div>

            <p class="text-center" id="copyright">Copyright &copy; 2020. This template design and develop by <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
        </div>
    </footer>


    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>

    <script src="./assets/js/google-maps.js"></script>

    <script src="./assets/vendor/wow/wow.min.js"></script>

    <script src="./assets/js/theme.js"></script>

</body>

</html>