<?php if (est_connecter()) { ?>
    <aside>
        <div class="d-flex flex-column">
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="<?= URL ?>profil"><img src="https://randomuser.me/api/portraits/men/32.jpg" class="img img_rounded_50" width="80"></a></p>
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
                            <span>Admin</span>
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