<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Page d'Accueil -USTHB- </title>
  <?php include_once('../includes/head.php'); ?>
</head>

<body>

  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Page d'Accueil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Page d'Accueil</a></li>
          <li class="breadcrumb-item active">Activités</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
       <!-- presentation de l'universite -->
       <div class="card">
            <div class="card-body">
              <h5 class="card-title">USTHB</h5>
              L' USTHB a pour missions la formation graduée et post-graduée et la recherche scientifique. Son ambition est d’assurer une formation de qualité, conforme aux standards internationaux.
            </div>
        </div><!-- ******** -->

        <!-- Presentation de la platform -->
       <div class="card">
            <div class="card-body">
              <h5 class="card-title">ManageIT</h5>
              Une Plateform qui permet la gestion de scolarité dedié à la generation des attestations de classement et des annexes descriptives,
            </div>
        </div><!-- ********** -->

          

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
          

             <!-- pics Card -->
             <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                <div class="card-body">
                 <h5 class="card-title">USTHB <span>| Université des sciences et technologies Houari Boumedien</span></h5>

                  <!-- Slides with fade transition -->
                  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../assets/img/usthb.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../assets/img/usthb.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                 </button>

             </div><!-- End Slides with fade transition -->
             </div>
             </div>
             </div><!-- End pics Card -->
   
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
