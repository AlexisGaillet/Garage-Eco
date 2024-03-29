<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Si le nom du fichier css est défini dans le controller de la page alors on fait <link> de ce fichier -->
    <?= (isset($stylesheet)) ? '<link rel="stylesheet" href="./../public/assets/css/' . $stylesheet . '.css">' : ''; ?>
    <!-- Ressource -->
    <link rel="stylesheet" href="./../public/assets/css/style.css">
    <!-- Header & Footer -->
    <link rel="stylesheet" href="./../public/assets/css/headerFooter.css">

    <!-- Scipt JS -->
    <script defer src="./../public/assets/js/script.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./../public/assets/img/icon/favicon.png" type="image/x-icon">
    <!-- Titre su site (Si le titre est défini dans le controller de la page alors on le rajoute dans le titre avec un trait vertical sinon on laisse on le met pas) -->
    <title><?= (isset($headTitle)) ? $headTitle . ' | ' : ''; ?>Garage'Eco</title>
</head>

<body>
    <header>
        <!-- Container de la navbar entière (logo et barre de nav) -->
        <nav class="navbarContainer">
            <!-- Logo -->
            <a href="/" class="linkLogo"><img src="./../public/assets/img/garage’ecoLogo.svg" alt="Logo Garage'Eco" class="logo"></a>

            <!-- Container des liens de la navbar -->
            <ul class="nav-menu">
                    <!-- Liens de la navbar -->
                <!-- Bouton Dashbord (Pour l'admin) -->
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->admin == 1) { ?>
                    <li class="nav-item no-decoration">
                        <a href="/admin" class="nav-link no-decoration dashboardNavbarButton"><span>Dashboard</span></a>
                    </li>
                <?php } ?>

                <li class="nav-item no-decoration">
                    <a href="/ajouter-un-vehicule" class="nav-link no-decoration">Ajouter un véhicule</a>
                </li>

                <li class="nav-item no-decoration">
                    <a href="/" class="nav-link no-decoration">Accueil</a>
                </li>

                <!-- Bouton inscription ou connexion (si il n'est pas connecté) -->
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li class="nav-item no-decoration">
                        <a href="/inscription" class="nav-link no-decoration">Inscription</a>
                    </li>
                    <li class="nav-item no-decoration">
                        <a href="/connexion" class="nav-link no-decoration">Connexion</a>
                    </li>

                <!-- Bouton Déconnexion (si il est connecté) -->
                <?php } elseif (isset($_SESSION['user'])) { ?>
                    <li class="nav-item no-decoration">
                        <a href="/modifier-profil" class="nav-link no-decoration">Modifier le profil</a>
                    </li>
                    <li class="nav-item no-decoration">
                        <a href="/deconnexion" class="nav-link no-decoration">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>

            <!-- Container des barres du bouton -->
            <div class="burger">
                <!-- Barre du bouton -->
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>