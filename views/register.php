<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Inscription</h2>
    <form method="post" class="registerLoginForm flex-column" novalidate>
        <ul>
            <li><input type="text" placeholder="Prénom" value="<?=$firstname ?? ''?>" name="firstname" class="flex-row" required></li>
            <p class="errorText"><?=$error['firstname'] ?? ''?></p>

            <li><input type="text" placeholder="Nom" value="<?=$lastname ?? ''?>" name="lastname" class="flex-row" required></li>
            <p class="errorText"><?=$error['lastname'] ?? ''?></p>

            <li><input type="email" placeholder="Email" value="<?=$mail ?? ''?>" name="mail" class="flex-row" required></li>
            <p class="errorText"><?=$error['mail'] ?? ''?></p>

            <li><input type="password" placeholder="Mot de passe" name="password" class="flex-row" required></li>
            <li><input type="password" placeholder="Confirmation du mot de passe" name="confirmPassword" class="flex-row" required></li>
            <p class="errorText"><?=$error['password'] ?? ''?></p>
        </ul>
        <div class="acceptConditionsContainer flex-row">
            <input type="checkbox" name="acceptConditions" id="acceptConditions" <?= (isset($acceptConditions) && $acceptConditions == true) ? 'checked' : ''; ?> required>
            <label for="acceptConditions">J'ai lu et j'accepte <a href="XXXXXXXXXXXXX">les conditions</a></label>
        </div>
        <p class="errorText"><?=$error['acceptConditions'] ?? ''?></p>
        <input type="submit" value="Inscription" class="registerLoginButton">
        <div class="linkUnderButtonContainer">
            <p>Vous avez déjà un compte ?</p>
            <a href="/controllers/login-controller.php" class="linkUnderButton">Cliquez pour vous connecter</a>
        </div>
    </form>
</main>