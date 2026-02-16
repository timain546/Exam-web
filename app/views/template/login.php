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
  <main class="position-absolute top-50 start-50 translate-middle">
    <section class="island">
      <h1>Connexion</h1>
      <form id="loginForm">
        <div class="mb-3">
          <label class="form-label">Nom</label>
          <div class="input-group">
            <span class="input-group-text"><span class="ri-user-line"></span></span>
            <input type="text" id="nameInput" class="form-control">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Mot de passe</label>
          <div class="input-group">
            <span class="input-group-text ri-lock-password-line"></span>
            <input type="password" id="passwordInput" class="form-control">
            <button type="button" id="showPasswordButton" class="btn btn-outline-dark ri-eye-line"></button>
          </div>
        </div>
        <div class="alert alert-danger mb-3">
          <span><span class="ri-alert-line"></span> Nom/Mot de passe incorrect</span>
        </div>
        <button type="submit" class="btn btn-primary mx-auto d-block">Se connecter</button>
      </form>
    </section>
  </main>


  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/js/login-admin.js"></script>
</body>
</html>
