<main>
    <!-- Message Flash -->
    <?php if (SessionFlash::existGood()) { ?> <h4 class="message-flash textGreen"><?= SessionFlash::get() ?></h4> <?php } elseif (SessionFlash::existError()) { ?> <h4 class="message-flash textRed"><?= SessionFlash::get() ?></h4> <?php } ?>
    <!-- Citation -->
    <h2 class="pageTitle">Réparer sa voiture c’est pas si compliqué.</h2>
    <!-- Ligne séparatrice -->
    <div class="line"></div>
    <!-- Titre de la section -->
    <h3 class="sectionTitle">Comment voulez-vous réparer votre véhicule ?</h3>
    <!-- Contenant les choix -->
    <div class="boxContainer">
        <!-- Bordure du premier choix -->
        <div class="boxChoiceBorder">
            <!-- Container (avec background-image) du premier choix -->
            <a href="/choisir-un-vehicule" class="boxLink"><span class="box1 boxChoice">
                <!-- Texte du premier choix -->
                <p class="textChoice">Moi-même</p>
            </span></a>
        </div>
        <!-- Bordure du deuxième choix -->
        <div class="boxChoiceBorder">
            <!-- Container (avec background-image) du deuxième choix -->
            <a href="https://www.google.com/search?q=Garage+%C3%A0+proximit%C3%A9" class="boxLink" target="_blank"><span class="box2 boxChoice">
                <!-- Texte du deuxième choix -->
                <p class="textChoice">Dans un garage</p>
            </span></a>
        </div>
    </div>
    <!-- Ligne séparatrice -->
    <div class="line margin-top-10px"></div>
    <!-- Container de la section à propos -->
    <div class="flex-column-center">
        <!-- Titre de la section -->
        <h3 class="sectionTitle">À Propos</h3>
        <!-- Paragraphe de "À Propos" -->
        <p class="paragraphHome">Aujourd'hui, les garages affiliés aux constructeurs automobiles abusent 
            sur les tarifs auprès de leurs consommateurs, le budget consacré à l’entretien des véhicules 
            a augmenté de 50% depuis 2000. Aujourd’hui, si vous voulez faire des économies, vous pouvez 
            l’entretenir ou la réparer vous-même grâce à Garage'Eco.</p>
    </div>
    <!-- Ligne séparatrice -->
    <div class="line margin-top-20px"></div>
    <div class="flex-column-center">
        <!-- Titre de la section -->
        <h3 class="sectionTitle">La réparation à domicile</h3>
        <!-- Paragraphe de "La réparation à domicile" -->
        <p class="paragraphHome margin-bottom-20px">Pour faire vos réparations vous-même, certaines fois, vous aurez besoin 
            des équipements particuliers et des conseils d’un professionnel ou d’un amateur très averti. 
            Assurez-vous d’avoir les outils et les pièces nécessaires pour le bien de vôtre réparation.</p>
    </div>
</main>