<?php
ob_start();
?>
<?php
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$con = mysqli_connect($hostname, $username, $password, $db);
if ($con->connect_error) {
    echo "Database connectin failed.";
    die("Database connection failed: " . $con->connect_error);
}
mysqli_select_db($con, $db);


$Email = $_POST["email"];
$Contraseña = $_POST["contraseña"];

$sql = mysqli_query($con, "SELECT * FROM Usuario WHERE Email='$Email' and Contraseña='md5($Contraseña)'");
$row = mysqli_fetch_array($sql);
if (is_array($row)) {
    $_SESSION["Email"] = $row['Email'];
    $_SESSION["Nombre_Apellidos"] = $row['NombreApellidos'];
    header("Location: ./index.html");
} else {
    echo "<script> alert('Email o contraseña incorrectos.'); </script>";    
    
    exit();
}
//header ("Location: login.html");


mysqli_close($con)

?>
<?php
ob_end_flush();
?>