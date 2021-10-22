<?php 
session_start();

$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$titulo = $_POST["titulo"];
$empresa = $_POST["empresa"];
$descripcion = $_POST["descripcion"];
$localidad = $_POST["localidad"];

$con = mysqli_connect($hostname,$username,$password,$db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
mysqli_select_db($con,$db);

?>