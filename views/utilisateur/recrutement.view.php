<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= URL ?>accueil">Accueil</a></li>
    <li class="breadcrumb-item active">Vos annonces</li>
</ol>



<table class="table table-hover table-primary text-center">
    <tr>
        <td>Intitulé :</td>
        <td>Lieu de travail :</td>
        <td>Description :</td>
        <td>Approuvé :</td>
        <td></td>
    </tr>
    <?php foreach ($offres as $offre) { ?>

        <tr>
            <td>
                <?= $offre['intitule'] ?>
            </td>
            <td>
                <?= $offre['lieuDeTravail'] ?>
            </td>
            <td>
                <?= $offre['description'] ?>
            </td>
            <td>
                <?php $etat = $offre['approuverO'] == 0 ? "Non" : "Oui"; ?>
                <?= $etat ?>
            </td>
            <td>
                <button class="btn btn-danger">Supprimer</button>
            </td>

        </tr>
    <?php } ?>
</table>

<div>
    <a href="<?= URL ?>recrutement/annonces/add" class="btn btn-success w-100 m-auto">Ajoutez</a>
</div>