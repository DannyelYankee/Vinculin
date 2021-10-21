<?php
ob_start();
?>
<?php
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

$verificacion=mysqli_query($con,"SELECT * FROM Usuario where Email='$Email'");
echo mysqli_num_rows($verificacion);
if(mysqli_num_rows($verificacion)>0)
{
    echo "<script> alert('Ya existe un usuario con ese usuario'); </script>"; 
    //header("Location: http://localhost:81/signup.php");
	exit();
}

$sql = "insert into Usuario (NombreApellidos, Email, Contraseña, DNI, FechaNacimiento, Telefono) values ('$NombreApellidos','$Email',md5('$Contraseña'),'$DNI','$fNacimiento','$Telefono');";
header ("Location: login.html");
mysqli_query($con,$sql);

mysqli_close($con)


?>
<?php
ob_end_flush();
?>