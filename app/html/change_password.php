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


$sql = mysqli_query($con,"SELECT * FROM Usuario where Email='$Email'");


if (mysqli_num_rows($sql)>0) {

    header("Location: ./index.php");
} else {
    echo "<script> alert('No existe ningún usuario con ese correo, por favor compruebelo.'); </script>";
    echo "<script> window.location.replace('http://localhost:81/password_forgotten.html'); </script>";
    exit();
}
//header ("Location: login.html");
mysqli_close($con)

?>