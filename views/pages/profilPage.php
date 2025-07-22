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


<body>
<section class="p-4">
  <h1>Mon Profil</h1>
  <div class="card mt-4 shadow-sm p-4">
    <div class="d-flex gap-4">
      <img src="public/img/user.png" class="rounded-circle" width="100" alt="Photo" height="100">
      <div>
        <h3>Mon profil perso</h3>
        <p>Nom: </p>
        <p>Prenom:</p>
        <p>Nie:</p>
        <p>Email : </p>
      </div>
    </div>
  </div>
</section>

<main class="p-4">
  <h1>Tableau de bord</h1>
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
</body>
