<?php
session_start();

include_once('./../configuration/config.php');

$postData = $_POST;

if (!isset($postData['name']) || !isset($postData['email']) || !isset($postData['subject']) || !isset($postData['message']))
{
	echo('Il faut votre nom, un email , objet d email et un message pour soumettre le formulaire.');
    return;
}	

$name = $postData['name'];
$email = $postData['email'];
$subject = $postData['subject'];
$message = $postData['message'];



$insertmessage = $conn->prepare('INSERT INTO MESSAGES(NOM_PRENOM, EMAIL, OBJET, MESSAGE) VALUES (:name, :email, :subject, :message)');
$insertmessage->execute([
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>USTHB - Home</title>
  <?php include_once('../includes/head.php'); ?>
</head>
  
<body>
  <!-- Navigation -->
  <?php include_once('../includes/header.php'); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Message envoyé </h2>
        <p>Merci pour votre temps. </p>
      </div>
    </div><!-- End Breadcrumbs -->
     <p>je suis un papillon</p>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <h1>Message envoyé avec succès !</h1>
        <div>
          <p><b>Votre Message</b> : <?php echo strip_tags($message); ?></p>
         </div>
       </div>
     </section><!-- End Contact Section -->

   </main><!-- End #main -->

   <?php include_once('../includes/footer.php'); ?>
   <?php include_once('../includes/script.php'); ?>
</body>

</html>
