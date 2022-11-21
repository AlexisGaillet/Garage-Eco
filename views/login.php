<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Connexion</h2>
    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><input type="email" placeholder="Email" name="email" class="flex-row" required></li>
            <li><input type="password" placeholder="Mot de passe" name="password" class="flex-row" required></li>
        </ul>
        <input type="submit" value="Connexion" class="registerLoginButton" required>
        <div class="linkUnderButtonContainer">
            <p>Mot de passe oublié ?</p>
            <a href="/controllers/forgotPassword-controller.php" class="linkUnderButton">Cliquez pour le réinitialiser</a>
        </div>
    </form>
</main>