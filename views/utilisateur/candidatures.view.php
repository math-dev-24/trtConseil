<table class="table table-hover text-center m-auto table-light">
    <tr>
        <th>Postulant :</th>
        <th>Intitulé annonce :</th>
        <th>Nom de la socièté :</th>
        <th>Description :</th>
        <th>Approuver candidatures :</th>
    </tr>
    <?php foreach ($candidatures as $candidature) { ?>
        <tr>
            <td><?= $candidature['emailP'] ?></td>
            <td><?= $candidature['intitule'] ?></td>
            <td><?= $candidature['nomEntreprise'] ?></td>
            <td><?= $candidature['description'] ?></td>
            <td>
                <form action="<?= URL ?>candidatures/approuver/<?= $candidature['emailP'] ?>/<?= $candidature['idOffreP'] ?>" method="POST">
                    <button class="btn btn-success <?php if ($candidature['approuverP'] == 1) { ?> disabled <?php } ?>">
                        <?php if ($candidature['approuverP'] == 1) { ?> Ok <?php }else{ echo "Oui" ; } ?>
                    </button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>