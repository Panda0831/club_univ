<style>
  body {
    background-color: #f8f9fa;
  }

  .card {
    border: none;
    border-radius: 12px;
  }

  .nav-link {
    color: #333;
    font-weight: 500;
  }

  .nav-link:hover {
    color: #0d6efd;
  }
</style>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<main class="p-4">
  <?php
  session_start();
  if (!isset($_SESSION['utilisateur'])) {
    header('Location: connexion');
    exit();
  }
  ?>
  <h1>Mon Profil</h1>
  <div class="card mt-4 shadow-sm p-4">
    <div class="d-flex gap-4">
     <a href="profilImage"> <img src="<?= htmlspecialchars($_SESSION['utilisateur']['image']) ?>" class="rounded-circle" width="100" alt="Photo" height="100"></a>
      <div>
        <h3>Mon profil perso</h3>
        <p>Nom: <?= htmlspecialchars($_SESSION['utilisateur']['nom']) ?></p>
        <p>Prenom: <?= htmlspecialchars($_SESSION['utilisateur']['prenom']) ?></p>
        <p>Nie: <?= htmlspecialchars($_SESSION['utilisateur']['nie']) ?> </p>
        <p>Email : <?= htmlspecialchars($_SESSION['utilisateur']['email']) ?> </p>
      </div>
    </div>
  </div>
</main>

<main class="p-4">
  <h1>Tableau de bord</h1> //rehefa vita le club sy participation evenement zay vo mety
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Clubs Rejoints</h5>
          <p class="card-text fs-4">3</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Participation aux activités</h5>
          <p class="card-text fs-4">12</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Commentaires</h5>
          <p class="card-text fs-4">5</p>
        </div>
      </div>
    </div>
  </div>
</main>

</div> <!-- .flex-grow-1 -->
</div> <!-- .d-flex -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>