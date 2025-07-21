<main class="main-content">
    <link rel="stylesheet" href="public/style/style.css">
    <form class="form-container" action="" method="post" novalidate>
      <h1>Connexion</h1>
      <div class="input-group">
        <label for="nie">Identifiant :</label>
        <input type="text" id="nie" name="nie" placeholder="Entrez votre NIE" required value="<?= isset($_POST['nie']) ? htmlspecialchars($_POST['nie']) : '' ?>">
      </div>
      <div class="input-group">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
      </div>
      <div class="btn-group">
        <a href="inscription">S'inscrire</a>
        <button type="submit">Se connecter</button>
      </div>
    </form>
</main>