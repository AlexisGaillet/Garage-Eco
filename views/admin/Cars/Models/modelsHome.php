<main>
    <h2 class="pageTitle">Modèles</h2>

    <div class="dashboardRow">
        <a href="/admin/vehicules" class="dashboardGoBack">Retour</a>
    </div>
    
    <div class="resultList flex-row">
        <?php foreach ($models as $model) { ?>
            <div class="brandCard border-box flex-column">
                <div class="flex-row-space-between">
                    <p class="cardText"><span>ID : </span><?=$model->Id_models?></p>
                    <a href="/admin/supprimer-modele?id=<?=$model->Id_models?>" class="textWhite no-decoration margin-side-5px"><img src="./../../../public/assets/img/icon/delete.png" alt="Supprimer" class="crossDeleteImg"></a>
                </div>
                <div class="flex-row justify-center">
                    <p class="cardText align-self-center"><?=$model->name . ' ' . $model->car_year?></p>
                </div>
                <div class="cardLink flex-row margin-top-10px">
                    <a href="/admin/motorisations?id=<?=$model->Id_models?>" class="textWhite">Motorisations</a>
                    <a href="/admin/modifier-modele?id=<?=$model->Id_models?>" class="textWhite">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>