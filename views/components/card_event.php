<!-- Bootstrap CSS -->
<style>
    .card:hover {
    transform: scale(1.01);
    transition: transform 0.3s ease;
}

</style>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<div class="d-flex justify-content-center mt-5" style="height:800px;">
  <div class="card shadow-lg rounded-4 border-0" style="width: 600px; overflow: hidden;">

    <!-- Image de couverture -->
    <img src="public/<?= htmlspecialchars($event['image']) ?>" 
         class="card-img-top" 
         alt="Activité à venir" 
         style="object-fit: cover; height: 250px;">

    <div class="card-body p-4">
      <!-- Titre -->
      <h4 class="card-title text-center mb-4 fw-bold text-primary">
        <?= htmlspecialchars($event['nom_activite']) ?>
      </h4>

      <!-- Informations -->
      <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          <span><i class="fas fa-map-marker-alt me-2 text-danger"></i><strong>Lieu:</strong></span>
          <span><?= htmlspecialchars($event['lieu']) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          <span><i class="fas fa-door-open me-2 text-secondary"></i><strong>Type:</strong></span>
          <span><?= htmlspecialchars($event['type_activite']) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          <span><i class="fas fa-calendar-alt me-2 text-success"></i><strong>Date:</strong></span>
          <span><?= htmlspecialchars($event['date_activite']) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          <span><i class="fas fa-clock me-2 text-warning"></i><strong>Fin inscription:</strong></span>
          <span><?= htmlspecialchars($event['date_fin_inscription']) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          <span><i class="fas fa-users me-2 text-info"></i><strong>Participants max:</strong></span>
          <span><?= htmlspecialchars($event['participants_max']) ?></span>
        </li>
      </ul>

      <!-- Description -->
      <p class="card-text text-muted text-center fst-italic">
        <?= htmlspecialchars($event['description']) ?>
      </p>

      <!-- Boutons -->
      <div class="d-flex justify-content-around mt-4">
        <a href="#" class="btn btn-success px-4 shadow-sm">
          <i class="fas fa-sign-in-alt me-2"></i>Participer
        </a>
        <a href="#" class="btn btn-outline-primary px-4 shadow-sm">
          <i class="fas fa-comment-alt me-2"></i>Commenter
        </a>
      </div>
    </div>
  </div>
</div>
