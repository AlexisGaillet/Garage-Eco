<main>
    <h2 class="pageTitle">Modifier une Marque</h2>

    <div class="dashboardRow">
        <a href="/admin/vehicules" class="dashboardGoBack">Retour</a>
    </div>

    <div class="formDashBoardContainer flex-column-center">
        <form method="post" class="formDashboard flex-column">
            <ul>
                <li><input type="text" placeholder="Nom de la marque" value="<?=$nameValue ?? ''?>" name="brandName" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['brandName'] ?? ''?></p>

                <li>
                    <input type="checkbox" name="mostSelled" id="noEndYear" <?=($mostSelledValue == 1) ? 'checked' : ''?>>
                    <label for="mostSelled">Fait parti des marques les plus vendus</label>
                </li>
                <p class="errorText"><?=$error['mostSelled'] ?? ''?></p>
            </ul>
            <p class="font-size-0-9rem text-center"><span class="textRed">*</span>(Champs obligatoire)</p>
            <input type="submit" value="Valider" class="formDashboardButton">
        </form>
    </div>
</main>