<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

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
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.php">Buscar empleo</a>
                        </li>
                        <li>
                            <a class="btn btn-primary ml-lg-2" href="logout.php" type="button">Cerrar sesi??n</a>
                        </li>
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
                    <li class="breadcrumb-item"><a href="datos-usuario.php">Mi perfil</a></li>
                </ul>
            </nav>

            <div class="row">

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
                $email = $_SESSION['usuario']['Email'];

                $id = $_GET['id'];
                $datos = $con->prepare("SELECT * FROM `Empleo` WHERE `id` = ?");
                $datos->bind_param("i",$id);
                $datos->execute();
                $result = $datos->get_result();
                $row = $result->fetch_assoc();
                ?>

                <form action="update-job-info.php?id=<?echo $id;?>" method="POST" class="contact-form py-5 px-lg-5">
                    <h2 class="mb-5">Modificar anuncio</h2>
                    <? $_POST[$id] ?>
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Titulo</label>
                            <input type="text" id="fname" class="form-control" name="titulo" value="<?php echo $row["Titulo"] ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Empresa</label>
                            <input type="text" id="lname" class="form-control" name="empresa" value="<?php echo $row["Empresa"] ?>">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black">Localidad</label>
                            <input type="text" id="text" class="form-control" name="localidad" value="<?php echo $row["Localidad"] ?>">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Email</label>
                            <input class="form-control" type="email" placeholder="<?php echo $_SESSION['usuario']['Email'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Descripci??n</label>
                            <textarea id="message" cols="30" rows="5" class="form-control" name="descripcion"><?php echo $row["Descripcion"] ?></textarea>
                        </div>
                    </div>

                    <div class="row form-group mt-4">
                        <div class="col-md-12">
                            <input type="submit" value="Modificar" class="btn btn-primary" name="b1">
                        </div>
                    </div>
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
                        <li><a href="./signup.php">Reg??strate</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Cont??ctanos</h5>
                    <p>Universidad del Pa??s Vasco, Ingeniero Torres Quevedo Plaza, 1, 48013 Bilbao, Vizcaya</p>
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