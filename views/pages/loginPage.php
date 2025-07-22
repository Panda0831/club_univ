<style>
  /* ===== CONNEXION PAGE STYLES ===== */

  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f5f7fa;
    color: #2c3e50;
  }

  /* Main wrapper */
  .main-content {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4rem 1rem;
    min-height: 100vh;
  }

  /* Form box */
  .form-container {
    background: #ffffff;
    padding: 2.5rem 2rem;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    width: 100%;
    max-width: 400px;
  }

  .form-container h1 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 2rem;
    color: #3498db;
  }

  /* Group of input and label */
  .input-group {
    margin-bottom: 1.5rem;
  }

  .input-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
  }

  .input-group input {
    width: 100%;
    padding: 0.7rem 1rem;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: border 0.3s;
    font-size: 1rem;
    background-color: #fafafa;
  }

  .input-group input:focus {
    border: 1px solid #3498db;
    outline: none;
    background-color: #fff;
  }

  /* Button group */
  .btn-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
  }

  .btn-group a {
    color: #3498db;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
  }

  .btn-group a:hover {
    color: #2980b9;
    text-decoration: underline;
  }

  .btn-group button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 0.7rem 1.5rem;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.3s;
  }

  .btn-group button:hover {
    background-color: #2980b9;
  }

  /* Responsive */
  @media (max-width: 480px) {
    .form-container {
      padding: 2rem 1.2rem;
    }

    .btn-group {
      flex-direction: column;
      gap: 1rem;
    }

    .btn-group button {
      width: 100%;
    }
  }
  .error-message {
  color: red;
  background-color: #ffecec;
  padding: 10px;
  border: 1px solid #ff5c5c;
  border-radius: 6px;
  margin-bottom: 1rem;
  text-align: center;
}

</style>


<main class="main-content">
  <link rel="stylesheet" href="public/style/style.css">
  <form class="form-container" method="post" novalidate>
    <h1>Connexion</h1>
    <?php
session_start();
if (!empty($_SESSION['login_error'])) {
  echo "<p class='error-message'>" . $_SESSION['login_error'] . "</p>";
  unset($_SESSION['login_error']);
}
?>
    <div class="input-group">
      <label for="nie">Identifiant :</label>
      <input type="text" id="nie" name="nie" placeholder="Entrez votre NIE" required value="<?= isset($_POST['nie']) ? htmlspecialchars($_POST['nie']) : '' ?>">
    </div>
    <div class="input-group">
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="mot_de_passe" placeholder="Entrez votre mot de passe" required>
    </div>
    <div class="btn-group">
      <a href="inscription">S'inscrire</a>
      <button type="submit">Se connecter</button>
    </div>
  </form>
</main>