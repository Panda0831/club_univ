<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once 'views/includes/responsable.php'; 
    ?>
  <meta charset="UTF-8">
  <title>Tableau de bord Responsable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0b3b6d9.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .dashboard-card {
      border: none;
      border-radius: 16px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .dashboard-icon {
      font-size: 40px;
      color: #0d6efd;
      margin-bottom: 15px;
    }

    .profile-card {
      border: none;
      border-radius: 16px;
      background: white;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .profile-info i {
      color: #0d6efd;
      margin-right: 8px;
    }

    .nav-link {
      color: #333;
      font-weight: 500;
    }

    .nav-link:hover {
      color: #0d6efd;
    }
  </style>
</head>
<body>
  <section class="p-4">
    <?php
    session_start();
    $utilisateur = $_SESSION['utilisateur'] ?? null;

    if (!$utilisateur || $utilisateur['role'] !== 'responsable') {
        echo "<p>Accès refusé. Vous devez être responsable pour accéder à cette page.</p>";
        exit;
    }
    ?>
    <h1 class="mb-4">Bienvenue, <?= htmlspecialchars($utilisateur['prenom']) ?></h1>

    <div class="profile-card d-flex flex-column flex-md-row align-items-center gap-4">
      <img src="public/img/user.png" class="rounded-circle border" width="120" height="120" alt="Photo de profil">
      <div class="profile-info">
        <h4 class="mb-3">Informations personnelles</h4>
        <p><i class="fas fa-user"></i> <strong>Nom :</strong> <?= htmlspecialchars($utilisateur['nom']) ?></p>
        <p><i class="fas fa-user-tag"></i> <strong>Prénom :</strong> <?= htmlspecialchars($utilisateur['prenom']) ?></p>
        <p><i class="fas fa-envelope"></i> <strong>Email :</strong> <?= htmlspecialchars($utilisateur['email']) ?></p>
        <p><i class="fas fa-user-shield"></i> <strong>Rôle :</strong> <?= htmlspecialchars($utilisateur['role']) ?></p>
        <p><i class="fas fa-users"></i> <strong>Club administré :</strong> <?= htmlspecialchars($utilisateur['nom_club']) ?></p>
      </div>
    </div>
  </section>

  <main class="p-4">
    <h2 class="mb-4">Tableau de bord Administrateur</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card dashboard-card shadow-sm text-center p-4">
          <i class="fas fa-users-cog dashboard-icon"></i>
          <h5 class="card-title mb-3">LES ACTIVITES</h5>
          <a href="/clubs/gerer" class="btn btn-outline-primary">Accéder</a>
        </div>
      </div>
<div class="col-md-4">
  <div class="card dashboard-card shadow-sm text-center p-4">
    <i class="fas fa-calendar-alt dashboard-icon"></i>
    <h5 class="card-title mb-3">Gérer mon club</h5>

<a href="gererMonClub" class="btn btn-outline-primary">Accéder</a>
  </div>
</div>




      <div class="col-md-4">
        <div class="card dashboard-card shadow-sm text-center p-4">
          <i class="fas fa-envelope dashboard-icon"></i>
          <h5 class="card-title mb-3">Envoyer un message</h5>
          <a href="/messages/creer" class="btn btn-outline-primary">Accéder</a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
