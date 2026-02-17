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
  <title>BNGRC | Simulation de dispatch</title>
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
          <header id="page-title">Simulation de dispatch des dons</header>

          <section class="island">
            <form id="dispatchForm">
              <div class="hstack align-items-stretch gap-3">
                <div class="form-floating flex-grow-1">
                  <select id="modeSelect" name="mode" class="form-select">
                    <option value="0">Le plus ancien est satisfait en premier</option>
                    <option value="1">Le moins nombreux est satisfait en premier</option>
                    <option value="2">Proportionnellement</option>
                  </select>
                  <label>Mode de dispatch</label>
                </div>
                <button id="simulateButton" type="button" class="btn btn-secondary">Simuler</button>
                <button type="submit" class="btn btn-primary">Valider</button>
              </div>
            </form>
          </section>

          <section class="island">
            <table class="table">
              <thead>
                <tr>
                  <th>Ville</th>
                  <th>Produit</th>
                  <th>Besoin</th>
                  <th>Résultat du dispatch</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($besoins as $besoin) { ?>
                  <tr>
                    <td><?= $besoin['nom_ville'] ?></td>
                    <td><?= $besoin['nom_produit'] ?></td>
                    <td><?= $besoin['quantite_restante'] ?> <?= $besoin['unite_produit'] ?></td>
                    <td id="besoin-<?= $besoin['id_besoin'] ?>"
                        data-quantite="<?= $besoin['quantite'] ?>"
                        data-unite="<?= $besoin['unite_produit'] ?>">
                      <span class="quantiteApresDispatch"><?= $besoin['quantite_restante'] ?></span>
                      <?= $besoin['unite_produit'] ?>
                      <span class="badge rounded-pill text-bg-success">
                        <span class="quantiteDiff"></span>
                      </span>
                    </td>
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


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/simulationDispatch.js"></script>
</body>
</html>
