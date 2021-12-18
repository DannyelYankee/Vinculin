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
$cuenta = $_POST["Banco"];

$con = new mysqli($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
$con->select_db($db);


$stmt = $con->prepare("SELECT * FROM Usuario where Email=?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$verificacion = $stmt->get_result();

$row = $verificacion->fetch_assoc();
if ($row) {
    echo "<script> alert('Ya existe un usuario con ese email.'); </script>";
    echo '<script> window.location.replace("./signup.php"); </script>';
    exit();
}


//ciframos la cuenta bancaria
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = 'clave';
$cuenta_cifrada = openssl_encrypt($cuenta,$ciphering,$encryption_key,$options,$encryption_iv);

$sql = $con->prepare("insert into Usuario (NombreApellidos, Email, Contraseña, DNI, FechaNacimiento, Telefono, Banco) values (?,?,?,?,?,?,?)");
$sql->bind_param("sssssis", $NombreApellidos, $Email, password_hash($Contraseña, PASSWORD_DEFAULT), $DNI, $fNacimiento, $Telefono, $cuenta_cifrada);
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
