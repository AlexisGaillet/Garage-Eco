<main class="min-height-main-center flex-column-center">
    <h2 class="pageTitle">Ajouter un véhicule</h2>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><select name="brand" id="brand" required>
                <option disabled selected hidden value="">Marque</option>
                <optgroup label="Constructeurs les plus vendus">
                    <?php
                        foreach (Brand::get() as $brand) {
                            if ($brand->most_selled == 1) { ?>
                                <option value="<?=$brand->Id_brands?>"><?=$brand->name?></option>
                            <?php }
                        }
                    ?>
                </optgroup>
                <optgroup label="Constructeurs de A à Z">
                    <?php
                        foreach (Brand::get() as $brand) { ?>
                            <option value="<?=$brand->Id_brands?>"><?=$brand->name?></option>
                        <?php }
                    ?>
                </optgroup>
            </select></li>
            <p class="errorText"><?=$error['brand'] ?? ''?></p>
            
            <li><select name="model" id="model" required>
                <option disabled selected hidden value="">Modèle</option>
            </select></li>
            <p class="errorText"><?=$error['model'] ?? ''?></p>




            <li><select name="type" id="type" required>
                <option disabled selected hidden value="">Motorisation</option>

            </select></li>
            <p class="errorText"><?=$error['type'] ?? ''?></p>
        </ul>
        <input type="submit" value="Ajouter" class="registerLoginButton">
    </form>
</main>

<script src="./../public/assets/js/ajaxGetModelByBrand.js"></script>