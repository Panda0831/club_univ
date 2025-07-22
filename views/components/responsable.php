
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $description ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <title><?= htmlspecialchars($title) ?></title>
      <style>
        /* Bouton du menu dropdown */
    #dropdownProfil {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      padding: 0.5rem 0.75rem;
      border-radius: 8px;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }

    #dropdownProfil:hover {
      background-color: #e2e6ea;
    }

    /* Icône à l'intérieur du bouton */
    #dropdownProfil i {
      color: #007bff;
      transition: color 0.3s ease;
    }

    #dropdownProfil:hover i {
      color: #0056b3;
    }

    /* Dropdown menu styling */
    .dropdown-menu {
      border-radius: 10px;
      padding: 0.5rem 0;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      animation: fadeIn 0.2s ease-in-out;
      min-width: 220px;
    }

    /* Animation douce */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-5px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Élément du menu */
    .dropdown-item {
      padding: 0.6rem 1.2rem;
      font-weight: 500;
      font-size: 0.95rem;
      color: #343a40;
      transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
      background-color: #e9ecef;
      color: #007bff;
    }

    /* Lien de déconnexion */
    .dropdown-item.text-danger {
      color: #dc3545;
    }

    .dropdown-item.text-danger:hover {
      background-color: #f8d7da;
      color: #a71d2a;
    }

    /* Séparateur */
    .dropdown-divider {
      margin: 0.3rem 0;
    }

      </style>
</head>
<body class="min-vh-100 d-flex flex-column bg-light">
<header>
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
        <div class="d-flex flex-wrap gap-4 mt-3 mt-lg-0 align-items-center">
          <a href="mesClubs" class="btn btn-outline-primary">clubs</a>
          <a href="mesEvenement" class="btn btn-outline-primary">Évents</a>
          <a href="aide" class="btn btn-outline-primary">Aide</a>

          <!-- 🔔 Icône de notification -->
          <a href="notification" class="btn btn-light border position-relative">
            <i class="fas fa-bell fa-lg"></i>
            <!-- Badge de notification -->
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
              <span class="visually-hidden">Nouvelles notifications</span>
            </span>
          </a>

          <!-- ⚙️ Menu paramètre avec dropdown -->
          <div class="dropdown">
            <button class="btn btn-light border dropdown-toggle" type="button" id="dropdownProfil" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-cog fa-lg"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfil">
              <li><a class="dropdown-item" href="profil">Voir mon profil</a></li>
              <li><a class="dropdown-item" href="profil">Ajouter évènement</a></li>
              <li><a class="dropdown-item" href="profil">Lister membres</a></li>

              <li><a class="dropdown-item" href="parametres">Paramètres</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="logout">Déconnexion</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>

<main class="container py-5 flex-grow-1">
  <?= $content ?>
</main>

<?php require_once 'views/components/footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
