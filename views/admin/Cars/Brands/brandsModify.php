<main>
    <h2 class="pageTitle">Modifier une Marque</h2>

    <div class="dashboardRow">
        <a href="/admin/vehicules" class="dashboardGoBack">Retour</a>
    </div>

    <div class="formDashBoardContainer flex-column-center">
        <form method="post" class="formDashboard flex-column">
            <ul>
                <li><input type="text" placeholder="Nom de la marque" value="<?=$brand->name ?? ''?>" name="brandName" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['brandName'] ?? ''?></p>

                <li><select name="mostSelled" id="mostSelled">
                    <option value="0" <?= ($brand->most_selled == 0) ? 'selected' : ''; ?>>Pas de tag</option>
                    <option value="1" <?= ($brand->most_selled == 1) ? 'selected' : ''; ?>>Tag : "Constructeurs les plus vendus"</option>
                </select><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['mostSelled'] ?? ''?></p>
            </ul>
            <p class="font-size-0-9rem text-center"><span class="textRed">*</span>(Champs obligatoire)</p>
            <input type="submit" value="Valider" class="formDashboardButton">
        </form>
    </div>
</main>