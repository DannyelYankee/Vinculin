<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Vinculin - Registrarse</title>

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

            if (nombre === "" || fecha === "" || password==="" || password2==="" || dni==="" || email==="" || telf==="") {
                alert('Hay campos vacíos. Por favor rellene todos los campos.');
                window.location.replace("signup.php");
                return;
            }

            
            //comprobar que contraseña y repite contraseña coinciden
            if (password != password2) {
                alert("Las contraseñas no coinciden. ");
                window.location.replace("signup.php");
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
                    window.location.replace("signup.php");
                    return;
                }
            } else {
                alert('Dni erroneo, formato no válido');
                window.location.replace("signup.php");
                return;
            }
            //comprobar formato correo
            
            var expresion_regular_email = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
            if (!expresion_regular_email.test(email)) {
                alert('Email incorrecto. Siga el formato ejemplo@ejemplo.com');
                window.location.replace("signup.php");
                return;
            }

            //comprobar telefono
            
            var expresion_regular_telefono = /[0-9]{9}/;
            if (!expresion_regular_telefono.test(telf)) {
                alert('El número de teléfono solo puede contener números y debe ser de 9 dígitos.')
                window.location.replace("signup.php");
                return;
            }

            document.registro.submit();
        }
    </script>



    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form name="registro" action="register.php" method="post" class="contact-form py-5 px-lg-5">

                    <h2 class="mb-4 font-weight-medium text-secondary">Regístrate</h2>

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="NombreApellidos">Nombre y apellidos</label>
                            <input type="text" name="NombreApellidos" class="form-control" required="required">
                        </div>
                        <div class="col-md-12">
                            <label class="text-black" for="Email">Email</label>
                            <input type="email" name="Email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required">
                        </div>

                        <div class="col-md-6">
                            <label class="text-black" for="Contraseña">Contraseña</label>
                            <input type="password" id="contra1" name="contra1" class="form-control" required="required">
                            <span id="message"></span>
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="RepiteContraseña">Repite la contraseña</label>
                            <input type="password" id="contra2" name="contra2" class="form-control" required="required">
                        </div>

                        <div class="col-md-6">
                            <label class="text-black" for="DNI">DNI</label>
                            <input type="text" id="DNI" name="dni" class="form-control" required="required">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="fNacimiento">Fecha de nacimiento</label>
                            <input type="date" name="fNacimiento" class="form-control" required="required">
                        </div>

                        <div class="col-md-12">
                            <label class="text-black" for="Telefono">Télefono</label>
                            <input type="text" pattern="[0-9]{9}" title="Debe ser un número de 9 dígitos" name="Telefono" class="form-control" required="required">
                        </div>
                    </div>
                    <p>Creando una cuenta acepta nuestros términos y condiciones <a href="#" style="color:dodgerblue">Términos y condiciones</a>.</p>
                    <div class="row form-group mt-4">
                        <div class="col-md-12">
                            <input type="button" value="Unirse" class="btn btn-primary" onclick="passwordValidation()">

                        </div>
                    </div>
                    <div class="text-left">¿Ya tienes una cuenta? <a href="login.html">Inicia Sesión</a></div>
                </form>
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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>

</html>