<div>
    <table class="table table-hover text-center table-light">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Grade</th>
            <th>Compte valide</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        asort($utilisateurs);
        foreach ($utilisateurs as $utilisateur) { ?>

            <tr>
                <td><?= $utilisateur['nom'] ?></td>
                <td><?= $utilisateur['prenom'] ?></td>
                <td><?= $utilisateur['email'] ?></td>
                <td>
                    <?php if ($utilisateur['designation'] == "Administrateur") {
                        echo $utilisateur['designation'];
                    } else { ?>
                        <form action="<?= URL ?>admin/grade/<?= $utilisateur['email']?>" method="POST" class="d-flex">
                            <select name="grade" id="grade" class="form-control">
                                <option value="1" <?php if ($utilisateur['idType'] == "1") { ?>selected <?php } ?>>Recruteur</option>
                                <option value="2" <?php if ($utilisateur['idType'] == "2") { ?>selected <?php } ?>>Candidat</option>
                                <option value="3" <?php if ($utilisateur['idType'] == "3") { ?>selected <?php } ?>>Consultant</option>
                            </select>
                            <button class="btn btn-outline-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18.62 1.5c-.51 0-1.02.19-1.41.59l-6.46 6.46l4.2 4.19l6.46-6.45c.79-.79.79-2.05 0-2.83l-1.37-1.37c-.39-.4-.9-.59-1.42-.59m-8.82 8l-6.57 6.57l.7.7c-.53.47-1.04 1.01-1.55 1.52c-.78.79-.78 2.05 0 2.83c.78.78 2.04.78 2.83 0c.51-.49 1.04-1.04 1.52-1.54l.7.69L14 13.7"></path>
                                </svg>
                            </button>
                        </form>
                    <?php } ?>
                </td>
                <td>
                    <?php $valide =  ($utilisateur['approuver'] == 1) ? "Oui" : "Non"; ?>
                    <?= $valide ?>
                </td>
                <td>
                    <form action="<?= URL ?>admin/approuver" method="POST">
                        <div class="d-none"><input type="email" name="email" id="email" value="<?= $utilisateur['email'] ?>"></div>
                        <button class="btn btn-primary <?php if ($valide == "Oui") { ?>disabled<?php } ?>">
                            Approuvé
                        </button>
                    </form>
                </td>
                <td>
                    <form action="<?= URL ?>gestionUsers/supprimer/<?= $utilisateur['id'] ?>">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php  } ?>
    </table>
</div>