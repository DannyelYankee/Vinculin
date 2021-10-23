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
$titulo = $_POST["titulo"];
$empresa = $_POST["empresa"];
$descripcion = $_POST["descripcion"];
$localidad = $_POST["localidad"];

mysqli_query($con,"UPDATE Empleo SET Titulo='$titulo', Empresa='$empresa', Descripcion='$descripcion', Localidad ='$localidad' WHERE id ='$id'");
header("Location: datos-usuario.php");

mysqli_close($con);
?>