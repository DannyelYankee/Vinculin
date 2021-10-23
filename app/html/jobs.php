<?php
session_start();

if (isset($_SESSION['usuario'])){
    $out = '<div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi Perfil</button><div class="dropdown-menu" aria-labelledby="dropdownMenu2"><a class="dropdown-item" href="datos-usuario.php" type="button">Mis datos</a><a class="dropdown-item" href="logout.php" type="button">Cerrar sesión</a></div></div>';
} else {
    $out = '<li class="nav-item"> <a class="btn btn-primary ml-lg-2" href="login.html">Identificarse</a></li><li class="nav-item"><a class="btn btn-primary ml-lg-2" href="signup.php">Registrarse</a></li>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Vinculin - Empleos</title>

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
                        <?php echo $out ?>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <div class="page-section">
        <div class="container">
            <h2 class="mb-4 font-weight-medium text-secondary">Buscador de empleos</h2>
            <?
                $hostname = "db";
                $username = "admin";
                $password = "test";
                $db = "database";
                $con = mysqli_connect($hostname,$username,$password);
                if ($con->connect_error){
                    echo "Database connectin failed.";
                    die("Database connection failed: " . $con->connect_error);
                }
                mysqli_select_db($con,$db);
                $datos = mysqli_query($con,"SELECT * FROM Empleo");

            ?>

            <div class="row my-5">
                    <?
                        while ($row=mysqli_fetch_array($datos))
                        {
                            $id = $row["id"];
                            echo '<div class="col-lg-4 py-3">
                                    <div class="card-blog">
                                        <div class="body">
                                            <h5 class="post-title"><a href="job-view.php?id='.$id.'">'.$row["Titulo"].'</a></h5>
                                            <div class="post-date">Publicado por <a href="#">'.$row["Empresa"].'</a></div>
                                        </div>
                                    </div>
                                </div>';
                        }
                        mysqli_free_result($datos);
                    ?>
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