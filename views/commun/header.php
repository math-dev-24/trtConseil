<!--header start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>accueil">TRT Conseil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <?php if (est_connecter()) : ?>

                    <li class="nav-item">
                        <a href="<?= URL ?>profil" class="<?php if ($_SESSION['page'] == "profil") { ?> active <?php } ?> nav-link">
                            <i class="fa fa-dashboard"></i>
                            <span>Profil</span>
                        </a>
                    </li>

                    <?php if (mon_grade() === "Administrateur") { ?>
                        <li class="<?php if ($_SESSION['page'] == "gestionUsers") { ?> active <?php } ?> nav-item">
                            <a href="<?= URL ?>gestionUsers" class="nav-link">Utilisateurs</a>
                        </li>
                    <?php } ?>
                    <?php if (mon_grade() !== "Recruteur") { ?>
                        <li class="nav-item">
                            <a href="<?= URL ?>offresDispo" class="<?php if ($_SESSION['page'] == "offresDispo") { ?> active <?php } ?> nav-link">
                                <span>Les Offres</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?= URL ?>annoncesDepose" class="<?php if ($_SESSION['page'] == "annoncesDepose") { ?> active <?php } ?> nav-link">
                                <span>Mes Annonces</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (mon_grade() !== "Recruteur" && mon_grade() !== "Candidat") { ?>
                        <li class="nav-item">
                            <a href="<?= URL ?>gestionOffres" class="<?php if ($_SESSION['page'] === "gestionOffres") { ?> active <?php } ?> nav-link">
                                <span>Gestions des Offres</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= URL ?>candidatures" class="<?php if ($_SESSION['page'] === "candidatures") { ?> active <?php } ?> nav-link">
                                <span>Candidatures</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>deconnexion">Déconnexion</a>
                    </li>
                <?php endif ?>
                <?php if (!est_connecter()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>connection">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>inscription">Inscription</a>
                    </li>
                <?php endif ?>



            </ul>
        </div>
    </div>
</nav>


<ul class="sidebar-menu" id="nav-accordion">


</ul>