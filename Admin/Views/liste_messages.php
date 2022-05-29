<?php session_start(); ?>
<?php if($_SESSION["ID"] != "") : ?>
<!DOCTYPE html>
<html lang="fr">

<?php   
      include '../fcts/CRUD.php';
     $messages = getAllMessages();
?>

<head>
  
  <title>USTHB Admin - Liste messages</title>
  <?php include_once('../includes/head.php'); ?>

</head>

<body>

  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>

 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Liste Messages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Listes</li>
          <li class="breadcrumb-item active">Liste Messages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des messages</h5>
              <p>Dans cette liste figure tous les messages envoyé par les utilisateurs</p>
             <!-- Table with stripped rows -->
             <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">OBJET</th>
                    <th scope="col">NOM_PRENOM</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">DATE</th>
                    <th scope="col">MESSAGE</th>
                  </tr>
                </thead>

                <tbody>
                <?php foreach($messages as $message): ?>
                  <tr>
                    <th scope="row"><a href=""><?php echo $message['OBJET'] ?></a></th>
                    <td wrap="hard"><?php echo $message['NOM_PRENOM'] ?></td>
                    <td wrap="hard"><?php echo $message['EMAIL'] ?></td>
                    <td wrap="hard"><?php echo $message['DATE'] ?></td>
                    <td wrap="hard"><?php echo $message['MESSAGE'] ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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

<?php else : ?>
  <?php header("location:../../index.php"); ?>
<?php endif; ?>