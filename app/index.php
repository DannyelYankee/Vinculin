<!DOCTYPE html>
<html lang="es">
<meta charset="iso-8559-1" />
<meta name="description" content="Simulación de Linkedin" />
<title> Vinculín </title>

<body>
  <header>
    <h1>Vinculín</h1>
  </header>
  <nav>
    <ul>
      <li>Quiénes somos</li>
      <li>Nuestros productos</li>
      <li>Precios</li>
    </ul>
  </nav>

  <aside>
    <blockquote>Primer elemento</blockquote>
    <blockquote>Segundo elemento</blockquote>
    <blockquote>Tercero elemento</blockquote>
  </aside>

  <section>
    <article>
      <header>
        <hgroup>
          <h2> Titulo de la noticia 1 </h2>
          <h3>Subtítulo de la noticia 1</h3>
        </hgroup>
      </header>
      <figure>
        <img src="imagenes/sol_mexico.jpeg" />
        <figcaption>El mejor cantante del <strong>mundo</strong></figcaption>

      </figure>
      <p><mark>Noticia 1</mark></p>
      <p>Seguimos hablando de noticia 1</p>
      <p>Terminamos de hablar de la de noticia 1</p>

      <footer>
        <p> comentarios de usuarios </p>
      </footer>

    </article>

    <article>
      <header>
        <h2>Título de la noticia 2</h2>

      </header>
      <p>Noticia 2</p>
      <p>Vean <cite>Regreso al futuro</cite></p>
      <p>Terminamos de hablar de la de noticia 2</p>
      <time datetime="2021-10-04" pubdate> Noticia publicada el día 04/10/2021</time>
    </article>

    <article>
      <header>
        <hgroup>
          <h2>Título de la noticia 3</h3>
            <h3>Subtítulo de la noticia 3</h3>
        </hgroup>

      </header>
      <p>Noticia 3</p>
      <p>Seguimos hablando de noticia 3</p>
      <p>Terminamos de hablar de la de noticia 3</p>
    </article>

  </section>

  <footer>
    <small> Derechos reservados <address>Tlfn 123456789</address> </small>
  </footer>


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

</html>