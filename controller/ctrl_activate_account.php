<?php
    include './model/utilisateur.php';
    include './view/view_activate_account.php';
    $message = "";
    //test si $_GET['mail'] existe et est non vide
    if(isset($_GET['mail']) AND $_GET['mail'] !=""){
        //nettoyer le contenu de $_GET['mail']
        $mail = cleanInput($_GET['mail']);
        //instance de ManagerUtil
        // $util = new ManagerUtil(null, null, null, null, null);
        //set la valeur du token
        // $util->setTokenUtil($token);
        //récupére l'utilisateur
        $exist = showUserByMail($bdd, $mail);
        //test si l'utilisateur existe
        if($exist != null){
            //active le compte
            // $util->activateUtil($bdd);
            activateUserByMail($bdd, $mail);
            $message = "Le compte à été activé";
        }
        //l'utilisateur n'existe pas
        else{
            $message = "erreur impossible d'activer le compte";
        }
    }
    //$_GET['id'] n'existe pas ou vide
    else{
        $message = "Erreur aucun Paramètres";
    }
    echo $message;
?>