<!DOCTYPE html>
<html lang="fr">

<?php require "./views/commun/head.php" ?>

<body class="d_flex flex_fill">

    <div class="d_flex flex_column w_100">
        <?php require "./views/commun/header.php" ?>
        <div class="d-flex flex-fill justify-content-start mt-4">
            <div class=" d-flex flex-fill flex-column align-items-center pt-2">
                <?php
                if (!empty($_SESSION['alert'])) {
                    foreach ($_SESSION['alert'] as $alert) {
                        echo "<div class='alert " . $alert['type'] . " m-3 alert alert-dismissible container' role='alert'>
                        " . $alert['message'] . "
                    </div>";
                    }
                    unset($_SESSION['alert']);
                }
                ?>
                <div class="container">
                    <?= $page_content ?>
                </div>
            </div>
        </div>
        <?php require "./views/commun/footer.php" ?>
    </div>

</body>

</html>