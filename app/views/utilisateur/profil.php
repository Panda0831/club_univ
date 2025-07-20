<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
</head>
<body>
    <h2>Bienvenue, <?= htmlspecialchars($_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']) ?></h2>
    <p>Rôle : <?= htmlspecialchars($_SESSION['user']['role']) ?></p>
    <p>Email : <?= htmlspecialchars($_SESSION['user']['email']) ?></p>

    <p><a href="?page=logout">Se déconnecter</a></p>
</body>
</html>
