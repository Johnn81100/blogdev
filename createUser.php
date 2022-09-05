<?php
    $namePage = "Create User";
    $message = "";
    //import des ressources
    include './utils/bddConnect.php';
    include './utils/functions.php';
    include './model/utilisateur.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_create_user.php';
    //test 
    //test si le bouton est cliqué
    if(isset($_POST['submit'])){
        //test si les champs input sont remplis
        if(!empty($_POST['nom_util']) AND !empty($_POST['prenom_util']) AND
        !empty($_POST['mail_util']) AND !empty($_POST['password_util'])){
            //stocker les valeurs POST dans des variables
            $nom = cleanInput($_POST['nom_util']);
            $prenom = cleanInput($_POST['prenom_util']);
            $mail = cleanInput($_POST['mail_util']);
            //récupération du compte si il existe
            $exist = showUserByMail($bdd, $mail);
            //test si le compte existe
            if(empty($exist)){
                //version bcrypt
                $password = password_hash(cleanInput($_POST['password_util']), PASSWORD_DEFAULT);
                //fonction ajouter un utilisateur en BDD
                createUserV3($bdd,$nom, $prenom, $mail, $password);
                //message de confirmation
                $message = "le compte $nom à été ajouté en BDD";
            }
            //test sinon le compte existe
            else{
                $message = "le compte existe déja";
            }
        }
        //test si un ou plusieurs champs ne sont pas remplis
        else{
            $message = "Veuillez remplir les champs du formulaire";
        }
    }
    //test si le bouton n'est pas cliqué
    else{
        $message = "Pour ajouter un utilisateur veuillez cliquer sur ajouter";
    }
   /*  //message si utilisateur à été ajouté
    if(isset($_GET['nameCreate'])){
        $message = 'le compte à été ajouté en BDD';
    } */
    //affichage des erreurs
    echo $message;
    include './view/view_footer.php';
?>