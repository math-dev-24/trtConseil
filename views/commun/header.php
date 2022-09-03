<!--header start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>accueil">TRT Conseil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <?php if (est_connecter()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>deconnexion">Déconnexion</a>
                    </li>
                <?php endif ?>
                <?php if (!est_connecter()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" class="logout" href="<?= URL ?>connection">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="logout" href="<?= URL ?>inscription">Inscription</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>