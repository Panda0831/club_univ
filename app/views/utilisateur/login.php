<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>

    <?php if (!empty($error)) : ?>
        <div style="color:red"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="?page=login">
        <label>NIE : <input type="text" name="nie" required></label><br>
        <label>Mot de passe : <input type="password" name="password" required></label><br>
        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore inscrit ? <a href="?page=inscription">Créer un compte</a></p>
</body>
</html>
