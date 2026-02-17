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
  <title>BNGRC | Récapitulatifs</title>
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
          <header id="page-title">Récapitulatifs</header>

          <section class="island">
            <button type="button" id="refreshButton" class="btn btn-primary">Rafraîchir</button>
          </section>

          <section class="island">
            <h3>Besoins totaux</h3>
            <p><span id="besoinTotalSpan"></span> Ar</p>
          </section>

          <section class="island">
            <h3>Besoins satisfaits</h3>
            <p><span id="besoinSatisfaitSpan"></span> Ar</p>
          </section>

          <section class="island">
            <h3>Besoins restants</h3>
            <p><span id="besoinRestantSpan"></span> Ar</p>
          </section>
        </main>
        <!-- footer -->
        <?php include(__DIR__ . '/shared/footer.php'); ?>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/recapitulatifs.js"></script>
</body>
</html>
