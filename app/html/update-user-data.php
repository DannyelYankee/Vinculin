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
$currentEmail = $_SESSION['usuario']['Email']; //email guardado en la sesion del usuario
$NombreApellidos = $_POST["nombre"];
$Email = $_POST["email"];
$Contraseña1 = md5($_POST["contra1"]);

$Contraseña2 = md5($_POST["contra2"]);
$DNI= $_POST["DNI"];
$fNacimiento = $_POST["fNacimiento"];
$Telefono = $_POST["telefono"];

$sql = mysqli_query($con,"UPDATE Usuario SET NombreApellidos='$NombreApellidos', Email='$Email', Telefono='$Telefono', DNI='$DNI', FechaNacimiento='$fNacimiento' WHERE Email='$currentEmail'");
$_SESSION['usuario']['Email'] = $Email;
if($_SESSION['usuario']['Contraseña'] != $Contraseña1 && $Contraseña1!=md5('Ingrese la nueva contraseña.')){
    $sql2=mysqli_query($con,"UPDATE Usuario SET Contraseña='$Contraseña1' WHERE Email='$currentEmail'");
}

header("Location: datos-usuario.php");

mysqli_close($con)
?>