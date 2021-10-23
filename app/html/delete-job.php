<?php 
session_start();

$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$con = mysqli_connect($hostname,$username,$password,$db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
mysqli_select_db($con,$db);

$id = $_GET['id'];
mysqli_query($con,"DELETE FROM `Empleo` WHERE `Empleo`.`id` = $id");
header("Location: datos-usuario.php");

mysqli_close($con);
?>