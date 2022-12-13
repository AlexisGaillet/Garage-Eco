<main class="min-height-main">
    
        <?php if (Car::userHasCar($_SESSION['user']->Id_users) == 1) { ?>
            <a href="/ajouter-un-vehicule" class="upLeftButton no-decoration"><span>Ajouter un autre véhicule</span></a>
        <?php } elseif (Car::userHasCar($_SESSION['user']->Id_users) > 1) { ?>
            <a href="/choisir-un-vehicule?choose=1" class="upLeftButton no-decoration"><span>Changer de véhicule</span></a>
        <?php } ?>
            
    <h2 class="pageTitle">Réparez votre véhicule</h2>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <!-- Titre de la section -->
    <h3 class="sectionTitle">Choisissez une solution</h3>
    
    <?= (isset($problem) && $problem != '') ? '<h4 class="smallTitle">Recherche pour "'.ucfirst($problem).'"</h4>' : '' ?>
    
    <form action="/reparer-moi-meme/choisir-solution" method="get" class="searchBar">
        <input type="text" name="problem" placeholder="Votre Problème" <?= (isset($problem)) ? 'value="'.$problem.'"' : '' ?>>
        <input type="submit" value="Rechercher">
    </form>

    <div class="width-100 flex justify-center border-box margin-top-20px">
        <div class="chooseSolutionContainer border-box">

            <div class="solutionsContainer">
                <?php if ($solutions != false) { ?>
                    <?php foreach ($solutions as $solution) { ?>
                        <a href="/reparer-moi-meme/tutoriel?solution=<?=$solution->Id_solutions?>" class="no-decoration"><div class="solutionContainer">
                            <div class="solutionImg">
                                <img src="./../public/assets/img/solutions/<?=$solution->Id_solutions?>.jpg" alt="image de la solution">
                            </div>
                            <div class="solutionTextContainer">
                                <h4 class="solutionTitle"><?= $solution->title ?></h4>
                                <p class="solutionDescription"><?= $solution->description ?></p>
                            </div>
                        </div></a>
                    <?php }
                } else { ?>
                    <h4 class="noResult">Aucune solution n'a été trouvée pour votre recherche</h4>
                <?php } ?>
            </div>

        </div>
    </div>

</main>