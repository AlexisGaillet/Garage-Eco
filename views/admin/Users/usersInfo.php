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
    </div>
</main>