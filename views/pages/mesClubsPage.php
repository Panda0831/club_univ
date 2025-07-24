<?php require_once 'views/components/header.php'; ?>

<div class="container mt-5">
    <h2>Clubs dont vous êtes responsable</h2>
    <div class="row mt-4">
        <?php if (count($clubs) === 0): ?>
            <p>Vous n'êtes responsable d'aucun club.</p>
        <?php else: ?>
            <?php foreach ($clubs as $club): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($club['nom_club']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($club['description']) ?></p>
                            <a href="/clubs/modifier/<?= $club['id_club'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="/activites/club/<?= $club['id_club'] ?>" class="btn btn-sm btn-primary">Gérer Activités</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'views/components/footer.php'; ?>
