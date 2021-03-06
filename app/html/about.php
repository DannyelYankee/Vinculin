<?php
session_start();

if (isset($_SESSION['usuario'])) {
    $out = '<div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi Perfil</button><div class="dropdown-menu" aria-labelledby="dropdownMenu2"><a class="dropdown-item" href="datos-usuario.php" type="button">Mis datos</a><a class="dropdown-item" href="logout.php" type="button">Cerrar sesión</a></div></div>';
    $script = "<script type='text/javascript'> var t; window.onload = resetTimer; document.onkeypress = resetTimer; document.onmousemove = resetTimer;function logout() { alert('El sistema se cierra por 1 minuto de inactividad.');location.href = 'logout.php';   }    function resetTimer() {        clearTimeout(t);        t = setTimeout(logout, 60000)    }</script>";
} else {
    $out = '<li class="nav-item"> <a class="btn btn-primary ml-lg-2" href="login.html">Identificarse</a></li><li class="nav-item"><a class="btn btn-primary ml-lg-2" href="signup.php">Registrarse</a></li>';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php echo $script  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Vinculin - Acerca de</title>

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
                        <li class="nav-item active">
                            <a class="nav-link" href="about.php">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="job-form.php">Publicar empleo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.php">Buscar empleo</a>
                        </li>
                        <?php echo $out ?>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <div class="page-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3">
                    <h2 class="title-section">Visión</h2>
                    <div class="divider"></div>
                    <p>Crear oportunidades económicas para cada profesional del mercado laboral internacional.</p>

                    <h2 class="title-section">Misión</h2>
                    <div class="divider"></div>
                    <p>La misión de Vinculin es sencilla: conectar a profesionales de todo el mundo para ayudarles a ser más productivos y a alcanzar todas sus metas laborales.</p>

                    <h2 class="title-section">¿Quiénes somos?</h2>
                    <div class="divider"></div>
                    <p>Somos una simulación de la página LinkedIn, hecho para un trabajo de seguridad para la Escuela de Ingenieros de Bilbao.</p>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="img-fluid py-3 text-center">
                        <img src="./assets/img/about_frame.png" alt="">
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
                        <li><a href="./login.html">Regístrate</a></li>
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