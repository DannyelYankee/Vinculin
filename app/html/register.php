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

$con = new mysqli($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
$con->select_db($db);

//$verificacion = mysqli_query($con, "SELECT * FROM Usuario where Email='$Email'");
$stmt = $con->prepare("SELECT * FROM Usuario where Email=?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$verificacion = $stmt->get_result();
echo mysqli_num_rows($verificacion);
$row = $verificacion->fetch_assoc();
if ($row) {
    echo "<script> alert('Ya existe un usuario con ese email.'); </script>";
    echo '<script> window.location.replace("./signup.php"); </script>';
    exit();
}
//'$NombreApellidos','$Email',md5('$Contraseña'),'$DNI','$fNacimiento','$Telefono'
$sql = $con->prepare("insert into Usuario (NombreApellidos, Email, Contraseña, DNI, FechaNacimiento, Telefono) values (?,?,?,?,?,?)");
$sql->bind_param("sssssi", $NombreApellidos, $Email, md5($Contraseña), $DNI, $fNacimiento, $Telefono);
$sql->execute();
$result = $sql->get_result();




$_SESSION['usuario']['Email'] = $Email;
$_SESSION['usuario']['NombreApellidos'] = $NombreApellidos;
$_SESSION['usuario']['DNI'] = $row['DNI'];
$_SESSION['usuario']['FechaNacimiento'] = $fNacimiento;
$_SESSION['usuario']['Telefono'] = $Telefono;
$_SESSION['usuario']['Contraseña'] = $Contraseña;
header("Location: ./index.php");




mysqli_close($con)


?>
<?php
ob_end_flush();
?>
