<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>
</head>
<body>
     <div class="main-content">
    <div class="container-form">
      <h2>Ajouter une image</h2>
      <p>Veuillez télécharger une image pour votre profil.</p>
      <form method="POST" action="ajoutImage" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nom">Image :</label>
          <input type="file" id="nom" name="image" required>
        </div>
        <button type="submit" class="submit-btn">Ajouter</button>
      </form>
    </div>
  </div>
</body>
</html>