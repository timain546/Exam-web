<?php

$products = [
    ['name' => 'iPhone', 'category' => 'Smartphone', 'price' => 10000],
    ['name' => 'Renault', 'category' => 'Véhicule', 'price' => 2000],
    ['name' => 'Mazda', 'category' => 'Véhicule', 'price' => 1000],
    ['name' => 'Asus', 'category' => 'Ordinateur', 'price' => 5800],
    ['name' => 'Samsung', 'category' => 'Smartphone', 'price' => 4000],
    ['name' => 'Xiaomi', 'category' => 'Smartphone', 'price' => 8200],
    ['name' => 'Toyota', 'category' => 'Véhicule', 'price' => 5000],
];

?>

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
  <title>App | Home</title>
</head>
<body>
  <div class="d-flex container flex-column" style="height: 100vh;">
    <!-- header -->
    <?php include(__DIR__ . '/../shared/header.php'); ?>

    <div class="d-flex flex-grow-1 gap-3 overflow-auto">
      <!-- sidebar -->
      <?php include(__DIR__ . '/../shared/sidebar.php'); ?>

      <div id="mainDiv" class="d-flex flex-column flex-grow-1 overflow-auto">
        <!-- contenu principal -->
        <main class="flex-grow-1">
          <header id="page-title">Produits</header>

          <section class="island">
            <form action="#" method="get">
              <div class="hstack align-items-stretch gap-3">
                <div class="form-floating flex-grow-1">
                  <input name="name" type="text" class="form-control" placeholder="Nom">
                  <label>Nom</label>
                </div>
                <div class="form-floating">
                  <select name="category" class="form-select">
                    <option value="0">Tous</option>
                    <option value="1">Neuf</option>
                    <option value="2">Occasion</option>
                  </select>
                  <label>Catégorie</label>
                </div>
                <button type="submit" class="btn btn-primary"><span class="ri-search-line"></span> Rechercher</button>
              </div>
            </form>
          </section>

          <section class="island">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
              <?php foreach ($products as $prod) { ?>
                <div class="col">
                  <article class="card h-100">
                    <img src="assets/images/default-image.png" class="card-img-top">
                    <div class="card-body">
                      <h3 class="card-title"><?= $prod['name'] ?></h3>
                      <p class="card-text"><?= $prod['category'] ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                      <div class="hstack gap-2">
                        <a class="btn btn-warning ms-auto">Modifier</a>
                        <a class="btn btn-danger">Supprimer</a>
                      </div>
                    </div>
                  </article>
                </div>
              <?php } ?>
            </div>
          </section>
        </main>

        <!-- footer -->
        <?php include(__DIR__ . '/../shared/footer.php'); ?>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/login-admin.js"></script>
</body>
</html>
