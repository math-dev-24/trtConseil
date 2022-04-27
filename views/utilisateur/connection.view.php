<form action="<?= URL ?>goConnection" method="POST">
    <table class="table table-hover">
        <tr>
            <td>Email : </td>
            <td><input class="form-control" type="mail" name="mail" id="mail"></td>
        </tr>
        <tr>
            <td>Mot de passe :</td>
            <td><input class="form-control" type="password" name="pass" id="pass"></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary">Se connecter</button>


</form>