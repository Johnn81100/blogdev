<?php
    $namePage = "Create Article";
    $message = "";
    //import des ressources
    include './utils/bddConnect.php';
    include './utils/functions.php';
    include './model/article.php';
    include './model/categorie.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_create_article.php';
    //construire la liste déroulante
    $liste = getAllCategory($bdd);
    //compteur pour liste
    $cpt= 0;
    //boucle pour parcourir la liste
    foreach($liste as $value){
        //if($value['nom_cat']== 'sport') version avec le nom de la catégorie
        //test si compteur <1 (ajout de selected)
        if($cpt <1)
        {
            //construction des options de la liste
            echo '<option value = '.$value['id_cat'].' selected>'.$value['nom_cat'].'</option>';
            $cpt++;
        }
        //sinon on affiche l'option sans selected
        else{
             //construction des options de la liste
            echo '<option value = '.$value['id_cat'].'>'.$value['nom_cat'].'</option>';
        } 
    }
    //afficher la fin du formulaire
    echo '</select></p>
        <p>Saisir date l\'article</p>
        <p><input type="date" name="date_art"></p>
        <p><input type="submit" value="ajouter" name="submit"></p>
        </form>';  
    
    //test 
    //test si le bouton est cliqué
    if(isset($_POST['submit'])){
        //test si les champs input sont remplis
        if(!empty($_POST['nom_art']) AND !empty($_POST['contenu_art']) AND
        !empty($_POST['date_art']) ){
            //stocker les valeurs POST dans des variables
            $nomArticle = cleanInput($_POST['nom_art']);
            $contenuArticle = cleanInput($_POST['contenu_art']);
            $dateArticle = cleanInput($_POST['date_art']);
            $idCat = cleanInput($_POST['id_cat']);
            createArticleV3($bdd,$nomArticle, $contenuArticle, $dateArticle, $idCat);
            //message de confirmation
            $message = "l'article $nomArticle à été ajouté en BDD";
        }
        //test si un ou plusieurs champs ne sont pas remplis
        else{
            $message = "Veuillez remplir les champs du formulaire";
        }
    }
    //test si le bouton n'est pas cliqué
    else{
        $message = "Pour ajouter un article veuillez cliquer sur ajouter";
    }
    //affichage des erreurs
    echo $message;
    include './view/view_footer.php';
?>