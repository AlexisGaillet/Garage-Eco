<main>
    <h2 class="pageTitle">Modifier un Modèle</h2>

    <div class="dashboardRow">
        <a href="/admin/modeles?id=1" class="dashboardGoBack">Retour</a>
    </div>

    <div class="formDashBoardContainer flex-column-center">
        <form method="post" class="formDashboard flex-column">
            <ul>
                <li><input type="text" placeholder="Nom du modèle" value="<?=$model->name ?? ''?>" name="name" class="flex-row" required><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['name'] ?? ''?></p>

                <li><select name="startYear" id="startYear">
                    <?php
                        $year = date('Y');
                        while ($year >= 1900) { ?>
                            <option value="<?=$year?>" <?=($placeholderStart_year == $year) ? 'selected' : ''?>><?=$year?></option>';
                            <?php $year--;
                        }
                    ?>
                </select><span class="textRed font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['startYear'] ?? ''?></p>

                <li><select name="endYear" id="endYear">
                    <?php
                        $year = date('Y')+2;
                        while ($year >= 1900) { ?>
                            <option value="<?=$year?>" <?=($placeholderEnd_year == $year) ? 'selected' : ''?>><?=$year?></option>';
                            <?php $year--;
                        }
                    ?>
                </select><span class="textWhite font-size-1-6rem">*</span></li>
                <p class="errorText"><?=$error['endYear'] ?? ''?></p>

                <li>
                    <input type="checkbox" name="noEndYear" id="noEndYear">
                    <label for="noEndYear">Le Modèle n'a pas de date de fin</label>
                </li>
                <p class="errorText"><?=$error['noEndYear'] ?? ''?></p>
            </ul>
            <p class="font-size-0-9rem text-center"><span class="textRed">*</span>(Champs obligatoire)</p>
            <input type="submit" value="Valider" class="formDashboardButton">
        </form>
    </div>
</main>