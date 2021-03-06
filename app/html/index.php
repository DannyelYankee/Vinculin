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
<html lang="es">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Vinculin - Inicio</title>

    <link rel="stylesheet" href="./assets/css/maicons.css">

    <link rel="stylesheet" href="./assets/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="./assets/css/theme.css">

</head>
<?php echo $script ?>
<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a href="index.php" class="navbar-brand">Vincul<span class="text-primary">in.</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
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

        <div class="container">
            <div class="page-banner home-banner">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4">¡Te damos la bienvenida a tu comunidad profesional!</h1>
                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class="img-fluid text-center">
                            <img src="./assets/img/banner_image_1.svg" alt="">
                        </div>
                    </div>
                </div>
                <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
            </div>
        </div>
    </header>

    <!-- .page-section -->

    <div class="page-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <span class="subhead">Sobre nosotros</span>
                    <h2 class="title-section">Regístrate para encontrar el trabajo ideal para ti</h2>
                    <div class="divider"></div>

                    <p>Encuentra el trabajo o las prácticas más apropiadas para ti.</p>
                    <p>Publica una oferta de trabajo para que millones de personas puedan verla.</p>
                    <a href="about.php" class="btn btn-primary mt-3">Saber más</a>
                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid py-3 text-center">
                        <img src="./assets/img/about_frame.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- .container -->
    </div>








    <div class="page-section">
        <div class="container">
            <div class="text-center wow fadeInUp">

                <h1 class="title-section">Súmate a tus compañeros y amigos en Vinculin </h1>
                <div class="divider mx-auto"></div>
            </div>



            <div class="col-12 mt-4 text-center wow fadeInUp">
                <a href="login.html" class="btn btn-primary">Comenzar</a>
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