<main>
    <h2 class="pageTitle">Motorisation</h2>

    <div class="dashboardRow">
        <a href="/admin/modeles?id=<?=$id_brand?>" class="dashboardGoBack">Retour</a>
    </div>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <h3 class="sectionTitle"></h3>
    <div class="resultList flex-row">
        <?php foreach ($types as $type) { ?>
            <div class="brandCard border-box flex-column">
                <div class="flex-row-space-between">
                    <p class="cardText"><span>ID : </span><?=$type->Id_types?></p>
                    <a href="/admin/supprimer-motorisation?id_model=<?=$id?>&id=<?=$type->Id_types?>" class="textWhite no-decoration margin-side-5px"><img src="./../../../public/assets/img/icon/delete.png" alt="Supprimer" class="crossDeleteImg"></a>
                </div>
                <div class="flex-row justify-center">
                    <p class="cardText align-self-center"><?=$type->engine_type?></p>
                </div>
                <div class="cardLink flex-row margin-top-10px">
                    <a href="/admin/modifier-motorisation?id_model=<?=$id?>&id=<?=$type->Id_types?>" class="textWhite">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>