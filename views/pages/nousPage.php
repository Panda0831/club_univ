
<style>
    /* ====== SLOGAN ====== */
.slogant {
  text-align: center;
  padding: 4rem 1rem;
  background: linear-gradient(135deg, #f0f8ff, #ffffff);
  color: #2c3e50;
}

.slogant h1 {
  font-size: 3rem;
  font-weight: 700;
  color: #3498db;
  margin-bottom: 1rem;
}

.slogant p {
  font-size: 1.2rem;
  font-style: italic;
  color: #555;
}

/* ====== EQUIPE ====== */
.equipe {
  padding: 4rem 2rem;
  background-color: #f9f9f9;
}

.section-title {
  text-align: center;
  font-size: 2rem;
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 3rem;
}

.team-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 2rem;
  justify-items: center;
  align-items: stretch;
}

.team-member {
  background: #fff;
  border-radius: 12px;
  padding: 1.5rem;
  text-align: center;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s, box-shadow 0.3s;
  max-width: 260px;
}

.team-member:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.team-member img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 1rem;
  border: 3px solid #3498db;
}

.team-member h3 {
  font-size: 1.2rem;
  color: #3498db;
  margin-bottom: 0.5rem;
}

.team-member p {
  font-size: 0.95rem;
  color: #333;
}

/* ====== DESCRIPTION (CITATIONS) ====== */
.description {
  padding: 4rem 2rem;
  background-color: #ffffff;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 1.5rem;
}

.quote {
  background: #f8f9fa;
  padding: 1.5rem;
  border-left: 4px solid #3498db;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.quote h4 {
  color: #2c3e50;
  margin-bottom: 0.5rem;
}

.quote p {
  font-style: italic;
  color: #555;
  font-size: 0.95rem;
}

/* Responsive ajustements */
@media (max-width: 768px) {
  .slogant h1 {
    font-size: 2.2rem;
  }

  .slogant p {
    font-size: 1rem;
  }
}

</style>

<section class="slogant">
  <h1> NEXUS TECH </h1>
  <p>« Hors de notre domaine, mais pas de notre portée. »</p>
</section>

<section class="equipe">
  <h2 class="section-title">Notre équipe</h2>
  <div class="team-container">
    <div class="team-member">
      <a href="https://www.facebook.com/joyceritchy.rakotovao" target="_blank">
        <img src="public/img/Joyce.webp" alt="Joyce">
      </a>
      <h3>Joyce</h3>
      <p>CONCEPTION && FULL STACK</p>
    </div>
    <div class="team-member">
      <a href="https://www.facebook.com/tenessyhennessy" target="_blank">
        <img src="public/img/manjaka.webp" alt="Fanamby">
      </a>
      <h3>Fanamby</h3>
      <p>DATA BASE && FULL STACK</p>
    </div>
    <div class="team-member">
      <a href="https://www.facebook.com/aimelie.tang" target="_blank">
        <img src="public/img/Tang.webp" alt="Willia Tang">
      </a>
      <h3>Willia Tang</h3>
      <p>CONCEPTION && FRONT-END</p>
    </div>
    <div class="team-member">
      <a href="https://www.facebook.com/ryan.avotra" target="_blank">
        <img src="public/img/Ryan.webp" alt="Ryan">
      </a>
      <h3>Ryan</h3>
      <p>CONCEPTION && FRONT-END</p>
    </div>
  </div>
</section>

<section class="description">
  <div class="quote">
    <h4>Joyce</h4>
    <p>"Pour moi, l'amour et la haine ne se trouvent qu'à un pas."</p>
  </div>
  <div class="quote">
    <h4>Fanamby</h4>
    <p>"Mange la vie à pleines dents."</p>
  </div>
  <div class="quote">
    <h4>Willia Tang</h4>
    <p>"Je l'aime à mourir."</p>
  </div>
  <div class="quote">
    <h4>Ryan</h4>
    <p>"À une prochaine fois."</p>
  </div>
</section>
