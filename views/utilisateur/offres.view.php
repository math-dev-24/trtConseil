<div class="d-flex flex-column w-100">
    <?php foreach ($offreValide as $offre) {

    ?>
        <div class="card bg-secondary mb-3 w-100">
            <div class="card-header"><?= $offre['nomEntreprise'] ?></div>
            <div class="card-body">
                <h4 class="card-title"><?= $offre['intitule'] ?></h4>
                <p class="card-text"><?= $offre['description'] ?></p>
                <?php
                $nonPostuler = true;
                $isValide = false;
                foreach ($candidatures as $candidature) {
                    if ($candidature['idOffre'] == $offre['0']) {
                        $nonPostuler = false;

                        if ($candidature['approuver'] == 1) {
                            $isValide = true;
                        }
                    }
                }

                if (mon_grade() == "Candidat" && $nonPostuler) { ?>
                    <form action="<?= URL ?>postuler/<?= $offre['0'] ?>">
                        <button class="btn btn-success">Postuler !</button>
                    </form>

                    <?php } else {
                        if(mon_grade() == "Candidat"){
                        if ($isValide) {
                        ?>
                            <button class="disabled btn btn-primary m-2">Candidatures pris en compte et approuver</button>
                        <?php } else { ?>
                            <button class="disabled btn btn-primary m-2">Candidatures pris en compte et non approuver pour l'instant</button>
                        <?php } ?>
                        <form action="<?= URL ?>recrutement/retrait/<?= $offre['0'] ?>">
                            <button class="btn btn-outline-danger m-2">Ne plus postuler</button>
                        </form>
                    <?php
                    } } ?>
            </div>
        </div>
    <?php  } ?>

</div>