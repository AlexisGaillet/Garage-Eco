<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Inscription</h2>
    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><input type="text" placeholder="Prénom" name="firstname" class="flex-row" required></li>
            <li><input type="text" placeholder="Nom" name="lastname" class="flex-row" required></li>
            <li><input type="email" placeholder="Email" name="email" class="flex-row" required></li>
            <li><input type="password" placeholder="Mot de passe" name="password" class="flex-row" required></li>
            <li><input type="password" placeholder="Confirmation du mot de passe" name="confirmPassword" class="flex-row" required></li>
        </ul>
        <div class="acceptConditionsContainer flex-row">
            <input type="checkbox" name="acceptConditions" id="acceptConditions" required>
            <label for="acceptConditions">J'ai lu et j'accêpte <a href="XXXXXXXXXXXXX">les conditions</a></label>
        </div>
        <input type="submit" value="Inscription" class="registerLoginButton">
        <div class="linkUnderButtonContainer">
            <p>Vous avez déjà un compte ?</p>
            <a href="/controllers/login-controller.php" class="linkUnderButton">Cliquez pour vous connecter</a>
        </div>
    </form>
</main>