<?php
  include './model/commentaire.php';
  include './controller/ctrl_add_comp.php';
  include './controller/ctrl_template.php';

  if(isset($_SESSION['id']) AND $_SESSION['id'] != "" )
  { 
    if(isset($_GET['id_art']) AND $_GET['id_art'] !="")
    { 
        //nettoyer le contenu de $_GET['id_art']
        $idArt=cleanInput($_GET['id_art']);
         // on vérifie si  le bouton exist
        if(isset($_POST['Submit']))
        {
            // on vérifie que le champ du commentaires  existe et n'est pas vide
            if(!empty( $_POST['com']) AND !empty( $_POST['com']))
            {
                $com = cleanInput(( $_POST['com']));
                $dateCom= cleanInput(( $_POST['com']));
                 //créer le commentaire 
                 addCom($bdd, $_GET['id_art'], $_SESSION['id'], $_POST['date_com'],$_POST['com']);

            }
            else
            {
                $message='<strong> Veuiller remplir   les champs </strong> ';
            }
        }
    
        else
        {
            $message='<strong> Veuiller Ajouter votre commentaire </strong> ';
        }
    }
    else
    {
        $message='<strong> Veuiller vous connecter </strong> ';
    }
       
        
 }
 echo $message;
?>