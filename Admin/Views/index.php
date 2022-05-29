<?php session_start(); ?>
<?php if($_SESSION["ID"] != "") : ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Home Page  -USTHB- ADMIN </title>
  <?php include_once('../includes/head.php'); ?>
</head>

<body>

  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Carte presentation -->
            <div class="col-xxl-4 col-xl-12">
               <!-- Presentation de la platform -->
               <div class="card">
               <div class="card-body">
               <h5 class="card-title">ManageIT</h5>
               Une Plateform qui permet la gestion de scolarité dedié à la generation des attestations de classement et des annexes descriptives,
               </div>
               </div><!-- ********** -->
            </div><!-- Fin Carte presentation  -->
          </div>

          <div class="row">
            <!-- Carte presentation -->
            <div class="col-xxl-4 col-xl-12">
               <!-- Presentation de la platform -->
               <div class="card">
               <div class="card-body">
               <h5 class="card-title">USTHB Admin</h5>
               Est votre espace de travail pour gerer les utilisateurs de la platform ManageIT, ainsi reporter les problemes rencontrer par les utilisateurs
               </div>
               </div><!-- ********** -->
            </div><!-- Fin Carte presentation  -->
          </div>


        </div><!-- End Left side columns -->



          <!-- Right side columns -->
          <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
  
           <div class="card-body">
           <h5 class="card-title">Activités <span>| agenda</span></h5>

             <div class="activity">

               <div class="activity-item d-flex">
                <div class="activite-label">Sept</div>
                 <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                 <div class="activity-content">
                 Inscriptions
                 </div>
                </div><!-- End activity item-->
               <div class="activity-item d-flex">
                <div class="activite-label">Nov</div>
                 <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                 <div class="activity-content">
                 Mise à jour de la base de données
                 </div>
                </div><!-- End activity item-->
               <div class="activity-item d-flex">
                <div class="activite-label">Janv</div>
                 <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                 <div class="activity-content">
                 generations individuel des attestations au besoin
                 </div>
                </div><!-- End activity item-->
               <div class="activity-item d-flex">
                <div class="activite-label">Juil</div>
                 <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                 <div class="activity-content">
                 Generation et remise des attestations de classement et annexes
                 </div>
                </div><!-- End activity item-->
      
    </div>

  </div>
</div><!-- End Recent Activity -->

</div><!-- End Right side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <?php include_once('../includes/footer.php'); ?>
  <?php include_once('../includes/script.php'); ?>
</body>

</html>

<?php else : ?>
  <?php header("location:../../index.php"); ?>
<?php endif; ?>


