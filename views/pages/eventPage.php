<head>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>


<h1 class=" my-5 text-primary fw-bold" style="  font-size: 2.5rem;
  color: #3498db; margin-left:4cm ; text-decoration:underline;">Événements à l'ESMIA</h1>

<div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
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




<!-- Bootstrap JS (carrousel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
