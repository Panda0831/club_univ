<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Navbar Moderne</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="header.css" /> <!-- Ton CSS personnalisé -->
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3 d-flex align-items-center gap-2" href="home">
        <img src="public/img/esmia_fond_noir.webp" alt="Logo ESMIA" class="logo-esmia" style="width: 1cm;">
        ESMIA UNIVERSITY
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex flex-wrap gap-4 mt-3 mt-lg-0">
          <a href="home" class="btn btn-outline-primary">Home</a>
          <a href="evenement" class="btn btn-outline-primary">Événement</a>
          <a href="nous" class="btn btn-outline-primary">Qui sommes-nous ?</a>
          <a href="apropos" class="btn btn-outline-primary">À propos</a>
          <a href="connexion" class="btn btn-primary">Connexion</a>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
