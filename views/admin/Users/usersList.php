<main class="border-box">
    <h2 class="pageTitle">Liste des utilisateurs</h2>

    <div class="dashboardRow">
        <a href="/admin/utilisateurs" class="dashboardGoBack">Retour</a>
    </div>

    <div class="result flex-row">    
    <?php foreach ($users as $user) { ?>
            <div class="userCard border-box flex-column">
                <p class="userCardText"><span>ID : </span><?=$user->Id_users?></p>
                <div class="flex-row">
                    <p class="userCardText"><span>Prénom/Nom : </span><?=$user->firstname.' '.$user->lastname?></p>
                </div>
                <p class="userCardText"><span>Email : </span><?=$user->mail?></p>
                <p class="userCardText <?= ($user->admin == 1) ? 'textLightgreen' : '' ; ?>"><span>Role : </span><?=$role[$user->admin]?></p>
                <div class="userCardLink flex-row margin-top-10px">
                    <a href="/admin/modifier-utilisateur?id=<?=$user->Id_users?>" class="textWhite">Modifier</a>
                    <a href="/admin/supprimer-utilisateur?id=<?=$user->Id_users?>" class="textWhite">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>