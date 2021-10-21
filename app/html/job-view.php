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
    
    $id = $_GET['id'];
    $datos = mysqli_query($con,"SELECT * FROM `Empleo` WHERE `id` = $id");
    $row=mysqli_fetch_array($datos);
?>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="300">
            <div class="container">
                <a href="index.html" class="navbar-brand">Vincul<span class="text-primary">in.</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="job-form.html">Publicar empleo</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="jobs.php">Buscar empleo</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-2" href="login.html">Identificarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-2" href="signup.php">Registrarse</a>
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
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="jobs.php">Buscar empleo</a></li>
                    <li class="breadcrumb-item active">Empleo</li>
                </ul>
            </nav>

            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-wrap">
                        <h1 class="post-title"><?echo $row["Titulo"];?></h1>
                        <div class="post-meta">
                            <div class="post-date">
                                <span class="icon">
                  <span class="mai-home"></span>
                                </span> <a href="#"><?echo $row["Empresa"];?></a>
                            </div>
                            <div class="post-comment-count ml-2">
                                <span class="icon">
                  <span class="mai-location"></span>
                                </span> <a href="#"><?echo $row["Localidad"];?></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <p><?echo $row["Descripcion"];?></p>
                        </div>
                    </div>

                    <div class="comment-form-wrap pt-5">
                        <h2 class="mb-5">Leave a comment</h2>
                        <form action="#" class="">
                            <div class="form-row form-group">
                                <div class="col-md-6">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="msg" id="message" cols="30" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <!-- Widget search -->
                        <div class="widget-box">
                            <form action="#" class="search-widget">
                                <input type="text" class="form-control" placeholder="Enter keyword..">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </form>
                        </div>

                        <!-- Widget Categories -->
                        <div class="widget-box">
                            <h4 class="widget-title">Category</h4>
                            <div class="divider"></div>

                            <ul class="categories">
                                <li><a href="#">LifeStyle</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Healthy</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Entertainment</a></li>
                            </ul>
                        </div>

                        <!-- Widget recent post -->
                        <div class="widget-box">
                            <h4 class="widget-title">Recent Post</h4>
                            <div class="divider"></div>

                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="./assets/img/blog/blog-1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="./assets/img/blog/blog-2.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="./assets/img/blog/blog-3.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Widget Tag Cloud -->
                        <div class="widget-box">
                            <h4 class="widget-title">Tag Cloud</h4>
                            <div class="divider"></div>

                            <div class="tag-clouds">
                                <a href="#" class="tag-cloud-link">Projects</a>
                                <a href="#" class="tag-cloud-link">Design</a>
                                <a href="#" class="tag-cloud-link">Travel</a>
                                <a href="#" class="tag-cloud-link">Brand</a>
                                <a href="#" class="tag-cloud-link">Trending</a>
                                <a href="#" class="tag-cloud-link">Knowledge</a>
                                <a href="#" class="tag-cloud-link">Food</a>
                            </div>
                        </div>

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
                        <li><a href="./about.html">Acerca de</a></li>
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