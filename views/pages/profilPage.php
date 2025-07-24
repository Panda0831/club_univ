<?php
session_start();
$utilisateur = $_SESSION['utilisateur'] ?? null;

if (!$utilisateur) {
    echo "<p>Erreur : utilisateur non connecté.</p>";
    exit;
}

require_once 'models/Utilisateur.php';
$model = new Utilisateur();

$nombreClubs = $model->getNombreClubsInscrits($utilisateur['id_utilisateur']);
$nombreActivites = $model->getNombreActivites($utilisateur['id_utilisateur']);
$nombreCommentaires = $model->getNombreCommentaires($utilisateur['id_utilisateur']); // À créer dans le modèle
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Mon Profil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      border-radius: 12px;
    }
    .profile-img {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
    .info-label {
      font-weight: bold;
      color: #555;
    }
    .info-value {
      color: #333;
    }
  </style>
</head>
<body>
<section class="p-4">
  <h1>Mon Profil</h1>
  <div class="card mt-4 shadow-sm p-4">
    <div class="d-flex gap-4 align-items-center">
      <img
        src="<?= !empty($utilisateur['image']) ? htmlspecialchars($utilisateur['image']) : 'public/img/user.png' ?>"
        class="rounded-circle profile-img"
        alt="Photo de profil"
        onerror="this.onerror=null;this.src='public/img/user.png';"
      >
      <div>
        <h4 class="mb-3">Mes Informations</h4>
        <p><span class="info-label">Nom :</span> <span class="info-value"><?= htmlspecialchars($utilisateur['nom']) ?></span></p>
        <p><span class="info-label">Prénom :</span> <span class="info-value"><?= htmlspecialchars($utilisateur['prenom']) ?></span></p>
        <p><span class="info-label">NIE :</span> <span class="info-value"><?= htmlspecialchars($utilisateur['nie']) ?></span></p>
        <p><span class="info-label">Filière :</span> <span class="info-value"><?= htmlspecialchars($utilisateur['filiere']) ?></span></p>
        <p><span class="info-label">Niveau :</span> <span class="info-value"><?= htmlspecialchars($utilisateur['niveau']) ?></span></p>
        <p><span class="info-label">Email :</span> <span class="info-value"><?= htmlspecialchars($utilisateur['email']) ?></span></p>
      </div>
    </div>
  </div>
</section>

<main class="p-4">
  <h2>Tableau de bord</h2>
  <div class="row mt-4">

    <!-- Clubs rejoints -->
    <div class="col-md-4">
      <div class="card shadow-sm text-center p-3">
        <h5 class="card-title">Clubs rejoints</h5>
        <p class="card-text fs-3"><?= intval($nombreClubs) ?></p>

        <button type="button" class="btn btn-success w-100" onclick="toggleDropdown()">Voir mes clubs</button>

        <form method="POST" action="clubs" id="dropdownForm" class="mt-3 d-none">
          <select name="id_club" class="form-select mb-2" required>
            <?php foreach ($mesClubs as $club): ?>
              <option value="<?= $club['id_club'] ?>"><?= htmlspecialchars($club['nom_club']) ?></option>
            <?php endforeach; ?>
          </select>
          <button type="submit" class="btn btn-primary w-100">Accéder au club</button>
        </form>
      </div>
    </div>

    <!-- Activités -->
    <div class="col-md-4">
      <div class="card shadow-sm text-center p-3">
        <h5 class="card-title">Activités</h5>
        <p class="card-text fs-3"><?= intval($nombreActivites) ?></p>
      </div>
    </div>

    <!-- Commentaires -->
    <div class="col-md-4">
      <div class="card shadow-sm text-center p-3">
        <h5 class="card-title">Commentaires</h5>
        <p class="card-text fs-3"><?= intval($nombreCommentaires) ?></p>
      </div>
    </div>

  </div>
</main>

<script>
  function toggleDropdown() {
    const form = document.getElementById('dropdownForm');
    form.classList.toggle('d-none');
  }
</script>
