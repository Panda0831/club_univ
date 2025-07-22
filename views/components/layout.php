



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content=" <?= $description ?> ">
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo $title ?></title>
</head>
<body class="min-vh-100 d-flex flex-column">
    <?php require_once 'views/components/header.php'; ?>
    <main class=" container   flex-grow-1 ">
        <?= $content ?>
    </main>

    <?php require_once 'views/components/footer.php'; ?>
<script src ="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>