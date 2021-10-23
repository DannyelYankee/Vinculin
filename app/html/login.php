<?php

session_start();
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$con = mysqli_connect($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
mysqli_select_db($con, $db);

$Email = $_POST["email"];
$Contraseña = $_POST["contra"];

$sql = mysqli_query($con, "SELECT * FROM Usuario WHERE Email='$Email' AND Contraseña=md5('$Contraseña')");
$row = mysqli_fetch_array($sql);

if (is_array($row)) {
    //$_SESSION['usuario']['loggedIn'] = true;
    $_SESSION['usuario']['Email'] = $row['Email'];    
    $_SESSION['usuario']['NombreApellidos'] = $row['NombreApellidos'];
    $_SESSION['usuario']['DNI']=$row['DNI'];
    $_SESSION['usuario']['FechaNacimiento']=$row['FechaNacimiento'];
    $_SESSION['usuario']['Telefono']=$row['Telefono'];
    $_SESSION['usuario']['Contraseña']=$row['Contraseña'];
    header("Location: ./index.php");
} else {
    echo "<script> alert('Email o contraseña incorrectos.'); </script>";
    echo "<script> window.location.replace('http://localhost:81/login.html'); </script>";
    exit();
}
//header ("Location: login.html");
mysqli_close($con)

?>