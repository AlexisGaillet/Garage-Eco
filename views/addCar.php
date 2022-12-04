<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Ajouter un véhicule</h2>
    
    <?php

    // var_dump(Type::getAll(1, $distinct = true));
    // var_dump(Type::getAll(1, $distinct = false, $where = 1));

    ?>

    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><select name="brand" id="brand" required>
                <option disabled selected hidden value="">Marque</option>
                <optgroup label="Constructeurs les plus vendus">
                    <?php
                        foreach (Brand::getAll() as $brand) {
                            if ($brand->most_selled == 1) { ?>
                                <option value="<?=$brand->Id_brands?>"><?=$brand->name?></option>
                            <?php }
                        }
                    ?>
                </optgroup>
                <optgroup label="Constructeurs de A à Z">
                    <?php
                        foreach (Brand::getAll() as $brand) { ?>
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