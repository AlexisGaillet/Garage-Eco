<main class="border-box">
    <h2 class="pageTitle">Liste des utilisateurs</h2>

    <div class="dashboardRow">
        <a href="/admin/utilisateurs" class="dashboardGoBack">Retour</a>
    </div>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <div class="resultList flex-row">    
    <?php foreach ($users as $user) { ?>
            <div class="userCard border-box flex-column">
                <div class="flex-row-space-between">
                    <p class="cardText"><span>ID : </span><?=$user->Id_users?></p>
                    <a href="/admin/supprimer-utilisateur?id=<?=$user->Id_users?>" class="textWhite no-decoration margin-side-5px"><img src="./../../../public/assets/img/icon/delete.png" alt="Supprimer" class="crossDeleteImg"></a>
                </div>
                <div class="flex-row">
                    <p class="cardText"><span>Prénom/Nom : </span><?=$user->firstname.' '.$user->lastname?></p>
                </div>
                <p class="cardText"><span>Email : </span><?=$user->mail?></p>
                <p class="cardText <?= ($user->admin == 1) ? 'textLightgreen' : '' ; ?>"><span>Role : </span><?=$role[$user->admin]?></p>
                <div class="cardLink flex-row margin-top-10px">
                    <a href="/admin/informations-utilisateur?id=<?=$user->Id_users?>" class="textWhite">Informations</a>
                    <a href="/admin/modifier-utilisateur?id=<?=$user->Id_users?>" class="textWhite">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>