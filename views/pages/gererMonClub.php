<?php require_once 'views/components/header.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-5">Gestion de mon club</h2>

  <?php if (empty($club)): ?>
    <div class="alert alert-info text-center">
      Vous ne gérez aucun club.
    </div>
  <?php else: ?>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-lg border-0">
          <div class="card-body p-4 text-center">
            <h3 class="card-title mb-3 text-primary"><?= htmlspecialchars($club['nom_club']) ?></h3>
            <p class="card-text mb-4 text-muted"><?= nl2br(htmlspecialchars($club['description'])) ?></p>

            <div class="d-grid gap-3 mb-4">
              <a href="/modifierClub?id=<?= intval($club['id_club']) ?>" class="btn btn-outline-warning btn-lg">
                ✏️ Modifier le club
              </a>
              <a href="/activitesClub?id=<?= intval($club['id_club']) ?>" class="btn btn-outline-primary btn-lg">
                📅 Gérer les activités
              </a>
              <a href="index.php?page=clubs/membres&id=<?= intval($club['id_club']) ?>" class="btn btn-outline-info btn-lg">
                👥 Voir les membres
              </a>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">🗑️ Supprimer un membre</h5>
            <form method="POST" action="/clubs/supprimerMembre" onsubmit="return confirm('Voulez-vous vraiment supprimer ce membre ?');">
              <input type="hidden" name="id_club" value="<?= intval($club['id_club']) ?>">
              <div class="row g-2 align-items-center justify-content-center mb-3">
                <div class="col-md-8">
                  <select name="id_membre" class="form-select form-select-lg" required>
                    <option value="" disabled selected>-- Choisir un membre --</option>
                    <?php if (!empty($club['membres']) && is_array($club['membres'])): ?>
                      <?php foreach ($club['membres'] as $membre): ?>
                        <option value="<?= intval($membre['id_utilisateur']) ?>">
                          <?= htmlspecialchars($membre['nom'] . ' ' . $membre['prenom']) ?>
                        </option>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <option disabled>Aucun membre</option>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-danger btn-lg w-100">
                    Supprimer
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php require_once 'views/components/footer.php'; ?>
