<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $out = '<div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi Perfil</button><div class="dropdown-menu" aria-labelledby="dropdownMenu2"><a class="dropdown-item" href="datos-usuario.php" type="button">Mis datos</a><a class="dropdown-item" href="logout.php" type="button">Cerrar sesión</a></div></div>';
    $script = "<script type='text/javascript'> var t; window.onload = resetTimer; document.onkeypress = resetTimer; document.onmousemove = resetTimer;function logout() { alert('El sistema se cierra por 1 minuto de inactividad.');location.href = 'logout.php';   }    function resetTimer() {        clearTimeout(t);        t = setTimeout(logout, 60000)    }</script>";
} else {
    $out = '<li class="nav-item"> <a class="btn btn-primary ml-lg-2" href="login.html">Identificarse</a></li><li class="nav-item"><a class="btn btn-primary ml-lg-2" href="signup.php">Registrarse</a></li>';
}


$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$propietario = $_SESSION['usuario']['Email'];
$titulo = $_POST["titulo"];
$empresa = $_POST["empresa"];
$descripcion = $_POST["descripcion"];
$localidad = $_POST["localidad"];

$con = new mysqli($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
//('$propietario','$titulo','$empresa','$localidad','$descripcion')
$con->select_db($db);
$stmt= $con->prepare("insert into Empleo (Email,Titulo,Empresa,localidad,Descripcion) values (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss",$propietario,$titulo,$empresa,$localidad,$descripcion);
$stmt->execute();
mysqli_close($con)
?>


<!DOCTYPE html>
<html lang="en">
<?php echo $script ?>
<script type="text/javascript">
    var t;
    window.onload=resetTimer;
    document.onkeypress=resetTimer;
    document.onmousemove = resetTimer;
    function logout(){
        alert("El sistema se cierra por 1 minuto de inactividad.");
        location.href='logout.php';
    }
    function resetTimer(){
        clearTimeout(t);
        t=setTimeout(logout,60000)
    }
</script>

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
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Acerca de</a>
                        </li>
                        <li class="nav-item active">
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
            <div class="text-center wow fadeInUp">

                <h1 class="title-section">Tu empleo ha sido publicado con éxito </h1>
                <div class="divider mx-auto"></div>
            </div>



            <div class="col-12 mt-4 text-center wow fadeInUp">
                <a href="index.php" class="btn btn-primary">Volver a la pagina de inicio</a>
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
