<main>
    <h2 class="pageTitle">Modifier une Motorisation</h2>

    <div class="dashboardRow">
        <a href="/admin/motorisations?id=<?=$id_model?>" class="dashboardGoBack">Retour</a>
    </div>

    <div class="formDashBoardContainer flex-column-center">
        <form method="post" class="formDashboard flex-column">
            <ul>
                <li><input type="text" placeholder="Cylindré" value="<?=$cylinder ?? ''?>" name="cylinder" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['cylinder'] ?? ''?></p>

                <li><input type="number" placeholder="Puissance" value="<?=$horsePower ?? ''?>" name="horsePower" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['horsePower'] ?? ''?></p>

                <li><select name="motorization" id="motorization">
                    <?php foreach ($type_array as $key => $typeFromArray) { ?>
                        <option value="<?=$key?>" <?=($type->motorization == $key) ? 'selected' : ''?>><?=$typeFromArray?></option>
                    <?php } ?>
                </select><span class="textWhite font-size-1-6rem">*</span></li>
            </ul>
            <p class="font-size-0-9rem text-center"><span class="textRed">*</span>(Champs obligatoire)</p>
            <input type="submit" value="Valider" class="formDashboardButton">
        </form>
    </div>
</main>