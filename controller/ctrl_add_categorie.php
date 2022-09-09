<?php
     $namePage = "Add categorie";
     $message = "";
     //import des ressources
     include './model/categorie.php';
     include './view/view_header.php';
     include './view/view_navbar.php';
     include './view/view_add_categorie.php';
     
     //test si le bouton est cliqué
    if(isset($_POST['submit']))
    {
        //test si les champs input sont remplis
        if(!empty($_POST['nom_cat']))
        {
            //stocker les valeurs POST dans des variables
            $nom = cleanInput($_POST['nom_cat']);
            //stocker  leresultat de la requête (chercher si elle  existe)
            $exist = showCatByName($bdd, $nom);
            if(empty($exist))
            {
                createCategorie($bdd,$nom);
                //message de confirmation
                $message = "la categorie $nom à été ajouté en BDD";
            }
            else
            {
                $message = 'cette catégorie'.$nom.' existe déjà.';
            }
            
        }
        else
        {
            $message = "veuillez remplir le champ";
        }
    }
    else
    {
        $message = "veuillez appuyer sur  ajouter ";
    }
    echo $message;
     include './view/view_footer.php';
     
?>