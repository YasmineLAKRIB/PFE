<?php session_start(); ?>

<?php 
$postData = $_POST;
$count = 0;
$message = "";
try {
    $conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN;Database=usthb90000L","","");
    //$conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN\SQLEXPRESS;Database=usthb90000L","","");
    $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($postData["email"]) && isset($postData["password"]) )
     {
         echo 'Continue <br/>';
        $query = $conn->prepare("SELECT * FROM UTILISATEURS WHERE EMAIL = :email AND MOT_PASSE = :password ");
        $query->execute(
            [ 
                'email' => $postData["email"],
                'password' => $postData["password"],
            ]
            );

         $results = $query->fetchAll(PDO::FETCH_BOTH);
  
         $count = $query->rowCount();
         if($count > 0){
            $_SESSION["email"] = $postData["email"];
             if ($postData["email"] === "lakrib@yahoo.com") {
                header("location:../Admin/Views/index.php");
             } 
            else {
                header("location:../User/Views/index.php");
             }

         } else {
            header("location:connexion.php");
            
         }
     } else {
        header("location:connexion.php");
     }
     }

  catch(Exception $e){
    die(print_r($e->getMessage()));
  }