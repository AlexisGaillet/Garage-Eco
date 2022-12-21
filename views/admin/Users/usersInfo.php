<main>
    <h2 class="pageTitle">Informations d'un utilisateur</h2>

    <div class="dashboardRow">
        <a href="/admin/liste-utilisateur" class="dashboardGoBack">Retour</a>
    </div>

    <div class="resultInfo">
        <h3 class="dashboardSectionTitle">Utilisateur</h3>
        <div class="usersInfo">
            <p class="usersInfoText"><span>Prénom : </span><?=$users->firstname?></p>
            <p class="usersInfoText"><span>Nom : </span><?=$users->lastname?></p>
            <p class="usersInfoText"><span>Email : </span><?=$users->mail?></p>
            <p class="usersInfoText <?= ($users->admin == 1) ? 'textLightgreen' : '' ; ?>"><span>Role : </span><?=$role[$users->admin]?></p>
        </div>

        <h3 class="dashboardSectionTitle">Voiture(s)</h3>
        <?php if (Car::userHasCar($users->Id_users) > 1) { 
            foreach ($cars as $car) {?>
            <div class="usersInfo">
                <p class="usersInfoText"><?=Brand::get($car->Id_brands)->name.' '.Model::getOne($car->Id_models)->name.' '.Model::getOne($car->Id_models)->car_year.' - '.Type::getOne($car->Id_types)->engine_type?></p>
            </div>
        <?php }} elseif (Car::userHasCar($users->Id_users) == 1 ) { ?>
            <div class="usersInfo">
                <p class="usersInfoText"><?=Brand::get($cars->Id_brands)->name.' '.Model::getOne($cars->Id_models)->name.' '.Model::getOne($cars->Id_models)->car_year.' - '.Type::getOne($cars->Id_types)->engine_type?></p>
            </div>
        <?php } else { ?>
            <p class="usersInfoText">Cet utilisateur n'a pas de voiture</p>
        <?php } ?>
    </div>
</main>