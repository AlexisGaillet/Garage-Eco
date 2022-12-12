<main class="min-height-main-center flex-column-center">
    <h2 class="pageTitle">Choisissez votre véhicule</h2>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><select name="car" required class="addCarSelect">
                <option disabled selected hidden>Choisissez votre véhicule</option>
                <?php foreach ($cars as $car) { ?>
                    <option value="<?=$car->Id_cars?>"><?=Brand::get($car->Id_brands)->name.' '.Model::getOne($car->Id_models)->name.' '.Model::getOne($car->Id_models)->car_year.' - '.Type::getOne($car->Id_types)->engine_type?></option>
                <?php } ?>
            </select><span class="textRed font-size-1-6rem">*</span></li>
            <p class="errorText"><?=$error['car'] ?? ''?></p>
        </ul>
        <p class="font-size-0-9rem"><span class="textRed">*</span>(Champs obligatoire)</p>
        <input type="submit" value="Confirmer" class="registerLoginButton margin-top-10px">
    </form>
</main>