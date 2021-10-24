<?php
session_start();
ob_start();
?>
<?php
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$NombreApellidos = $_POST["NombreApellidos"];
$Email = $_POST["Email"];
$Contraseña = $_POST["contra1"];
$DNI = $_POST["dni"];
$fNacimiento = $_POST["fNacimiento"];
$Telefono = $_POST["Telefono"];

$con = mysqli_connect($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
mysqli_select_db($con, $db);

$verificacion = mysqli_query($con, "SELECT * FROM Usuario where Email='$Email'");
echo mysqli_num_rows($verificacion);
if (mysqli_num_rows($verificacion) > 0) {
    echo "<script> alert('Ya existe un usuario con ese email.'); </script>";
    echo '<script> window.location.replace("./signup.php"); </script>';
    exit();
}
$sql = "insert into Usuario (NombreApellidos, Email, Contraseña, DNI, FechaNacimiento, Telefono) values ('$NombreApellidos','$Email',md5('$Contraseña'),'$DNI','$fNacimiento','$Telefono');";
mysqli_query($con, $sql);
$_SESSION['usuario']['Email'] = $Email;    
$_SESSION['usuario']['NombreApellidos'] = $NombreApellidos;
$_SESSION['usuario']['DNI']=$row['DNI'];
$_SESSION['usuario']['FechaNacimiento']=$fNacimiento;
$_SESSION['usuario']['Telefono']=$Telefono;
$_SESSION['usuario']['Contraseña']=$Contraseña;
header("Location: ./index.php");


mysqli_close($con)


?>
<?php
ob_end_flush();
?>
