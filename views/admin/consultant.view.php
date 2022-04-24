<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= URL ?>accueil">Accueil</a></li>
    <li class="breadcrumb-item active">Consultants</li>
</ol>



<div>
    <table class="table table-hover table-light">

        <?php foreach ($consultants as $consultant) {  ?>

            <tr>
                <form action="<?= URL ?>/admin/deleteConsultant/<?= $consultant['id'] ?>" method="POST">
                    <td class="text-center"><?= $consultant['email'] ?></td>
                    <td><button class="btn btn-danger m-auto">Supprimer</button></td>
                </form>
            </tr>


        <?php } ?>

    </table>
    
    <a href="<?= URL ?>admin/consultants/ajout" class="btn btn-success w-100">Ajoutez</a>
</div>

