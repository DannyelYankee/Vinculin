<!DOCTYPE html>
<html lang="es">
  <meta charset="iso-8559-1"/>
  <meta name="description" content="Simulación de Linkedin"/>
  <title> Vinculín </title>
  <?php
    echo '<h1>Yeah, it works!<h1>';
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
</html>