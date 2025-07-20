<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>

    <?php if (!empty($error)) : ?>
        <div style="color:red"><?= htmlspecialchars($error) ?></div>
    <?php elseif (!empty($success)) : ?>
        <div style="color:green"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST" action="?page=inscription">
        <label>Nom* : <input type="text" name="nom" required></label><br>
        <label>Prénom : <input type="text" name="prenom"></label><br>
        <label>NIE* : <input type="text" name="nie" required></label><br>
        <label>Email* : <input type="email" name="email" required></label><br>
        <label>Filière : <input type="text" name="filiere"></label><br>
        <label>Niveau : <input type="text" name="niveau"></label><br>
        <label>Mot de passe* : <input type="password" name="mot_de_passe" required></label><br>
        <label>Confirmer mot de passe* : <input type="password" name="confirm_password" required></label><br><br>
        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="?page=login">Se connecter</a></p>
</body>
</html>
