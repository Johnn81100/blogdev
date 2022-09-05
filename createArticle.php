<?php 
    $namePage = "Create Article";
    $message = "";
    //import des ressources
    include './utils/bddConnect.php';
    include './utils/functions.php';
    include './model/article.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_create_article.php';

    if(isset($_POST['submit']))
    {
        //test si les champs input sont remplis
        if(!empty($_POST['nom_art']) AND !empty($_POST['contenu_art']) AND
        !empty($_POST['date_art']) AND !empty($_POST['valeur_codeAuto']))
        {

            //stocker les valeurs POST dans des variables
            $nom = cleanInput($_POST['nom_art']);
            $contenu= cleanInput($_POST['contenu_art']);
            $date = cleanInput($_POST['date_art']);
            $code = cleanInput($_POST['valeur_codeAuto']);
            // recuperation du code
            $exist= getCode($bdd,$Code)
            //test si le compte existe
            if(empty($exist))
            {
                createArticleV3($bdd,$nom,$contenu,$date,$code);
                //message de confirmation
                $message = "l'article $nom  à été ajouté en BDD";
            }
            else
            {
                $message = "veuillez noter un code existant.";
            }
        }
        //test si un ou plusieurs champs ne sont pas remplis
        else
        {
            $message = "Veuillez remplir les champs du formulaire";
        }
    }
    else
    {
        $message = "Appuyer sur  ajouter pour  sauvegarder  votre article";
    }
    echo $message;

    include './view/view_footer.php';
?>

