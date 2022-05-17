<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php   
     include '../fcts/CRUD.php';
     $users = getAllUsers();
?>

<head>
  
 <title>USTHB Admin - Liste utilisateurs</title>
  <?php include_once('../includes/head.php'); ?>
</head>

<body>

  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Liste Utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Listes</li>
          <li class="breadcrumb-item active">Liste Utilisateurs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste Utilisateurs</h5>
              <p>Liste des admins et utilisateurs de la platform, ceux qui ont acces et ceux qu'ils ont pas.</p>
              <p>Ainsi les informations les concernants</p>
         
              <!-- Liste utilisateurs -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">MAIL</th>
                    <th scope="col">TEL</th>
                    <th scope="col">FAC</th>
                    <th scope="col">TYP</th>
                    <th scope="col">ENB</th>
                    <th scope="col">Modf</th>
                    <th scope="col">Supp</th>
                  </tr>
                </thead>

                <tbody>

                <?php foreach($users as $user): ?>
                  <tr>
                    <th scope="row"><a href=""><?php echo $user['ID'] ?></a></th>
                    <td wrap="hard"><?php echo $user['NOM_PRENOM'] ?></td>
                    <td wrap="hard"><?php echo $user['EMAIL'] ?></td>
                    <td wrap="hard"><?php echo $user['TEL'] ?></td>
                    <td wrap="hard"><?php echo $user['FACULTE'] ?></td>
                    <td wrap="hard"><?php echo $user['TYPE'] ?></td>
                    <td wrap="hard"><?php echo $user['ENABLED'] ?></td>
                    <td><?php echo '<a href="modification_user.php?EMAIL='.$user['EMAIL'].'"><button type="button" class="btn btn-info"><i class="bi bi-info-circle"></i></button></a>' ?></td>
                    <td><?php echo '<a href="../forms/supprim_form.php?EMAIL='.$user['EMAIL'].'"><button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button></a>' ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <!-- Fin liste Utilisateurs -->
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