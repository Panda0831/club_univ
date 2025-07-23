<style>
    /* === GLOBAL === */
body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
  background-color: #f5f7fa;
  color: #2c3e50;
  line-height: 1.7;
}

h1, h2, h3 {
  color: #3498db;
}

h1 {
  font-size: 2.5rem;
  text-align: center;
  margin-bottom: 2rem;
}

h2 {
  font-size: 1.8rem;
  margin-top: 2.5rem;
  margin-bottom: 1rem;
}

p, li {
  font-size: 1.05rem;
  color: #444;
}

ul {
  padding-left: 1.5rem;
}

/* === MAIN CONTAINER === */
.main-container {
  padding: 3rem 2rem;
  max-width: auto;
  margin: 0 auto;
  background-color: #ffffff;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  border-radius: 12px;
  margin-bottom: 2rem;
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

/* === CONTENT CONTAINER === */
.content-container {
  padding: 3rem 2rem;
  max-width: auto;
  margin: 0 auto 3rem;
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.stats-box {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  margin-top: 2rem;
  flex-wrap: wrap;
}

.stat-item {
  background: #f0faff;
  padding: 1rem;
  text-align: center;
  border-radius: 10px;
  flex: 1 1 30%;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.stat-number {
  display: block;
  font-size: 2rem;
  font-weight: bold;
  color: #3498db;
}

.stat-label {
  font-size: 1rem;
  color: #666;
  margin-top: 0.5rem;
}

/* === FEATURES === */
.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 1.5rem;
  margin-top: 2rem;
}

.feature-card {
  background: #f9f9f9;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
  transition: transform 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-5px);
}

.feature-card h3 {
  font-size: 1.1rem;
  color: #2c3e50;
  margin-bottom: 0.8rem;
}

/* === TEAM SECTION === */
.team-section ul {
  list-style: "👤 ";
  padding-left: 1.5rem;
  margin-top: 1rem;
}

/* === CONTACT SECTION === */
.contact-section {
  margin-top: 3rem;
  padding-top: 2rem;
  border-top: 1px solid #ddd;
}

.opening-hours {
  background-color: #eef6fb;
  padding: 1rem;
  border-left: 4px solid #3498db;
  margin-top: 1rem;
  border-radius: 6px;
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
  .stats-box {
    flex-direction: column;
  }

  .stat-item {
    width: 100%;
  }

  h1 {
    font-size: 2rem;
  }

  h2 {
    font-size: 1.5rem;
  }
}

</style>

<body>
    <link rel="stylesheet" href="public/style/style.css">
    <section class="main-container">
        <h1>À propos de la plateforme d'inscription au club universitaire ESMIA</h1>
        <p>
            Les clubs universitaires constituent un pilier essentiel dans l'épanouissement des étudiants. 
            Bien plus que de simples activités parascolaires, ces espaces de partage et de création 
            participent activement à la construction identitaire et professionnelle des membres.
        </p>
        
        <div class="highlight-box">
            <h3>Pourquoi rejoindre un club à l'ESMIA ?</h3>
            <ul>
                <li>Développer des compétences transversales (leadership, travail d'équipe)</li>
                <li>Élargir son réseau professionnel et amical</li>
                <li>Valoriser son parcours académique</li>
                <li>Contribuer à des projets concrets</li>
            </ul>
        </div>

        <h2>Notre histoire</h2>
        <p>
            Jusqu'à présent, la gestion des inscriptions aux différents clubs se faisait de manière 
            décentralisée, entraînant plusieurs défis majeurs :
        </p>
        <ul>
            <li>Des milliers de fiches papier à gérer pour les responsables</li>
            <li>Un manque de visibilité sur l'offre complète des activités</li>
            <li>Des étudiants découragés par la complexité des processus</li>
            <li>Une difficulté à maintenir à jour les informations</li>
        </ul>
        
        <p>
            Face à ces constats, <strong>NEXUS TECH</strong>, une équipe dynamique d'étudiants de L1SIO1, 
            a relevé le défi de digitaliser et centraliser ce processus pour le bénéfice de toute 
            la communauté ESMIA.
        </p>
    </section>

    <main class="content-container">
        <section>
            <h2>Bienvenue sur notre plateforme digitale</h2>
            <p>
                Cette plateforme innovante a été spécialement conçue pour simplifier et optimiser 
                l'expérience d'inscription aux divers clubs de l'ESMIA. En quelques clics seulement, 
                découvrez l'ensemble de notre offre et rejoignez la communauté qui correspond 
                à vos aspirations.
            </p>
            
            <div class="stats-box">
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Clubs actifs</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Membres</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
        </section>

        <section>
            <h2>Notre mission</h2>
            <p>
                Le club ESMIA s'engage à créer un environnement stimulant où chaque étudiant peut :
            </p>
            <ul>
                <li>Développer son potentiel à travers des projets concrets</li>
                <li>Échanger avec des professionnels et anciens élèves</li>
                <li>Acquérir des compétences complémentaires à son cursus</li>
                <li>S'impliquer dans la vie étudiante et institutionnelle</li>
            </ul>
        </section>

        <section>
            <h2>Fonctionnalités clés de la plateforme</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>📝 Inscription simplifiée</h3>
                    <p>Processus 100% digital en moins de 5 minutes</p>
                </div>
                <div class="feature-card">
                    <h3>📅 Agenda interactif</h3>
                    <p>Consultez tous les événements à venir</p>
                </div>
                <div class="feature-card">
                    <h3>👥 Réseautage</h3>
                    <p>Connectez-vous avec d'autres membres</p>
                </div>
                <div class="feature-card">
                    <h3>📊 Tableau de bord</h3>
                    <p>Suivez votre participation aux activités</p>
                </div>
            </div>
        </section>

        <section class="team-section">
            <h2>L'équipe NEXUS TECH</h2>
            <p>
                Derrière cette plateforme, une équipe passionnée de 5 étudiants en informatique 
                qui ont consacré plus de 300 heures à ce projet :
            </p>
            <ul>
                <li>Chef de projet : Fanamby Manjaka</li>
                <li>Développeurs : Joyce , Ryan</li>
                <li>Designers : Tang</li>
            </ul>
        </section>

        <section class="contact-section">
            <h2>Contact & Support</h2>
            <p>
                Notre équipe est à votre disposition pour toute question technique ou suggestion 
                d'amélioration. N'hésitez pas à nous contacter par :
            </p>
            <p class="opening-hours">
                <strong>Horaires de support :</strong> Lundi au vendredi, 9h-17h
            </p>
        </section>
    </main>
</body>