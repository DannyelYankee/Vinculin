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
$NombreApellidos = $_POST["NombreApellidos"];
$Email = $_POST["Email"];
$Contraseña1 = md5($_POST["contra1"]);

$Contraseña2 = md5($_POST["contra2"]);
$DNI= $_POST["dni"];
$fNacimiento = $_POST["fNacimiento"];
$Telefono = $_POST["Telefono"];

$sql = mysqli_query($con,"UPDATE Usuario SET NombreApellidos='$NombreApellidos', Email='$Email', Telefono='$Telefono', DNI='$DNI', FechaNacimiento='$fNacimiento' WHERE Email='$currentEmail'");
$_SESSION['usuario']['Email'] = $Email;
if(md5("") != $Contraseña1 && $Contraseña2!=md5("")){
    $sql2=mysqli_query($con,"UPDATE Usuario SET Contraseña='$Contraseña1' WHERE Email='$currentEmail'");
}

header("Location: datos-usuario.php");

mysqli_close($con)
?>