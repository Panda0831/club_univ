<?php require_once 'views/components/header.php'; ?>

<div class="container py-5">
  <h2 class="mb-4">Liste des membres du club</h2>

  <?php if (empty($membres)): ?>
    <div class="alert alert-warning">Aucun membre trouvé.</div>
  <?php else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($membres as $membre): ?>
          <tr>
            <td><?= htmlspecialchars($membre['nom']) ?></td>
            <td><?= htmlspecialchars($membre['prenom']) ?></td>
            <td><?= htmlspecialchars($membre['email']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php require_once 'views/components/footer.php'; ?>
