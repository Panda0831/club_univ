<style>
    /* ===== FORMULAIRE INSCRIPTION ===== */

body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background-color: #f5f7fa;
  color: #2c3e50;
}

.main-content {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 4rem 1rem;
  min-height: 100vh;
}

.container-form {
  background: #ffffff;
  padding: 2.5rem;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  max-width: 700px;
  width: 100%;
}

.container h1,
.container h2 {
  text-align: center;
  color: #3498db;
  margin-bottom: 1rem;
}

form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 1.2rem;
}

label {
  font-weight: 500;
  display: block;
  margin-bottom: 0.4rem;
}

input {
  width: 100%;
  padding: 0.7rem 1rem;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 1rem;
  background-color: #fafafa;
  transition: border 0.3s;
}

input:focus {
  border-color: #3498db;
  background-color: #fff;
  outline: none;
}

.submit-btn {
  background-color: #3498db;
  color: #fff;
  padding: 0.8rem;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
  margin-top: 1rem;
  transition: background-color 0.3s;
}

.submit-btn:hover {
  background-color: #2980b9;
}

/* Message d'erreur */
.error-message {
  color: #e74c3c;
  font-size: 0.9rem;
  margin-top: -0.8rem;
  margin-bottom: 0.8rem;
}

/* Responsive */
@media (max-width: 600px) {
  .container {
    padding: 1.5rem;
  }
}

</style>



<body>
  <div class="main-content">
    <div class="container-form">
      <h1>Formulaire</h1>
      <h2>Inscription</h2>
      <form method="POST" action="enregistrement">
        <div class="form-group">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom :</label>
          <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="nie">NIE :</label>
          <input type="text" id="nie" name="nie" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirmer le mot de passe :</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
          <label for="filiere">Filière :</label>
          <input type="text" id="filiere" name="filiere" required>
        </div>
        <div class="form-group">
          <label for="niveau">Niveau :</label>
          <input type="text" id="niveau" name="niveau" required>
        </div>
        <div class="form-group">
          <label for="classe">Classe :</label>
          <input type="text" id="classe" name="classe" required>
        </div>
        <button type="submit" class="submit-btn">S'inscrire</button>
      </form>
    </div>
  </div>
</body>
   
