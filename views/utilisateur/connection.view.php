<form action="<?= URL ?>goConnection" method="POST">

    <div class="form-group">
        <label for="mail" class="form-label">
            Email :
        </label>
        <input type="email" name="mail" id="mail" class="form-input"/>
    </div>
    <div class="form-group">
        <label for="pass" class="form-label">
            Mot de passe :
        </label>
        <input type="password" name="pass" id="pass" class="form-input"/>
    </div>
    <button type="submit" class="btn btn-primary m-auto w-50 d-block">Se connecter</button>


</form>