<?php
    $namePage = "show all article";
    //import des ressources
    include './utils/bddConnect.php';
    include './model/article.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_all_article.php';
    //logique de la page
    //stocker la liste des articles dans un tableau
    $liste = getAllArticle($bdd);
    //parcourir le tableau ($liste)
    foreach($liste as $value){
        //affichage de chaque ligne du tableau
        echo '<p>'.$value['id_art'].' '.$value['nom_art'].' 
        '.$value['contenu_art'].' '.$value['date_art'].'</p>'; 
    } 
    include './view/view_footer.php';
?>