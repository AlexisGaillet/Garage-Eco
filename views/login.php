<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Connexion</h2>
    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>
    
    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><input type="email" placeholder="Email" value="<?=$mail ?? ''?>" name="mail" class="flex-row" required></li>
            <p class="errorText"><?=$error['mail'] ?? ''?></p>

            <li><input type="password" placeholder="Mot de passe" name="password" class="flex-row" required></li>
            <p class="errorText"><?=$error['password'] ?? ''?></p>
        </ul>
        <input type="submit" value="Connexion" class="registerLoginButton" required>
        <div class="linkUnderButtonContainer">
            <p>Mot de passe oublié ?</p>
            <a href="/mot-de-passe-oublie" class="linkUnderButton">Cliquez pour le réinitialiser</a>
        </div>
    </form>
</main>