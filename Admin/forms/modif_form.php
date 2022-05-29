<?php session_start(); ?>
<?php

function getDatabaseConnexion() {
    try {
        $conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN;Database=usthb90000L","","");
        //$conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN\SQLEXPRESS;Database=usthb90000L","","");
        $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
      }
      catch(Exception $e){
        die(print_r($e->getMessage()));
      }
}

?>


<?php 
$getData = $_GET;

if (!isset($getData['id']) || !isset($getData['name']) || !isset($getData['email']) 
|| !isset($getData['password']) || !isset($getData['tel']) || !isset($getData['fac']) 
|| !isset($getData['type']) || !isset($getData['enabled']))
{
	echo('Il faut procurer toutes les informations !');
    return;
}	

$id = $getData['id'];
$name = $getData ['name'];
$email = $getData['email'];
$pass = $getData['password'];
$password = password_hash($pass, PASSWORD_DEFAULT);
$tel = $getData['tel'];
$fac = $getData['fac'];
$type = $getData['type'];
$enabled = $getData['enabled'];


$conn = getDatabaseConnexion();

$insertmessage = $conn->prepare(
    'UPDATE UTILISATEURS SET
                        ID = :id,
						NOM_PRENOM = :name,
						MOT_PASSE = :password,
						TEL = :tel, 
                        FACULTE = :fac,
						TYPE = :type, 
                        ENABLED = :enabled
						WHERE EMAIL = :email' 
);
$insertmessage->execute([
    'id' => $id ,
    'name' => $name,
    'password' => $password,
    'tel' => $tel,
    'fac' => $fac,
    'type' => $type,
    'enabled' => $enabled,
    'email' => $email,
]);
   header('Location: ../Views/liste_users.php');

?>

