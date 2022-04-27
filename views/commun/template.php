<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


    <!-- Bootstrap core CSS -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="./lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/style-responsive.css" rel="stylesheet">

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
    <section <?php if(est_connecter()){?>id="main-content" <?php } ?> >
        <section class="wrapper site-min-height">

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
        </section>
    </section>

    <?php require "./views/commun/footer.php" ?>


    <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="./lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="./lib/jquery.scrollTo.min.js"></script>
    <script src="./lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="./lib/common-scripts.js"></script>

    <?php if (!empty($page_javascript)) : ?>
        <?php foreach ($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL ?>script/<?= $fichier_javascript ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

</body>

</html>