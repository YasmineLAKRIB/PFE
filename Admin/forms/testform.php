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
$postData = $_POST;

if (!isset($postData['id']) || !isset($postData['name']) || !isset($postData['email']) 
|| !isset($postData['password']) || !isset($postData['tel']) || !isset($postData['fac']) 
|| !isset($postData['type']) || !isset($postData['enabled']))
{
	echo('Il faut procurer toutes les informations !');
    return;
}	

$id = $postData['id'];
$name = $postData['name'];
$email = $postData['email'];
$pass = $postData['password'];
$password = password_hash($pass, PASSWORD_DEFAULT);
$tel = $postData['tel'];
$fac = $postData['fac'];
$type = $postData['type'];
$enabled = $postData['enabled'];


$conn = getDatabaseConnexion();

$insertmessage = $conn->prepare('INSERT INTO UTILISATEURS(ID, NOM_PRENOM, EMAIL, MOT_PASSE, TEL, FACULTE, TYPE, ENABLED) 
VALUES (:id, :name, :email, :password, :tel,  :fac, :type, :enabled)');
$insertmessage->execute([
    'id' => $id ,
    'name' => $name,
    'email' => $email,
    'password' => $password,
    'tel' => $tel,
    'fac' => $fac,
    'type' => $type,
    'enabled' => $enabled,
]);
   header('Location: ../Views/liste_users.php');
?>