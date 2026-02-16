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
  <title>BNGRC | Nouveau besoin</title>
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
          <header id="page-title">Nouveau don</header>

          <section class="island">
            <form id="createDonForm">
              <div class="mb-3">
                <label class="form-label">Date</label>
                <div class="input-group">
                  <span class="input-group-text"><span class="ri-calendar-line"></span></span>
                  <input type="date" id="date_besoin" name="date_don" class="form-control">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Produit</label>
                <div class="input-group">
                  <span class="input-group-text"><span class="ri--line"></span></span>
                  <input type="number" id="quantite" name="quantite" class="form-control">
                  <span class="input-group-text"><span id="uniteProduitSpan"></span> de</span>
                  <select id="id_produit" name="id_produit" class="form-select">
                    <?php foreach ($produits as $produit) { ?>
                      <option value="<?= $produit['id_produit'] ?>"><?= $produit['nom'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary ms-auto d-block">Valider</button>
            </form>
          </section>
        </main>

        <!-- footer -->
        <?php include(__DIR__ . '/shared/footer.php'); ?>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/formDons.js"></script>
</body>
</html>
