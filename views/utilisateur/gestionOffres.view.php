<h6>Non approuvées :</h6>
<table class="table table-hover table-light text-center m-auto">
    <tr>
        <th>Intitulé :</th>
        <th>Recruteur :</th>
        <th>Lieu de travail : </th>
        <th>Description :</th>
        <th>L'approuver :</th>
    </tr>
    <?php foreach ($nonApprouver as $nonApp) { ?>
        <tr>
            <td><?= $nonApp['intitule'] ?></td>
            <td><?= $nonApp['nomEntreprise'] ?></td>
            <td><?= $nonApp['lieuDeTravail'] ?></td>
            <td><?= $nonApp['description'] ?></td>
            <td>
                <form action="<?= URL ?>gestionOffres/<?= $nonApp['0'] ?>">
                    <button class="btn btn-info">Ok</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<hr>
<h6>Approuvées :</h6>
<table class="table table-hover table-light text-center m-auto">
    <tr>
        <th scope="col">Intitulé :</th>
        <th scope="col">Recruteur :</th>
        <th scope="col">Lieu de travail : </th>
        <th scope="col">Description :</th>
    </tr>
    <?php foreach ($Approuver as $App) { ?>
        <tr>
            <td><?= $App['intitule'] ?></td>
            <td><?= $App['nomEntreprise'] ?></td>
            <td><?= $App['lieuDeTravail'] ?></td>
            <td><?= $App['description'] ?></td>
        </tr>
    <?php } ?>
</table>