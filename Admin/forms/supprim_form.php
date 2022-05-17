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
$email = $getData['EMAIL'];
$conn = getDatabaseConnexion();

$insertmessage = $conn->prepare('DELETE from UTILISATEURS where EMAIL = :email');
$insertmessage->execute([
    'email' => $email,
]);
   header('Location: ../Views/liste_users.php');
?>

