<main>
    <h2 class="pageTitle">Modifier un utilisateur</h2>

    <div class="dashboardRow">
        <a href="/admin/liste-utilisateur" class="dashboardGoBack">Retour</a>
    </div>

    <div class="formDashBoardContainer flex-column-center">
        <form method="post" class="formDashboard flex-column">
            <ul>
                <li><input type="text" placeholder="Prénom" value="<?=$firstname ?? ''?>" name="firstname" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['firstname'] ?? ''?></p>
    
                <li><input type="text" placeholder="Nom" value="<?=$lastname ?? ''?>" name="lastname" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['lastname'] ?? ''?></p>
    <?= '<pre>' , var_dump($users) , '</pre>' ?>
                <li><input type="email" placeholder="Email" value="<?=$mail ?? ''?>" name="mail" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['mail'] ?? ''?></p>
    
                <li><select name="Rôle" id="role">
                    <option value="1" <?= ($users->role == 1) ? 'selected' : ''; ?>>Administrateur</option>
                    <option value="2" <?= ($users->role == 2) ? 'selected' : ''; ?>>Utilisateur</option>
                </select><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['mail'] ?? ''?></p>
            </ul>
            <p class="font-size-0-9rem text-center"><span class="textRed">*</span>(Champs obligatoire)</p>
            <input type="submit" value="Valider" class="formDashboardButton">
        </form>
    </div>
</main>