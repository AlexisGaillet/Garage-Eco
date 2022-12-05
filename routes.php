<?php

require_once __DIR__.'/router.php';

// Page d'accueil
any('/', '/controllers/home-controller.php');

// Page d'inscription
any('/inscription', '/controllers/register-controller.php');

// Page de connexion
any('/connexion', '/controllers/login-controller.php');

// Page de déconnexion
any('/deconnexion', '/controllers/logout-controller.php');

// Page de mot de passe oublié
any('/mot-de-passe-oublie', '/controllers/forgotPassword-controller.php');

// Page ajouter un véhicule
any('/ajouter-un-vehicule', '/controllers/addCar-controller.php');




        // ADMIN DASHBOARD
// Page d'accueil du dashboard
any('/admin', '/controllers/admin/home-controller.php');


    // USERS
// Page d'accueil des utilisateurs
any('/admin/utilisateurs', '/controllers/admin/Users/usersHome-controller.php');

// Page liste des utilisateurs
any('/admin/liste-utilisateur', '/controllers/admin/Users/usersList-controller.php');

// Page modification d'un utilisateur
any('/admin/modifier-utilisateur', '/controllers/admin/Users/usersModify-controller.php');

// Page suppression d'un utilisateur
any('/admin/supprimer-utilisateur', '/controllers/admin/Users/usersDelete-controller.php');

// Page informations d'un utilisateur
any('/admin/informations-utilisateur', '/controllers/admin/Users/usersInfo-controller.php');






    // CARS
// Page d'accueil des véhicules
any('/admin/vehicules', '/controllers/admin/Cars/carsHome-controller.php');

    // BRANDS
// Page d'accueil des marques
any('/admin/marques', '/controllers/admin/Cars/Brands/brandsHome-controller.php');

// Page suppression d'une marque
any('/admin/supprimer-marque', '/controllers/admin/Cars/Brands/brandsDelete-controller.php');



    // MODELS
// Page d'accueil des modèles
any('/admin/modeles', '/controllers/admin/Cars/Models/modelsHome-controller.php');



    // TYPES
// Page d'accueil des types
any('/admin/types', '/controllers/admin/Cars/Types/typesHome-controller.php');






    // PROBLEMS
// Page d'accueil des problèmes
any('/admin/problemes', '/controllers/admin/Problems/problemsHome-controller.php');








// Ajax pour ajouter un véhicule
any('/add-car-ajax', '/controllers/addCarAjax-controller.php');




// Page des conditions d'utilisation
// any('/cgu', '/controllers/terms/conditions-controller.php');

// Page des mentions légales
// any('/mentions-legales', '/controllers/terms/legalNotice-controller.php');








// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
// get('/', 'views/index.php');

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
// get('/user/$id', 'views/user');

// Dynamic GET. Example with 2 variables
// The $name will be available in full_name.php
// The $last_name will be available in full_name.php
// In the browser point to: localhost/user/X/Y
// get('/user/$name/$last_name', 'views/full_name.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
// get('/product/$type/color/$color', 'product.php');

// A route with a callback
// get('/callback', function(){
//   echo 'Callback executed';
// });

// A route with a callback passing a variable
// To run this route, in the browser type:
// http://localhost/user/A
// get('/callback/$name', function($name){
//   echo "Callback executed. The name is $name";
// });

// A route with a callback passing 2 variables
// To run this route, in the browser type:
// http://localhost/callback/A/B
// get('/callback/$name/$last_name', function($name, $last_name){
//   echo "Callback executed. The full name is $name $last_name";
// });

// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','404.php');
