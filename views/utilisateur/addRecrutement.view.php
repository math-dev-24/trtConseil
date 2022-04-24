<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= URL ?>accueil">Accueil</a></li>
    <li class="breadcrumb-item"><a href="<?= URL ?>recrutement/annonces">Vos annonces</a></li>
    <li class="breadcrumb-item active">Ajouter une annonce</li>
</ol>


<form action="<?= URL ?>recrutement/annonces/addr" method="POST">
    <table class="table table-hover table-primary">
        <tr>
            <td class="text-end">intitulé du Poste :</td>
            <td><input class="form-control" type="text" name="intitule" id="intitule"></td>
        </tr>
        <tr>
            <td class="text-end">Lieu de travail :</td>
            <td><input class="form-control" type="text" name="lieuDT" id="lieuDT"></td>
        </tr>
        <tr>
            <td class="text-end">Description : (horaires, Salaire, etc...)</td>
            <td><textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea></td>
        </tr>
    </table>
    <button class="btn btn-outline-success w-100 m-auto">Ajoutez</button>
</form>