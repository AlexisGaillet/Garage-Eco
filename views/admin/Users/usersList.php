<main>
    <h2 class="pageTitle">Liste des utilisateurs</h2>

    <div class="dashboardRow">
        <a href="/admin/utilisateurs" class="dashboardGoBack">Retour</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user->Id_users ?></td>
                    <td><?= $user->lastname ?></td>
                    <td><?= $user->firstname ?></td>
                    <td><?= $user->mail ?></td>
                    <td><?= $user->admin ?></td>
                    <td>
                        <a href="/admin/utilisateurs/modifier/<?= $user->Id_users ?>">Modifier</a>
                        <a href="/admin/utilisateurs/supprimer/<?= $user->Id_users ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>