<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Base url -->
  <base href="<?= Flight::get('flight.base_url') ?>">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/remixicon/remixicon.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>BNGRC | Réinitialisation</title>
</head>
<body>
  <div class="d-flex container flex-column" style="height: 100vh;">
    <!-- header -->
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <div class="d-flex flex-grow-1 gap-3 overflow-auto">
      <!-- sidebar -->
      <?php include(__DIR__ . '/shared/sidebar.php'); ?>

      <div id="mainDiv" class="d-flex flex-column flex-grow-1 overflow-auto">
        <!-- contenu principal -->
        <main class="flex-grow-1">
          <header id="page-title">Réinitialisation</header>

          <section class="island">
            <h3>Attention, cette action est irréversible</h3>
            <button id="reinitButton" class="btn btn-danger">Réinitialiser</button>
          </section>
        </main>

        <!-- footer -->
        <?php include(__DIR__ . '/shared/footer.php'); ?>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/reinit.js"></script>
</body>
</html>
