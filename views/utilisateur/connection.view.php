<form action="<?= URL ?>goConnection" method="POST">
    <table class="table table-hover">
        <tr>
            <td>Email : </td>
            <td><input type="mail" name="mail" id="mail"></td>
        </tr>
        <tr>
            <td>Mot de passe :</td>
            <td><input type="password" name="pass" id="pass"></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary m-auto w-50 d-block">Se connecter</button>


</form>