<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<script type="text/javascript">
    var t;
    window.onload = resetTimer;
    document.onkeypress = resetTimer;
    document.onmousemove = resetTimer;

    function logout() {
        alert("El sistema se cierra por 1 minuto de inactividad.");
        location.href = 'logout.php';
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, 60000)
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
                            <a class="nav-link active" href="index.php">Inicio</a>
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
                            <a class="btn btn-primary ml-lg-2" href="logout.php" type="button">Cerrar sesión</a>
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
                    <li class="breadcrumb-item active">Mi perfil</a></li>
                </ul>
            </nav>

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

            $datos = $con->prepare("SELECT * FROM Usuario WHERE Email=?");
            $datos->bind_param("s", $email);
            $datos->execute();
            $result = $datos->get_result();
            $row = $result->fetch_assoc();
            //Se descifra la cuenta bancaria
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            $decryption_iv = '1234567891011121';
            $decryption_key = 'clave';

            $cuenta_descifrada = openssl_decrypt($row['Banco'], $ciphering, $decryption_key, $options, $decryption_iv);
            ?>

            <div class="row">
                <div class="col">
                    <h2 class="mb-5">Datos de usuario</h2>
                    <form action="change-user-data.php" method="POST">
                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="name">Nombre </label>
                                <p> <?php echo $row['NombreApellidos'] ?> </p>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email </label>
                                <p> <?php echo $row['Email'] ?> </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">Teléfono</label>
                            <p> <?php echo $row['Telefono'] ?> </p>
                        </div>
                        <div class="form-group">
                            <label for="website">DNI</label>
                            <p> <?php echo $row['DNI'] ?> </p>
                        </div>
                        <div class="form-group">
                            <label for="website">Fecha de Nacimiento</label>
                            <p> <?php echo $row['FechaNacimiento'] ?> </p>
                        </div>
                        <div class="form-group">
                            <label for="website">Cuenta Bancaria</label>
                            <p> <?php echo $cuenta_descifrada ?> </p>
                        </div>

                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <input type="submit" value="Modificar datos" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col">
                    <script type="text/javascript">
                        function check() {
                            return confirm("¿Estas seguro que quieres borrar el empleo?");
                        }
                    </script>
                    <h2 class="mb-5">Tus anuncios</h2>
                    <?

                    $datos2 = $con->prepare("SELECT * FROM `Empleo` WHERE `Email` = ?");
                    $datos2->bind_param("s", $email);
                    $datos2->execute();
                    $result = $datos2->get_result();


                    $is_empty = true;
                    if ($result) {

                        while ($row2 = $result->fetch_array()) {
                            $id2 = $row2["id"];
                            $is_empty = false;
                            echo '<div class="col-lg-10 py-3">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row2["Titulo"] . '</h5>
                                        <p class="card-text">' . $row2["Localidad"] . '</p>
                                        <a href="change-job-info.php?id=' . $id2 . '" class="btn btn-primary">Modificar datos</a>
                                        <a  href="delete-job.php?id=' . $id2 . '" class="btn btn-secondary" onclick="return check()">Eliminar</a>
                                    </div>
                                </div>
                            </div>';
                        }
                        $datos2->free_result();
                    }

                    if ($is_empty) {
                        echo "No tienes ningún anuncio publicado.\n";
                        echo "\nPublica tu primer empleo haciendo un click.";
                        echo '<div class="row form-group mt-4"><div class="col-md-12"><a class="btn btn-primary ml-lg-2" href="job-form.php" type="button">Publicar empleo</a></div></div>';
                    }
                    ?>

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