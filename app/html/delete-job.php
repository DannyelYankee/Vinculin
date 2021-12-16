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
$stmt = $con->prepare("DELETE FROM `Empleo` WHERE `Empleo`.`id` = ?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: datos-usuario.php");

mysqli_close($con);
?>