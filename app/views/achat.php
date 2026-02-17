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
  <title>BNGRC | Nouveau achat</title>
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
          <header id="page-title">Nouveau achat</header>

          <section class="island">
            <table class="table">
              <thead>
                <tr>
                  <th>Ville</th>
                  <th>Produit</th>
                  <th>Besoin</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($besoins as $besoin) { ?>
                  <tr id="besoin-<?= $besoin['id_besoin'] ?>" class="besoin"
                    data-id-besoin="<?= $besoin['id_besoin'] ?>"
                    data-nom-produit="<?= $besoin['nom_produit'] ?>"
                    data-quantite-produit="<?= $besoin['quantite_restante'] ?>"
                    data-unite-produit="<?= $besoin['unite_produit'] ?>"
                  >
                    <td><?= $besoin['nom_ville'] ?></td>
                    <td><?= $besoin['nom_produit'] ?></td>
                    <td><?= $besoin['quantite_restante'] ?> <?= $besoin['unite_produit'] ?></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#achatModal">Acheter</button></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </section>
        </main>

        <!-- footer -->
        <?php include(__DIR__ . '/shared/footer.php'); ?>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="achatModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Achat du besoin de : <span id="nomProduitSpan"></span></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="achatForm">
            <div class="mb-3">
              <label class="form-label">Date</label>
              <div class="input-group">
                <span class="input-group-text"><span class="ri-calendar-line"></span></span>
                <input type="date" id="date_achat" name="date_achat" class="form-control">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Quantité</label>
              <div class="input-group">
                <span class="input-group-text"><span class="ri-hashtag"></span></span>
                <input type="number" id="quantite" name="quantite" class="form-control">
                <span class="input-group-text"><span id="uniteProduitSpan"></span></span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Taux d’achat</label>
              <div class="input-group">
                <span class="input-group-text"><span class="ri-percent-line"></span></span>
                <input type="number" step="0.01" id="taux" name="taux" class="form-control">
              </div>
            </div>
            <div id="achatErrorDiv" class="alert alert-danger mb-3">
              <span><span class="ri-alert-line"></span> <span class="message"></span></span>
            </div>
            <button type="submit" class="btn btn-primary ms-auto d-block">Valider</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/achat.js"></script>
</body>
</html>
