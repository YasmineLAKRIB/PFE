<?php session_start(); ?>

<?php 
$postData = $_POST;
$count = 0;
$password = $postData["password"];
$message =false;

try {
    $conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN;Database=usthb90000L","","");
    //$conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN\SQLEXPRESS;Database=usthb90000L","","");
    $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($postData["id"]) && isset($postData["password"]) )
     {
        $query = $conn->prepare("SELECT * FROM UTILISATEURS WHERE ID = :id ");
        $query->execute(
            [ 
                'id' => $postData["id"],
            ]
            );

         $results = $query->fetchAll(PDO::FETCH_BOTH);
         $count = $query->rowCount();
         if($count > 0){
            if (password_verify( $password,$results[0]["MOT_PASSE"])){
               $_SESSION["ID"] = $postData["id"];
               if ($results[0]["ENABLED"] == "Oui") {  
                   if ($results[0]["TYPE"] == "Admin"){
                       header("location:../Admin/Views/index.php");
                   }else {
                     header("location:../Utilisateur/Views/index.php");
                   }
                
               } else {
               echo "Veriffiez vos informations";
               header("location:connexion.php");
 
               }
            
            } else {
               header("location:connexion.php");
  ;
            }

         } else {
           header("location:connexion.php");

         }

     }

   }
     
   catch(Exception $e){
    die(print_r($e->getMessage()));
  }