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
$Contraseña1 = md5($_POST["contra1"]);

$Contraseña2 = md5($_POST["contra2"]);
$DNI= $_POST["dni"];
$fNacimiento = $_POST["fNacimiento"];
$Telefono = $_POST["Telefono"];

//$sql = mysqli_query($con,"UPDATE Usuario SET NombreApellidos='$NombreApellidos', Telefono='$Telefono', DNI='$DNI', FechaNacimiento='$fNacimiento' WHERE Email='$currentEmail'");
$sql= $con->prepare("UPDATE Usuario SET NombreApellidos=?, Telefono=?, DNI=?, FechaNacimiento=? WHERE Email=?");
$sql->bind_param("sisss",$NombreApellidos,$Telefono,$DNI,$fNacimiento,$currentEmail);
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

if(md5("") != $Contraseña1 && $Contraseña2!=md5("")){
    //"UPDATE Usuario SET Contraseña='$Contraseña1' WHERE Email='$currentEmail'"
    $sql2=$con->prepare("UPDATE Usuario SET Contraseña=? WHERE Email=?");
    $sql2->bind_param("ss",$Contraseña1,$currentEmail);
    $sql2->execute();
    
}


header("Location: datos-usuario.php");

mysqli_close($con)
?>