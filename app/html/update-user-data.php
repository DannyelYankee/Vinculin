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
$currentEmail = $_SESSION['usuario']['Email']; //email guardado en la sesion del usuario
$NombreApellidos = $_POST["NombreApellidos"];
$Email = $_POST["Email"];
$Contraseña1 = $_POST["contra1"];

$Contraseña2 = $_POST["contra2"];
$DNI= $_POST["dni"];
$fNacimiento = $_POST["fNacimiento"];
$Telefono = $_POST["Telefono"];

$cuenta= $_POST["Banco"];
//ciframos la cuenta bancaria
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = 'clave';
$cuenta_cifrada = openssl_encrypt($cuenta,$ciphering,$encryption_key,$options,$encryption_iv);

//$sql = mysqli_query($con,"UPDATE Usuario SET NombreApellidos='$NombreApellidos', Telefono='$Telefono', DNI='$DNI', FechaNacimiento='$fNacimiento' WHERE Email='$currentEmail'");
$sql= $con->prepare("UPDATE Usuario SET NombreApellidos=?, Telefono=?, DNI=?, FechaNacimiento=?, Banco=? WHERE Email=?");
$sql->bind_param("sissss",$NombreApellidos,$Telefono,$DNI,$fNacimiento,$cuenta_cifrada,$currentEmail);
$sql->execute();
if($currentEmail!=$Email){
    //UPDATE Usuario SET Email='$Email' WHERE Email='$currentEmail'
    $updateEmailUsuario =$con->prepare("UPDATE Usuario SET Email=? WHERE Email=?");
    $updateEmailUsuario->bind_param("ss",$Email,$currentEmail);
    $updateEmailUsuario->execute();
    //UPDATE Empleo SET Email='$Email' WHERE Email='$currentEmail'
    $updateEmailEmpleo = $con->prepare("UPDATE Empleo SET Email=? WHERE Email=?");
    $updateEmailEmpleo->bind_param("ss",$Email,$currentEmail);
    $updateEmailEmpleo->execute();
    //$query_updateUsuario = mysqli_query($con,$updateEmailUsuario);
    //$query_updateEmpleo = mysqli_query($con,$updateEmailEmpleo);
    $_SESSION['usuario']['Email'] = $Email;
}

if($Contraseña1!='' && $Contraseña2!=''){
    //"UPDATE Usuario SET Contraseña='$Contraseña1' WHERE Email='$currentEmail'"
    $sql2=$con->prepare("UPDATE Usuario SET Contraseña=? WHERE Email=?");
    $hashed_contraseña = password_hash($Contraseña1,PASSWORD_DEFAULT);
    $sql2->bind_param("ss",$hashed_contraseña,$currentEmail);
    $sql2->execute();    
}


header("Location: datos-usuario.php");

mysqli_close($con)
?>