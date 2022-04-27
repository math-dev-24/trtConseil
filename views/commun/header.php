<!--header start-->
<header class="header black-bg">

    <?php if (est_connecter()) { ?>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
    <?php } ?>
    <a href="<?= URL ?>accueil" class="logo">TRT Conseil</a>
    <div class="nav notify-row" id="top_menu">
        <ul class="nav top-menu">
            <?php if (est_connecter()) { ?>
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-success">0</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">Vous avez 0 notification.</p>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
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

<?php if (est_connecter()) { ?>
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="<?= URL ?>profil"><img src="#" class="img-circle" width="80"></a></p>
                <h5 class="centered"> <?= $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></h5>
                <li class="mt">
                    <a href="<?= URL ?>profil" class="<?php if ($_SESSION['page'] == "profil") { ?> active <?php } ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <?php if (mon_grade() == "Administrateur") { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if ($_SESSION['page'] == "gestionConsultants" || $_SESSION['page'] == "gestionUsers") { ?> active <?php } ?>">
                            <i class="fa fa-cogs"></i>
                            <span>Administrateur</span>
                        </a>
                        <ul class="sub">
                            <li class="<?php if ($_SESSION['page'] == "gestionConsultants") { ?> active <?php } ?>"><a href="<?= URL ?>gestionConsultants">Consultants</a></li>
                            <li class="<?php if ($_SESSION['page'] == "gestionUsers") { ?> active <?php } ?>"><a href="<?= URL ?>gestionUsers">Utilisateurs</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (mon_grade() != "Recruteur") { ?>
                    <li class="mt">
                        <a href="<?= URL ?>offresDispo" class="<?php if ($_SESSION['page'] == "offresDispo") { ?> active <?php } ?>">
                            <span>Les Offres</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="mt">
                        <a href="<?= URL ?>annoncesDepose" class="<?php if ($_SESSION['page'] == "annoncesDepose") { ?> active <?php } ?>">
                            <span>Mes Annonces</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (mon_grade() != "Recruteur" && mon_grade() != "Candidat") { ?>
                    <li class="mt">
                        <a href="<?= URL ?>gestionOffres" class="<?php if ($_SESSION['page'] == "gestionOffres") { ?> active <?php } ?>">
                            <span>Gestions des Offres</span>
                        </a>
                    </li>
                    <li class="mt">
                        <a href="<?= URL ?>candidatures" class="<?php if ($_SESSION['page'] == "candidatures") { ?> active <?php } ?>">
                            <span>Candidatures</span>
                        </a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </aside>
<?php } ?>