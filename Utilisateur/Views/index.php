<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Home Page  -USTHB- </title>
  <?php include_once('../includes/head.php'); ?>
</head>

<body>

  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Home Pgae</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
          
            <!-- Carte informative Taff de scolarité -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Gestionaires de scolarité <span>| cette année</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>44</h6>
                      <span class="text-danger small pt-1 fw-bold">4%</span> <span class="text-muted small pt-2 ps-1">du Taff</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- Fin Carte informative Taff de scolarité -->

             <!-- pics Card -->
             <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                <div class="card-body">
                 <h5 class="card-title">USTHB <span>| Université Houari Boumedien</span></h5>

                  <!-- Slides with fade transition -->
                  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../assets/img/usthb.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../assets/img/usthb2.jpeg" class="d-block w-100" alt="...">
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


   





<!-- Charts section -->
<div class="pagetitle">
  <h1>Statistiques</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Statistiques</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<p>Representation Statistique</p>

<section class="section">
  <div class="row">

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ligne graphique des diplomés par année</h5>

          <!-- Line Chart -->
          <canvas id="lineChart" style="max-height: 400px;"></canvas>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#lineChart'), {
                type: 'line',
                data: {
                  labels: ['2018', '2019', '2020', '2021', '2022'],
                  datasets: [{
                    label: 'Diplomés par année',
                    data: [7890, 8100, 6720, 6943, 7270],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            });
          </script>
          <!-- End Line CHart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bar de statistiques</h5>

          <!-- Bar Chart -->
          <canvas id="barChart" style="max-height: 400px;"></canvas>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#barChart'), {
                type: 'bar',
                data: {
                  labels: ['Etudiants', 'Dimplomés'],
                  datasets: [{
                    label: 'Bar de statistiques etudiants',
                    data: [41000, 35000],
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                      'rgb(255, 99, 132)',
                      'rgb(54, 162, 235)'
                    ],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            });
          </script>
          <!-- End Bar CHart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">diagramme circulaire _Etudiants diplomables_</h5>

          <!-- Pie Chart -->
          <canvas id="pieChart" style="max-height: 400px;"></canvas>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#pieChart'), {
                type: 'pie',
                data: {
                  labels: [
                    'Master',
                    'Licence'
                  ],
                  datasets: [{
                    label: 'Etudiants Diplomables',
                    data: [112,245],
                    backgroundColor: [
                      'rgb(54, 162, 235)',
                      'rgb(255, 210, 13)'
                    ],
                    hoverOffset: 4
                  }]
                }
              });
            });
          </script>
          <!-- End Pie CHart -->

        </div>
      </div>
    </div>



    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Statistiques _Etudiants par Faculté_</h5>

          <!-- Polar Area Chart -->
          <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#polarAreaChart'), {
                type: 'polarArea',
                data: {
                  labels: [
                    'Bio',
                    'Ch',
                    'Phy',
                    'GC',
                    'GE',
                    'Info',
                    'Math',
                    'GAT',
                    'GM',
                    'GP'
                  ],
                  datasets: [{
                    label: 'Etudiants par faculté',
                    data: [7300, 3400, 4500, 3600, 5300,3300,6543,5200,2900,4400],
                    backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(75, 192, 192)',
                      'rgb(255, 205, 86)',
                      'rgb(201, 203, 207)',
                      'rgb(23, 80, 132)',
                      'rgb(55, 99, 1)',
                      'rgb(255, 210, 13)',
                      'rgb(255, 99, 32)',
                      'rgb(25, 91, 132)',
                      'rgb(54, 162, 235)'
                    ]
                  }]
                }
              });
            });
          </script>
          <!-- End Polar Area Chart -->

        </div>
      </div>
    </div>

   </div>
  </section>

  </main><!-- End #main -->

  <?php include_once('../includes/footer.php'); ?>
  <?php include_once('../includes/script.php'); ?>
</body>

</html>