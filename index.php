<?php
    include './utils/bddConnect.php';
    include './utils/functions.php';
    //utilisation de la session_start(pour gérer la connexion au serveur)
    session_start();

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    //routeur
    switch ($path) {
        case '/blogdev/':
            include './home.php';
            break;
        case '/blogdev/connexion':
            include './controller/ctrl_connexion.php';
            break;
        case '/blogdev/deconnexion':
            include './controller/ctrl_deconnexion.php';
            break;
        case '/blogdev/showAllArticle':
            include './controller/ctrl_show_all_article.php';
            break;
        case '/blogdev/createUser':
            include './controller/ctrl_create_user.php';
            break;
        case '/blogdev/createArticle':
            include './controller/ctrl_create_article.php';
            break;
         case '/blogdev/activate':
            include './controller/ctrl_activate_account.php';
            break;
        case '/blogdev/addCategorie':
            include './controller/ctrl_add_categorie.php';
            break;
        default:
            include './error.php';
            break;
    }
?>