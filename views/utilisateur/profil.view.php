<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL ?>accueil">Accueil</a></li>
    <li class="breadcrumb-item active">profil</li>
</ol>


<table class="table table-hover table-light">
    <tr>
        <td class="text-end">Email :</td>
        <td><?= $utilisateur['email'] ?> </td>
        <td></td>
    </tr>
    <tr>
        <form action="<?= URL ?>profil/nom" method="POST">
            <td class="text-end">Nom : </td>
            <td><input class="form-control" type="text" name="nom" id="nom" value="<?= $utilisateur['nom'] ?>"></td>
            <td><button class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.62 1.5c-.51 0-1.02.19-1.41.59l-6.46 6.46l4.2 4.19l6.46-6.45c.79-.79.79-2.05 0-2.83l-1.37-1.37c-.39-.4-.9-.59-1.42-.59m-8.82 8l-6.57 6.57l.7.7c-.53.47-1.04 1.01-1.55 1.52c-.78.79-.78 2.05 0 2.83c.78.78 2.04.78 2.83 0c.51-.49 1.04-1.04 1.52-1.54l.7.69L14 13.7"></path>
                    </svg>
                </button></td>
        </form>
    </tr>
    <tr>
        <form action="<?= URL ?>profil/prenom" method="POST">
            <td class="text-end">Prenom : </td>
            <td><input class="form-control" type="text" name="prenom" id="prenom" value="<?= $utilisateur['prenom'] ?>"></td>
            <td><button class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.62 1.5c-.51 0-1.02.19-1.41.59l-6.46 6.46l4.2 4.19l6.46-6.45c.79-.79.79-2.05 0-2.83l-1.37-1.37c-.39-.4-.9-.59-1.42-.59m-8.82 8l-6.57 6.57l.7.7c-.53.47-1.04 1.01-1.55 1.52c-.78.79-.78 2.05 0 2.83c.78.78 2.04.78 2.83 0c.51-.49 1.04-1.04 1.52-1.54l.7.69L14 13.7"></path>
                    </svg>
                </button></td>
        </form>
    </tr>

    <tr>
        <form action="<?= URL ?>profil/password" method="POST">
            <td class="text-end">Nouveau mot de passe : </td>
            <td><input class="form-control" type="password" name="pass" id="pass"></td>
            <td><button class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.62 1.5c-.51 0-1.02.19-1.41.59l-6.46 6.46l4.2 4.19l6.46-6.45c.79-.79.79-2.05 0-2.83l-1.37-1.37c-.39-.4-.9-.59-1.42-.59m-8.82 8l-6.57 6.57l.7.7c-.53.47-1.04 1.01-1.55 1.52c-.78.79-.78 2.05 0 2.83c.78.78 2.04.78 2.83 0c.51-.49 1.04-1.04 1.52-1.54l.7.69L14 13.7"></path>
                    </svg>
                </button></td>
        </form>
    </tr>
    <tr>
        <form action="<?= URL ?>profil/adresse" method="POST">
            <td class="text-end">Adresse :</td>
            <td><textarea class="form-control" name="adresse" id="adresse" cols="30" rows="2"><?= $utilisateur['adresse'] ?></textarea></td>
            <td><button class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.62 1.5c-.51 0-1.02.19-1.41.59l-6.46 6.46l4.2 4.19l6.46-6.45c.79-.79.79-2.05 0-2.83l-1.37-1.37c-.39-.4-.9-.59-1.42-.59m-8.82 8l-6.57 6.57l.7.7c-.53.47-1.04 1.01-1.55 1.52c-.78.79-.78 2.05 0 2.83c.78.78 2.04.78 2.83 0c.51-.49 1.04-1.04 1.52-1.54l.7.69L14 13.7"></path>
                    </svg>
                </button></td>
        </form>
    </tr>
    <?php if (mon_grade() == "Candidat") { ?>
        <td colspan="3" class="text-center">Mon CV :</td>
        </tr>
        <tr>
            <form action="<?= URL ?>profil/cv" method="POST" enctype="multipart/form-data">
                <td class="text-center"><a href="<?= URL . $utilisateur['cv'] ?>" target="_blanck">Mon CV</a></td>
                <td><input type="file" id="cd" name="cv"></td>
                <td><button class="btn btn-outline-success">Télécharger Cv</button></td>
            </form>
        </tr>
    <?php }

    if (mon_grade() == "Recruteur") { ?>
        <tr>
            <form action="<?= URL ?>profil/nomEntreprise" method="POST">
                <td class="text-end">Nom d'entreprise :</td>
                <td><input type="text" class="form-control" name="nomEntreprise" id="nomEntreprise" value="<?= $utilisateur['nomEntreprise'] ?>"></td>
                <td>
                    <button class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M18.62 1.5c-.51 0-1.02.19-1.41.59l-6.46 6.46l4.2 4.19l6.46-6.45c.79-.79.79-2.05 0-2.83l-1.37-1.37c-.39-.4-.9-.59-1.42-.59m-8.82 8l-6.57 6.57l.7.7c-.53.47-1.04 1.01-1.55 1.52c-.78.79-.78 2.05 0 2.83c.78.78 2.04.78 2.83 0c.51-.49 1.04-1.04 1.52-1.54l.7.69L14 13.7"></path>
                        </svg>
                    </button>
                </td>
            </form>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td class="text-end">Grade :</td>
        <td><?= $utilisateur['designation'] ?></td>
        <td></td>
    </tr>
</table>