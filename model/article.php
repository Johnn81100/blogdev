<?php

function createArticleV3($bdd, $nom, $contenu, $date)
{
    try
     {
        $req = $bdd->prepare("INSERT INTO article(nom_art, contenu_art, date_art)VALUES(?, ?, ?)");
        $req->bindParam(1, $nom, PDO::PARAM_STR);
        $req->bindParam(2, $contenu, PDO::PARAM_STR);
        $req->bindParam(3, $date, PDO::PARAM_STR);
        $req->execute();
    } 
    catch (Exception $e) 
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
}
function showUserByMail($bdd, $code):?array{
    try {
        //stocker et évaluer la requête
        $req = $bdd->prepare("SELECT id_codeAuto, valeur_codeAuto FROM codeAuto WHERE valeur_codeAuto = ?");
        //binder la valeur $mail au ?
        $req->bindParam(1, $code, PDO::PARAM_STR);
        //exécuter la requête
        $req->execute();
        //stocker dans $data le résultat de la requête (tableau associatif)
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        //retourner le tableau associatif
        return $data;
    } 
    catch (Exception $e) 
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
}
 //function qui retourne la liste de tous les articles
 function getAllArticle($bdd):?array{
    try {
        //stocker et évaluer la requête
        $req = $bdd->prepare("SELECT id_art, nom_art, contenu_art,
        date_art FROM article");
        //exécuter la requête
        $req->execute();
        //stocker dans $data le résultat de la requête (tableau associatif)
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        //retourner le tableau associatif
        return $data;
    } 
    catch (Exception $e) 
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
}
?>