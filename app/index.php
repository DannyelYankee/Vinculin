<!DOCTYPE html>

<head>
    <html lang="es">
    <meta charset="iso-8559-1" />
    <meta name="description" content="Trabajo de Seguridad 2021" />
    <title> VinculIn: Iniciar sesión o registro </title>
    <link rel="stylesheet" href="mihoja.css">

</head>

<body>
    <header>

        <section class="textos-header">
            <h1>
                Te damos la bienvenida a tu comunidad profesional
            </h1>

        </section>

    </header>


    <?php
      
      // phpinfo();
      $hostname = "db";
      $username = "admin";
      $password = "test";
      $db = "database";

      $conn = mysqli_connect($hostname,$username,$password,$db);
      if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
      }



    $query = mysqli_query($conn, "SELECT * FROM usuarios")
      or die (mysqli_error($conn));

    while ($row = mysqli_fetch_array($query)) {
      echo
      "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nombre']}</td>
      </tr>";
      

    }

    ?>
</body>
<footer>
    <nav>
        <a href="#">Inicio</a>
        <a href="#">Acerca de</a>
        <a href="#">Servicios</a>
        <a href="#">Contacto</a>
    </nav>
</footer>


</html>