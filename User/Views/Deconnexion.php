<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact </title>
  <?php include_once('../includes/head.php'); ?>

</head>

<body>
  <!-- Navigation -->
  <?php include_once('../includes/header.php'); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs " data-aos="fade-in">
      <div class="container ">
        <h2>DeConnexion </h2>
        <p>En effectuant cette action, vous allez sortir de l'espace de travail !  </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Log Out Section ======= -->
    <div class="container logout">

           <a href="../../connexion/logout.php" class="get-started-btn">DeConnexion</a>
           <br><br>
           <i>Cliquez pour vous deconnecter</i>
				
    </div>
    

  </main><!-- End #main -->

  <?php include_once('../includes/footer.php'); ?>
  <?php include_once('../includes/script.php'); ?>
</body>

</html>