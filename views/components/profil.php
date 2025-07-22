<?php
// Fichier : views/layouts/default.php (extrait d'un layout MVC Laravel-like)

$title = $title ?? 'Mon Profil';
$description = $description ?? 'Tableau de bord personnel';
$content = $content ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($description) ?>">
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title><?= htmlspecialchars($title) ?></title>
</head>
<body class="min-vh-100 d-flex flex-column bg-light">
<header>
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 d-flex align-items-center gap-2" href="home">
                <img src="public/img/esmia_fond_noir.webp" alt="Logo ESMIA" class="logo-esmia" style="width: 1cm;">
                ESMIA UNIVERSITY
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex flex-wrap gap-4 mt-3 mt-lg-0 align-items-center">
                    <a href="home" class="btn btn-outline-primary">Mes clubs</a>
                    <a href="evenement" class="btn btn-outline-primary">Événement</a>
                    <a href="nous" class="btn btn-outline-primary">Aide</a>
                    <a href="apropos" class="btn btn-outline-primary">À propos</a>
                    <!-- Icone de profil -->
                    <a href="profil" class="btn btn-light border"><i class="fas fa-user-cog fa-lg"></i></a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="container py-5 flex-grow-1">
    <?= $content ?>
</main>

<?php require_once 'views/components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
