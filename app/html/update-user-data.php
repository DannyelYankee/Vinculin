<?php 
session_start();

$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$NombreApellidos = $_POST["NombreApellidos"];
$Email = $_POST["Email"];
$Contraseña = $_POST["Contraseña"];
$DNI= $_POST["DNI"];
$fNacimiento = $_POST["fNacimiento"];
$Telefono = $_POST["Telefono"];

$con = mysqli_connect($hostname,$username,$password,$db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
mysqli_select_db($con,$db);

?>