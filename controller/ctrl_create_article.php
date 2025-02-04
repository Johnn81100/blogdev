<?php
    $namePage = "Create Article";
    $message = "";
    //import des ressources
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
        <p><input type="file" name="img_art"></p>
        <p><input type="submit" value="ajouter" name="submit"></p>
        </form>';  
    
    //test 
    //test si le bouton est cliqué
    if(isset($_POST['submit'])){
        //test si les champs input sont remplis
        if(!empty($_POST['nom_art']) AND !empty($_POST['contenu_art']) AND
        !empty($_POST['date_art']) )
        {
            //stocker les valeurs POST dans des variables
            $nomArticle = cleanInput($_POST['nom_art']);
            $contenuArticle = cleanInput($_POST['contenu_art']);
            $dateArticle = cleanInput($_POST['date_art']);
            $idCat = cleanInput($_POST['id_cat']);
            $exist = showArtByName($bdd, $nomArticle,  $dateArticle);
            //test si le compte existe
            if(empty($exist))
            {
                //test bien téléchargé  le fichier
                if(isset($_FILES['img_art']) AND $_FILES['img_art']['name'])
                {
                    // stockage des valeurs du fichier importé
                    $name = $_FILES['img_art']['name']; 
                    $tmpName = $_FILES['img_art']['tmp_name']; 
                    $size = $_FILES['img_art']['size']; 
                    $error = $_FILES['img_art']['error'];
                    // variable qui utilisa la fonction pour modifie le  nom du fichier
                    $ext = get_file_extension($_FILES['img_art']['name']);
                    // chemin ou  l image  va etre stocké dans la bdd 
                    $emplacement = './asset/image/'.$nomArticle.$dateArticle."".$ext;
                    //appeler  la fonction pour déplacer et renommer un fichier 
                    move_uploaded_file($tmpName,$emplacement);
                }
                else
                {
                    $emplacement = './asset/image/profil.jpg';
                }

                createArticleV3($bdd,$nomArticle, $contenuArticle, $dateArticle, $idCat,$emplacement);
                //message de confirmation
                $hash = $util->getTokenUtil();
                $message = "l'article $nomArticle à été ajouté en BDD";
                $userMail = $mail_util;
                $subject = utf8_decode("Vérification de votre compte secu");
                $emailMessage = "<a href='http://localhost/secu/activate?id=$hash'>
                Activer votre compte utilisateur</a>";
                //envoi du mail d'activation
                $util->sendMail2($userMail, $subject, $emailMessage,
                $login_smtp, $mdp_smtp);
                //message de confirmation
                $message = "<br>Le compte $name_util à été ajouté";
            }
            else
            {
                
                 $message = "l'article $nomArticle  existe déja";
                
            }
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