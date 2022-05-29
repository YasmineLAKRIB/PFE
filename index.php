<?php session_start(); ?>
<?php 
$postData = $_POST;
$count = 0;
//$password = $postData["password"];
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
            if (password_verify( $postData["password"],$results[0]["MOT_PASSE"])){
               $_SESSION["ID"] = $postData["id"];
               if ($results[0]["ENABLED"] == "Oui") {  
                   if ($results[0]["TYPE"] == "Admin"){
                       header("location:Admin/Views/index.php");
                   }else {
                     header("location:Utilisateur/Views/index.php");
                   }
                
               } else {
               $message = "Cet utilisateur n'a pas access à la platform.";
               //header("location:login.php");
 
               }
            
            } else {
              $message = " mot de passe  incorrect.";
                //header("location:login.php");
  ;
            }

         } else {
          $message = "Identificateur incorrect.";
            //header("location:login.php");
         }
     }
   }
   catch(Exception $e){
    die(print_r($e->getMessage()));
  }

  ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login/login.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" onsubmit="return checkStuff()" action="" method="post">
      <h4>U<span>STHB</span></h4>
      <h5>Connexion à la platform ManageIt</h5>
        <input type="text" name="id" placeholder="Identificateur" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Mot de passe" id="pwd" autocomplete="off">
        <!--<a href="#" class="forgetpass">Mot de passe oublié?</a>-->
        <input type="submit" value="Connexion" class="btn1">
        <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
      </form>
        <!--<a href="#" class="dnthave">Don’t have an account? Sign up</a>-->
  </div> 

</div>
<script src="login/login.js"></script>
</body>
</html>