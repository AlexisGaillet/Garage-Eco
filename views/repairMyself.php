<main class="min-height-main">
    
    <?php if (Car::userHasCar($_SESSION['user']->Id_users) == 1) { ?>
        <a href="/ajouter-un-vehicule" class="upLeftButton no-decoration"><span>Ajouter un autre véhicule</span></a>
    <?php } elseif (Car::userHasCar($_SESSION['user']->Id_users) > 1) { ?>
        <a href="/choisir-un-vehicule" class="upLeftButton no-decoration"><span>Changer de véhicule</span></a>
    <?php } ?>
    
    <h2 class="pageTitle">Réparez votre véhicule</h2>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <!-- Titre de la section -->
    <h3 class="sectionTitle">Quel est le problème ?</h3>

    <!-- Container de la partie "Quel est le probleme" -->
    <div class="width-100 flex justify-center border-box">
        <div class="whatIsTheProblemContainer border-box">

            <input type="text" name="problem" class="searchBar border-box">






        </div>
    </div>
</main>