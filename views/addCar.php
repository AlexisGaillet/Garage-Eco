<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Ajouter un véhicule</h2>
    <?php

    ?>
    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><select name="brand" id="brand" required>

                <option disabled selected hidden value="">Marque</option>


                <optgroup label="Constructeurs les plus vendus">
                    <?php
                        foreach (Brand::getAll() as $brand) {
                            if ($brand->most_selled == 1) { ?>
                                <option value="<?=$brand->id?>"><?=$brand->name?></option>
                            <?php }
                        }
                    ?>
                </optgroup>


                <optgroup label="Constructeurs de A à Z">
                    <?php
                        foreach (Brand::getAll() as $brand) { ?>
                            <option value="<?=$brand->id?>"><?=$brand->name?></option>
                        <?php }
                    ?>
                </optgroup>

            </select></li>
            <p class="errorText"><?=$error['brand'] ?? ''?></p>


            <li><select name="model" id="model" required>

                <option disabled selected hidden value="">Modèle</option>


                    <?php foreach (Model::getAll($id_brands, $distinct = true) as $distinctModel) { ?>
                        <optgroup label="<?=$distinctModel->name?>">
                            <?php
                                foreach (Model::getAll($id_brands, $distinct = false, $where = $distinctModel->name) as $model) { ?>
                                    <option value="<?=$model->id?>"><?=$model->name?> <?=$model->car_year?></option>
                                <?php }
                            ?>
                        </optgroup>
                    <?php } ?>


                <!-- <optgroup label="A3">
                    <option>A3 (2013-2018)</option>
                    <option>A3 Sportback (2018-...)</option>
                </optgroup>

                <optgroup label="A4">
                    <option>A4 (2008-2013)</option>
                    <option>A3 Sportback (2013-2018)</option>
                    <option>A3 Sportback (2018-...)</option>
                </optgroup> -->

            </select></li>
            <p class="errorText"><?=$error['model'] ?? ''?></p>


            <li><select name="type" id="type" required>

                <option disabled selected hidden value="">Motorisation</option>


                <optgroup label="Diesel">
                    <option>1.6 TDI (105 CH)</option>
                    <option>1.6 TDI (110 CH)</option>
                    <option>2.0 TDI (150 CH)</option>
                    <option>2.0 TDI (184 CH)</option>
                </optgroup>

                <optgroup label="Essence">
                    <option>1.4 TFSI (125 CH)</option>
                    <option>1.8 TFSI (180 CH)</option>
                </optgroup>

                <optgroup label="Hybride">
                    <option>1.4 TFSI e-tron (150 CH)</option>
                </optgroup>
            </select></li>
            <p class="errorText"><?=$error['type'] ?? ''?></p>
        </ul>
        <input type="submit" value="Ajouter" class="registerLoginButton">
    </form>
</main>