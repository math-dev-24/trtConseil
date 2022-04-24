<header class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">

    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>accueil">TRT Conseil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <?php if (est_connecter()) { ?>
                    <li class="nav-item">
                        <a href="<?= URL ?>profil" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ic" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 5v14a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5a2 2 0 0 0-2 2zm12 4c0 1.66-1.34 3-3 3s-3-1.34-3-3s1.34-3 3-3s3 1.34 3 3zm-9 8c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1H6v-1z"></path>
                            </svg>
                        </a>
                    </li>
                    <?php if (mon_grade() != "Recruteur") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>recrutement/offres">Offres</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>recrutement/annonces">Recrutement</a>
                        </li>
                    <?php } ?>
                    <?php if (mon_grade() == "Administrateur") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>admin/consultants">Consultants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>admin/users">Utilisateurs</a>
                        </li>
                    <?php
                    }
                    if (mon_grade() != "Recruteur" && mon_grade() != "Candidat") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>gestionOffres">Gèrer les Offres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>candidatures">Candidatures</a>
                        </li>
                    <?php }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>deconnexion">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--cil" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M77.155 272.034H351.75v-32.001H77.155l75.053-75.053v-.001l-22.628-22.626l-113.681 113.68l.001.001h-.001L129.58 369.715l22.628-22.627v-.001l-75.053-75.053z"></path>
                                <path fill="currentColor" d="M160 16v32h304v416H160v32h336V16H160z"></path>
                            </svg>
                        </a>
                    </li>
                <?php  } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>connection">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>inscription">Sign in</a>
                    </li>
                <?php  } ?>

            </ul>
        </div>
    </div>
</header>