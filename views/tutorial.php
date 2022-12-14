<main class="min-height-main">
    
    <a href="/reparer-moi-meme/choisir-solution" class="upLeftButton no-decoration"><span>Retour à la liste des solutions</span></a>
            
    <h2 class="pageTitle">Réparez votre véhicule</h2>

    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>

    <?php if ($steps != false) { ?>



        <!-- Titre de la section -->
        <h3 class="sectionTitle">Suivez le tutoriel</h3>
        
        <div class="mainContainer">
            <div class="tutorialContainer border-box">

                <div class="solutionTitle">
                    <h4><?= $solution->title ?></h4>
                </div>

                <div class="solutionDescription">
                    <p><?= $solution->description ?></p>
                </div>

                <div class="summary">
                    <h4 class="summaryTitle">Sommaire :</h4>
                    <ul>
                        <?php foreach ($steps as $key => $step) { ?>
                            <li><a href="#step<?=$step->Id_steps?>" class="no-decoration">Étape <?=$key +1?> : <?= $step->title ?></a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="steps">
                    <?php foreach ($steps as $key => $step) { ?>
                        <div class="step" id="step<?=$step->Id_steps?>">
                            <h4 class="stepTitle">Étape <?=$key +1?> : <?= $step->title ?></h4>
                            <div class="stepImg">
                                <img src="./../public/assets/img/steps/<?=$step->Id_solutions?>/<?=$key +1?>.jpg" alt="image de l'étape">
                            </div>
                            <div class="stepDescription">
                                <p><?= $step->description ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>



    <?php } else { ?>
        <h3 class="sectionTitle textRed">Une erreur est survenue</h3>
    <?php } ?>

</main>