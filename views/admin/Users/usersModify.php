<main>
    <h2 class="pageTitle">Modifier un utilisateur</h2>

    <div class="dashboardRow">
        <a href="/admin/liste-utilisateur" class="dashboardGoBack">Retour</a>
    </div>

    <div class="formDashBoardContainer flex-column-center">
        <form method="post" class="formDashboard flex-column">
            <ul>
                <li><input type="text" placeholder="Prénom" value="<?=$users->firstname ?? ''?>" name="firstname" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['firstname'] ?? ''?></p>
    
                <li><input type="text" placeholder="Nom" value="<?=$users->lastname ?? ''?>" name="lastname" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['lastname'] ?? ''?></p>

                <li><input type="email" placeholder="Email" value="<?=$users->mail ?? ''?>" name="mail" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['mail'] ?? ''?></p>
    
                <li><select name="admin" id="admin">
                    <option value="0" <?= ($users->admin == 0) ? 'selected' : ''; ?>>Utilisateur</option>
                    <option value="1" <?= ($users->admin == 1) ? 'selected' : ''; ?>>Administrateur</option>
                </select><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['admin'] ?? ''?></p>
            </ul>
            <p class="font-size-0-9rem text-center"><span class="textRed">*</span>(Champs obligatoire)</p>
            <input type="submit" value="Valider" class="formDashboardButton">
        </form>
    </div>
</main>