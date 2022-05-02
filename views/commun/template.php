<!DOCTYPE html>
<html lang="fr">

<?php require "./views/commun/head.php" ?>

<body class="d_flex flex_fill">

    <div class="d_flex flex_column w_100">
        <?php require "./views/commun/header.php" ?>
        <hr>
        <div class="d_flex flex_fill justify_content_start">
            <?php require "./views/commun/sidebar.php" ?>
            <div class=" d_flex flex_fill flex_column align_items_center pt_10">
                <?php
                if (!empty($_SESSION['alert'])) {
                    foreach ($_SESSION['alert'] as $alert) {
                        echo "<div class='alert " . $alert['type'] . " m_10' role='alert'>
                        " . $alert['message'] . "
                    </div>";
                    }
                    unset($_SESSION['alert']);
                }
                ?>
                <div class="mt_20">
                    <?= $page_content ?>
                </div>
            </div>
        </div>
        <hr>
        <?php require "./views/commun/footer.php" ?>
    </div>

</body>

</html>