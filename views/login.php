<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Connexion</h2>
    <h4 class="sessionFlashGreen"><?php if (SessionFlash::exist()) { echo SessionFlash::get(); } ?></h4>
    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><input type="email" placeholder="Email" name="mail" class="flex-row" required></li>
            <p class="errorText"><?=$error['mail'] ?? ''?></p>

            <li><input type="password" placeholder="Mot de passe" name="password" class="flex-row" required></li>
            <p class="errorText"><?=$error['password'] ?? ''?></p>
        </ul>
        <input type="submit" value="Connexion" class="registerLoginButton" required>
        <div class="linkUnderButtonContainer">
            <p>Mot de passe oublié ?</p>
            <a href="/controllers/forgotPassword-controller.php" class="linkUnderButton">Cliquez pour le réinitialiser</a>
        </div>
    </form>
</main>