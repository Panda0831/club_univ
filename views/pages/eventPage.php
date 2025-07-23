<style>
  .highlight-box {
  background-color: #e8f4fd;
  border-left: 5px solid #3498db;
  padding: 1.5rem;
  border-radius: 8px;
  margin: 2rem 0;
  height: 180px;
  width: 700px;
}

.highlight-box h3 {
  margin-bottom: 1rem;
  color: #2c3e50;
}
</style>
<head>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>


<h1 class=" my-5 text-primary fw-bold" style="  font-size: 2.5rem;
  color: #3498db; text-align:center ; text-decoration:underline;">Événements à l'ESMIA</h1>

<div class="event-container">
  <div class="highlight-box">
            <h3>Inscrit toi vite pour participer à nos activités </h3>
            <ul>
                <li>Pour voir les activités de tes clubs</li>
                <li>Participer aux activités</li>
                <li>Créer des relations</li>
                <li>Devenir un membres du bureau</li>
            </ul>
  </div>

<div id="eventCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-left: 7px ;">
  <div class="carousel-inner">
    <?php foreach ($events as $index => $event): ?>
      <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
        <div class="d-flex justify-content-center">
          <?php require "views/components/card_event.php"; ?>
        </div>
      </div>
    <?php endforeach; ?>

  </div>

  <!-- Contrôles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Précédent</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
  </button>
</div>
<br><br>


</div>
<!-- Bootstrap JS (carrousel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


