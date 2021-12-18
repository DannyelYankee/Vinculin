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
$Contraseña =$_POST["contra"];



$stmt = $con->prepare("SELECT * FROM Usuario WHERE Email= ?");

$stmt->bind_param("s", $Email);
$stmt->execute();
$result=$stmt->get_result();

$row = $result->fetch_assoc();
$hashed_contraseña = $row['Contraseña'];
$match_contraseña = password_verify($Contraseña,$hashed_contraseña);

$log = $con->prepare("INSERT INTO Acceso (usuario) VALUES (?)");
$log->bind_param("s", $Email);
$log->execute();

while ($match_contraseña) {
    

    $_SESSION['usuario']['Email'] = $row['Email'];    
    $_SESSION['usuario']['NombreApellidos'] = $row['NombreApellidos'];
    $_SESSION['usuario']['DNI']=$row['DNI'];
    $_SESSION['usuario']['FechaNacimiento']=$row['FechaNacimiento'];
    $_SESSION['usuario']['Telefono']=$row['Telefono'];
    $_SESSION['usuario']['Contraseña']=$row['Contraseña'];
    header("Location: ./index.php");
    mysqli_close($con);
    return;
}
echo "<script> alert('Email o contraseña incorrectos.'); </script>";
echo "<script> window.location.replace('http://localhost:81/login.html'); </script>";
exit();

//header ("Location: login.html");
mysqli_close($con)

?>