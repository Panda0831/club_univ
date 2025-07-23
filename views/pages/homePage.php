<style>
  /* ====== GENERAL ====== */
  .page-clubs body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
    background-color: #f5f7fa;
    color: #2c3e50;
    line-height: 1.6;
  }

  .page-clubs .description {
    padding: 4rem 2rem;
    text-align: center;
    background: #ffffff;
  }

  .page-clubs .description h1 {
    font-size: 2.5rem;
    color: #3498db;
    margin-bottom: 1rem;
  }

  .page-clubs .description p {
    font-size: 1.1rem;
    color: #555;
    max-width: 800px;
    margin: 1rem auto;
  }

  .page-clubs .clubs-container {
    padding: 4rem 2rem;
    background-color: #f9f9f9;
    text-align: center;
  }

  .page-clubs .section-title {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 3rem;
  }

  .page-clubs .carousel-container {
    position: relative;
    overflow: hidden;
  }

  .page-clubs .club-cards {
    display: flex;
    gap: 2rem;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 1rem 0;
  }

  .page-clubs .club-card {
    min-width: 260px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s;
    flex-shrink: 0;
  }

  .page-clubs .club-card:hover {
    transform: translateY(-6px);
  }

  .page-clubs .club-image {
    height: 200px;
    background-size: cover;
    background-position: center;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  .page-clubs .club-info {
    padding: 1rem;
  }

  .page-clubs .club-info h3 {
    color: #3498db;
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
  }

  .page-clubs .club-info p {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 1rem;
  }

  .page-clubs .btn {
    display: inline-block;
    padding: 0.5rem 1.2rem;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
    transition: background-color 0.3s;
  }

  .page-clubs .btn:hover {
    background-color: #2980b9;
  }

  .page-clubs .carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: #3498db;
    color: #fff;
    border: none;
    font-size: 1.5rem;
    padding: 0.3rem 0.8rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s;
    z-index: 1;
  }

  .page-clubs .carousel-nav:hover {
    background: #2980b9;
  }

  .page-clubs .prev {
    left: 0;
  }

  .page-clubs .next {
    right: 0;
  }

  @media (max-width: 768px) {
    .page-clubs .description h1 {
      font-size: 2rem;
    }

    .page-clubs .description p {
      font-size: 1rem;
    }

    .page-clubs .section-title {
      font-size: 1.6rem;
    }

    .page-clubs .carousel-nav {
      display: none;
    }
  }

  /* === HIGHLIGHT BOX === */
  .highlight-box {
    background-color: #e8f4fd;
    border-left: 5px solid #3498db;
    padding: 1.5rem;
    border-radius: 8px;
    margin: 2rem 0;
  }

  .highlight-box h3 {
    margin-bottom: 1rem;
    color: #2c3e50;
  }
</style>

<body>

  <div class="page-clubs">
    <section class="description">
      
      <?php session_start(); ?>
      <?php if (isset($_SESSION['utilisateur']) ){ ?>
        <h1>Bienvenue, <?= htmlspecialchars($_SESSION['utilisateur']['nom']) ?> !</h1>
      <?php } else { ?>
        <h1>Bienvenue sur la page des clubs de l'ESMIA !</h1>
      <?php } ?>
      <h1>Nos clubs à l'ESMIA</h1>
      <p>
        Rejoins une communauté dynamique et passionnée !<br>
        Développe tes talents, partage tes passions, et vis des expériences inoubliables au sein de nos clubs universitaires.
      </p>
      <p>
        Sport, culture, technologie, entraide... Il y a un club pour chacun.<br>
        Inscris-toi et fais vibrer ta vie étudiante !
      </p>
    </section>
    <section id="clubs" class="clubs-container">
      <h2 class="section-title">Nos clubs disponibles</h2>
      <div class="carousel-container">
        <button class="carousel-nav prev">&lt;</button>
        <div class="club-cards">
          <div class="club-card">
            <div class="club-image" style="background-image: url('public/img/event.webp');"></div>
            <div class="club-info">
              <h3>Club Événements</h3>
              <p>Anime la vie du campus en organisant des événements festifs, culturels et solidaires.</p>
              <a href="evenement" class="btn">Voir plus</a>
            </div>
          </div>
          <div class="club-card">
            <div class="club-image" style="background-image: url('public/img/hackaton.webp');"></div>
            <div class="club-info">
              <h3>Club Hackathon</h3>
              <p>L'informatique n' est pas simplement fait pour les matheux</p>
              <a href="hackaton" class="btn">Voir plus</a>
            </div>
          </div>
          <div class="club-card">
            <div class="club-image" style="background-image: url('public/img/sport.webp');"></div>
            <div class="club-info">
              <h3>Club Sport</h3>
              <p>Venez nous rejoindre pour faire du sport et garantir un bonne santé</p>
              <a href="" class="btn">Voir plus</a>
            </div>
          </div>
          <div class="club-card">
            <div class="club-image" style="background-image: url('public/img/danse1.webp');"></div>
            <div class="club-info">
              <h3>Club Danse</h3>
              <p>Découvre et pratique différents styles de danse lors d'ateliers et de spectacles.</p>
              <a href="danse" class="btn">Voir plus</a>
            </div>
          </div>
        </div>
        <button class="carousel-nav next">&gt;</button>
      </div>
    </section>
  </div>
  <div class="highlight-box">
    <h3>Pourquoi rejoindre un club à l'ESMIA ?</h3>
    <ul>
      <li>Développer des compétences transversales (leadership, travail d'équipe)</li>
      <li>Élargir son réseau professionnel et amical</li>
      <li>Valoriser son parcours académique</li>
      <li>Contribuer à des projets concrets</li>
    </ul>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const carousel = document.querySelector('.club-cards');
      const cards = document.querySelectorAll('.club-card');
      const prevBtn = document.querySelector('.prev');
      const nextBtn = document.querySelector('.next');
      let scrollAmount = 0;
      const cardWidth = cards[0].offsetWidth + 32; // width + gap

      function updateNav() {
        prevBtn.disabled = carousel.scrollLeft <= 0;
        nextBtn.disabled = carousel.scrollLeft + carousel.offsetWidth >= carousel.scrollWidth - 1;
      }

      prevBtn.addEventListener('click', function() {
        carousel.scrollBy({
          left: -cardWidth,
          behavior: 'smooth'
        });
        setTimeout(updateNav, 100);
      });
      nextBtn.addEventListener('click', function() {
        carousel.scrollBy({
          left: cardWidth,
          behavior: 'smooth'
        });
        setTimeout(updateNav, 400);
      });
      carousel.addEventListener('scroll', updateNav);
      window.addEventListener('resize', updateNav);
      updateNav();
    });
  </script>
</body>