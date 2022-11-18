<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ressource -->
    <link rel="stylesheet" href="./../public/assets/css/style.css">
    <!-- Header & Footer -->
    <link rel="stylesheet" href="./../public/assets/css/headerFooter.css">
    <!-- Home -->
    <link rel="stylesheet" href="./../public/assets/css/home.css">
    <!-- Formulaire Inscription/Connexion -->
    <link rel="stylesheet" href="./../public/assets/css/loginRegister.css">
    <!-- @media -->
    <link rel="stylesheet" href="./../public/assets/css/mediaSmall.css">
    <link rel="stylesheet" href="./../public/assets/css/mediaLarge.css">
    <link rel="stylesheet" href="./../public/assets/css/mediaXL.css">

    <!-- Scipt JS -->
    <script defer src="./../public/assets/js/script.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./../public/assets/img/icon/favicon.png" type="image/x-icon">
    <!-- Titre su site -->
    <title>Garage'Eco</title>
</head>

<body>
    <header>
        <!-- Container de la navbar entière (logo et barre de nav) -->
        <nav class="navbarContainer">
            <!-- Logo -->
            <a href="#" class="linkLogo"><img src="./../public/assets/img/garage’ecoLogo.svg" alt="Logo Garage'Eco" class="logo"></a>

            <!-- Container des liens de la navbar -->
            <ul class="nav-menu">
                <!-- Liens de la navbar -->
                <li class="nav-item no-decoration">
                    <a href="/controllers/home-controller.php" class="nav-link no-decoration">Accueil</a>
                </li>
                <li class="nav-item no-decoration">
                    <a href="/controllers/register-controller.php" class="nav-link no-decoration">Inscription</a>
                </li>
                <li class="nav-item no-decoration">
                    <a href="/controllers/login-controller.php" class="nav-link no-decoration">Connexion</a>
                </li>
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