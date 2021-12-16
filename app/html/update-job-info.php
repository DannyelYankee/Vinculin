<?php 
session_start();

$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$con = new mysqli($hostname,$username,$password,$db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
$con->select_db($db);

$id = $_GET['id'];
$titulo = $_POST["titulo"];
$empresa = $_POST["empresa"];
$descripcion = $_POST["descripcion"];
$localidad = $_POST["localidad"];
//"UPDATE Empleo SET Titulo='$titulo', Empresa='$empresa', Descripcion='$descripcion', Localidad ='$localidad' WHERE id ='$id'"
$update= $con->prepare("UPDATE Empleo SET Titulo= ?, Empresa= ?, Descripcion=?, Localidad=? WHERE id=?");
$update->bind_param("ssssi",$titulo,$empresa,$descripcion,$localidad,$id);
$update->execute();
header("Location: datos-usuario.php");

mysqli_close($con);
?>