<div class="mt-4">
    <h3>Ajouter un consultants :</h3>
    <form action="<?= URL ?>addConsultant" method="POST">
        <table class="table table-hover">
            <tr>
                <td class="text-end">Nom :</td>
                <td><input class="form-control" type="text" name="nomConsultant" id="nomConsultant"></td>
            </tr>
            <tr>
                <td class="text-end">Prenom :</td>
                <td><input class="form-control" type="text" name="prenomConsultant" id="prenomConsultant"></td>
            </tr>
            <tr>
                <td class="text-end">Email :</td>
                <td><input class="form-control" type="email" id="emailConsultant" name="emailConsultant"></td>
            </tr>
            <tr>
                <td class="text-end">Mot de passe provisoire :</td>
                <td><input class="form-control" type="text" id="passwordTempoConsultant" name="passwordTempoConsultant"></td>
            </tr>
        </table>
        <button class="btn btn-success">Ajouter</button>
    </form>
</div>