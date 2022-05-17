<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  
  <title>Classement Diplomables Master</title>
  <?php include_once('../includes/head.php'); ?>
</head>


<body>
  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Classement Masterants</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Classement</li>
          <li class="breadcrumb-item active">Master</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Advanced Form Elements</h5>

             
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