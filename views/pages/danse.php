<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Club de danse à l'ESMIA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f4f8;
      color: #2c3e50;
    }

    .hero {
      text-align: center;
      padding: 3rem 1rem;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: white;
      margin-bottom: 3rem;
    }

    .grid-container {
      display: flex;
      grid-template-columns: 2fr 1fr;
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.5rem 3rem;
    }

    .form-card {
      background: white;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-card h2 {
      margin-bottom: 1rem;
      font-weight: 600;
    }

    .styled-input, .styled-label {
      display: flex;
      width: 100%;
      margin-bottom: 1rem;
    }

    .styled-input {
      padding: 0.75rem;
      font-size: 1rem;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    .form-card button {
      width: 100%;
      padding: 0.75rem;
      font-size: 1.1rem;
      background-color: #2575fc;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .form-card button:hover {
      background-color: #1a5fe0;
    }

    .message {
      margin-top: 1rem;
      color: red;
      font-weight: 500;
    }

    .info-cards {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .info-card {
      background: white;
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
      text-align: center;
    }

    .info-card img {
      width: 50%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 0.75rem;
    }

    .info-card p {
      margin: 0;
      font-size: 2rem;
    }

    @media(max-width: 768px) {
      .grid-container {
        grid-template-columns: 1fr;
      }

      .hero {
        padding: 2rem 1rem;
      }
    }
  </style>
</head>
<body>

  <div class="hero">
    <h1>Club de Danse de l'ESMIA</h1>
    <p>Rejoins-nous pour exprimer ta passion à travers la danse. Inscris-toi dès maintenant !</p>
  </div>

  <div class="grid-container">
    <div class="form-card">
      <h2>Inscription au Club</h2>
      <p>Envie de bouger, de t’exprimer et de faire le show ?</p>
      <form method="POST" action="inscrireClub">
        <label for="nie" class="styled-label">NIE</label>
        <input type="text" id="nie" name="nie" class="styled-input" placeholder="Votre NIE" required />
        <button type="submit">Rejoindre le club</button>
       
      </form>
        <div class="info-cards">
      <div class="info-card">
        <h5>Danse Classique</h5>
        <img src="public/img/danse1.jpg" alt="Danse Classique" />
        <p>Grâce, rigueur et passion : entre dans l’univers de la danse classique.</p>
      </div>
      <div class="message"><?= isset($message) ? htmlspecialchars($message) : '' ?></div>
    </div>

  
      <div class="info-card">
        <h5>Zumba</h5>
        <img src="public/img/zumba2.jpg" alt="Zumba" />
        <p>Envie de fun, de rythme et de cardio ? Rejoins la team Zumba !</p>
      </div>
      <div class="info-card">
        <h5>Danse Urbaine</h5>
        <img src="public/img/danse4.jpg" alt="Danse Urbaine" />
        <p>Tu n’as pas besoin de mots pour te faire entendre : laisse ton corps parler.</p>
      </div>
    </div>
  </div>

</body>
</html>
