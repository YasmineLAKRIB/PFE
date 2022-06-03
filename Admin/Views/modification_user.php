<?php session_start(); ?>

<?php 
  include '../fcts/CRUD.php';
  $facultes = getFacultes();
  $mail = $_GET['EMAIL'];
  if($mail != ""){
    echo "Continue the process, the problem is not here";
  }else {
    echo "warning , the problem is here";
  }
  
  $user = readUser($mail);

  
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  
  <title>USTHB Admin - Modification de l'utilisateur </title>
  <?php include_once('../includes/head.php'); ?>
</head>
</head>

<body>
  <?php include_once('../includes/header.php'); ?>
  <?php include_once('../includes/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Modification de l'utilisateur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
          <li class="breadcrumb-item">Formulaires</li>
          <li class="breadcrumb-item active">Modification de l'utilisateur</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Modifier un utilisateur</h5>

               <!-- Horizontal Form -->
              <form method="get" action="../forms/modif_form.php">
                <div class="row mb-3">
                  <label for="id" class="col-sm-2 col-form-label">ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $user['ID']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">NOM_PRENOM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $user['NOM_PRENOM']; ?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['EMAIL']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">MOT_PASSE</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $user['MOT_PASSE']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tel" class="col-sm-2 col-form-label">TEL</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $user['TEL']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="faculte" class="col-sm-2 col-form-label">FACULTE</label>
                  <div class="col-sm-10">
                  <select id="inputState" class="form-select" name="fac" id="faculte" >
                    <option value=""><?php echo $user['FACULTE']; ?></option>
                    <?php foreach($facultes as $faculte): ?>
                    <option ><?php echo $faculte['FACCODE'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="type" class="col-sm-2 col-form-label">TYPE</label>
                  <div class="col-sm-10">
                  <select id="inputState" class="form-select" name="type" id="type">
                    <option value=""><?php echo $user['TYPE']; ?></option>
                    <option>Admin</option>
                    <option>User</option>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="enabled" class="col-sm-2 col-form-label">ENABLED</label>
                  <div class="col-sm-10">
                  <select id="inputState" class="form-select" name="enabled" id="enabled">
                    <option value=""><?php echo $user['ENABLED']; ?></option>
                    <option>Oui</option>
                    <option>Non</option>
                  </select>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
              </form><!-- End Horizontal Form -->

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

