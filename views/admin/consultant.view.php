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
    
    <a href="<?= URL ?>ajoutConsultant" class="btn btn-success w-100">Ajoutez</a>
</div>

