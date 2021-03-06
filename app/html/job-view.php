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
<?php echo $script ?>
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

<?
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";
$con = new mysqli($hostname, $username, $password);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
$con->select_db($db);

$id = $_GET['id'];
$datos =$con->prepare("SELECT * FROM `Empleo` WHERE `id` = ?");
$datos->bind_param("i",$id);
$datos->execute();
$result=$datos->get_result();
$row = $result->fetch_assoc();
?>

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

    <div class="page-section pt-5">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ul class="breadcrumb p-0 mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="jobs.php">Buscar empleo</a></li>
                    <li class="breadcrumb-item active">Empleo</li>
                </ul>
            </nav>

            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-wrap">
                        <h1 class="post-title"><? echo $row["Titulo"]; ?></h1>
                        <div class="post-meta">
                            <div class="post-date">
                                <span class="icon">
                                    <span class="mai-home"></span>
                                </span> <a href="#"><? echo $row["Empresa"]; ?></a>
                            </div>
                            <div class="post-comment-count ml-2">
                                <span class="icon">
                                    <span class="mai-location"></span>
                                </span> <a href="#"><? echo $row["Localidad"]; ?></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <?echo nl2br($row["Descripcion"]);?>
                        </div>
                    </div>

                    <div class="comment-form-wrap pt-5">
                        <h2 class="mb-5">Formulario de solicitud</h2>
                        <form action="#" class="">
                            <div class="form-row form-group">
                                <div class="col-md-6">
                                    <label for="name">Nombre *</label>
                                    <input type="text" class="form-control" id="name" required="required">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="website">Teléfono (opcional)</label>
                                <input type="phone" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Mensaje</label>
                                <textarea name="msg" id="message" cols="30" rows="8" class="form-control" placeholder="Me interesa este empleo porque..." required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary" href="job-view.php?id=<?php echo $id ?>">Enviar solicitud</a>
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