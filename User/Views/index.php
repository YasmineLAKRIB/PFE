<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>USTHB - Home</title>
  <?php include_once('../includes/head.php'); ?>
</head>

<body>

   <!-- Navigation -->
   <?php include_once('../includes/header.php'); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>USTHB ManageIT,</h1>
      <h2> Bienvenu <?php echo $_SESSION["email"] ?> </h2>
      <h2>Votre platforme de gestion des attestations de classement </h2>
      <a href="workspace.php" class="btn-get-started">WorkSpace</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>ManageIT.</h3>
            <p class="fst-italic">
              Une platform qui permet de digitaliser et de faciliter la gestion des attestations de classement et des fiches d'annexe
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>Pour les diplomés, ayant une licence ou un master.</li>
              <li><i class="bi bi-check-circle"></i>Pour ceux ayant un credit de 180 pour les licenciers et 120 pour les masterants.</li>
              <li><i class="bi bi-check-circle"></i> Un classement suivant une formule ministeriale, qui permet de positioner l'individu au sein de sa specialité et promotion.</li>
            </ul>
            <p>
              Le workspace est votre espace de travail, pour differentes manipulations
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

     <!-- ======= Counts Section ======= -->
     <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

  </main><!-- End #main -->

  
 
  <?php include_once('../includes/footer.php'); ?>
  <?php include_once('../includes/script.php'); ?>
</body>

</html>