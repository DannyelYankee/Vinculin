<?php

session_start();
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$con = new mysqli($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
$con->select_db($db);

$Email = $_POST["email"];


$sql = $con->prepare("SELECT * FROM Usuario where Email=?");
$sql->bind_param("s",$Email);
$sql->execute();
$result=$sql->get_result();

if ($result) {

    header("Location: ./index.php");
} else {
    echo "<script> alert('No existe ningún usuario con ese correo, por favor compruebelo.'); </script>";
    echo "<script> window.location.replace('http://localhost:81/password_forgotten.html'); </script>";
    exit();
}
//header ("Location: login.html");
mysqli_close($con)

?>