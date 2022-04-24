<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>/style/components/bootstrap.min.css">
    
    <?php if (!empty($page_css)) : ?>
        <?php foreach ($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
    <title>E_commerce</title>
</head>

<body>
    <?php require "./views/commun/header.php" ?>

    <!-- contenu page -->
    <div class="container">

        <?php
        if (!empty($_SESSION['alert'])) {
            foreach ($_SESSION['alert'] as $alert) {
                echo "<div class='alert " . $alert['type'] . " mt-2 mb-2' role='alert'>
                        " . $alert['message'] . "
                    </div>";
            }
            unset($_SESSION['alert']);
        }
        ?>

        
        <?= $page_content ?>
    </div>

    <?php require "./views/commun/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <?php if (!empty($page_javascript)) : ?>
        <?php foreach ($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL ?>script/<?= $fichier_javascript ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>