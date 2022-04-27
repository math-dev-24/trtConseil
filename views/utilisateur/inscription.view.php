<form action="<?= URL ?>goInscription" method="POST" class="container">
    <table class="table table-hover">
        <tr>
            <td class="text-end">Nom : *</td>
            <td><input class="form-control" type="text" name="nom" id="nom" required></td>
        </tr>
        <tr>
            <td class="text-end">Prénom : *</td>
            <td>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </td>
        </tr>
        <tr>
            <td class="text-end">Email : *</td>
            <td><input class="form-control" type="email" name="email" id="email" required></td>
        </tr>
        <tr>
            <td class="text-end">Mot de passe : *</td>
            <td>
                <input class="form-control" type="password" name="pass1" id="pass1" required>
            </td>
        </tr>
        <tr>
            <td class="text-end">Confirmation mot de passe : *</td>
            <td>
                <input type="password" class="form-control" name="pass2" id="pass2" required>
            </td>
        </tr>
        <tr>
            <td class="text-end">Vous-êtes : *</td>
            <td>
                <select class="form-control" name="type" id="type">
                    <option value="1">Recruteur</option>
                    <option value="2">Candidat</option>
                </select>
            </td>
        </tr>
    </table>
    <button id="btnValide" type="submit" class="btn btn-primary">S'inscrire</button>


</form>