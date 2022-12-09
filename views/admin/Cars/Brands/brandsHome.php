<main>
    <h2 class="pageTitle">Marques</h2>

    <div class="dashboardRow">
        <a href="/admin" class="dashboardGoBack">Retour</a>
        <a href="/admin/ajouter-marque" class="dashboardRowLink">Ajouter une marque</a>
    </div>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>
    
    <div class="resultList flex-row">
        <?php foreach (Brand::get() as $brand) { ?>
            <div class="brandCard border-box flex-column">
                <div class="flex-row-space-between">
                    <p class="cardText"><span>ID : </span><?=$brand->Id_brands?></p>
                    <a href="/admin/supprimer-marque?id=<?=$brand->Id_brands?>" class="textWhite no-decoration margin-side-5px"><img src="./../../../public/assets/img/icon/delete.png" alt="Supprimer" class="crossDeleteImg"></a>
                </div>
                <div class="flex-row justify-center">
                    <p class="cardText align-self-center"><?=$brand->name?></p>
                </div>
                <div class="cardLink flex-row margin-top-10px">
                    <a href="/admin/modeles?id=<?=$brand->Id_brands?>" class="textWhite">Modèles</a>
                    <a href="/admin/modifier-marque?id=<?=$brand->Id_brands?>" class="textWhite">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>