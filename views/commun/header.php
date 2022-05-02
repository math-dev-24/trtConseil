<!--header start-->
<header class="header black-bg">

    <?php if (est_connecter()) { ?>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
    <?php } ?>
    <a href="<?= URL ?>accueil" class="logo">TRT Conseil</a>

    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <?php if (!est_connecter()) { ?>
                <li>
                    <a class="logout" href="<?= URL ?>connection">Log in</a>
                </li>
                <li>
                    <a class="logout" href="<?= URL ?>inscription">Sign in</a>
                </li>
            <?php } else { ?>
                <li><a class="logout" href="<?= URL ?>deconnexion">Log out</a></li>
            <?php } ?>
        </ul>
    </div>
</header>
