<?php

function createArticleV3($bdd, $nom, $contenu, $date, $idCat, $img)
{
    try
     {
        $req = $bdd->prepare("INSERT INTO article(nom_art, contenu_art, date_art, id_cat, img_art)VALUES(?, ?, ?, ?,?)");
        $req->bindParam(1, $nom, PDO::PARAM_STR);
        $req->bindParam(2, $contenu, PDO::PARAM_STR);
        $req->bindParam(3, $date, PDO::PARAM_STR);
        $req->bindParam(4, $idCat, PDO::PARAM_INT);
        $req->bindParam(5, $img, PDO::PARAM_STR);
        $req->execute();
    } 
    catch (Exception $e) 
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
}
function showUserByMail($bdd, $code):?array{
    try 
    {
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
 function getAllArticle($bdd):?array
 {
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
//function qui retourne la liste triée par date (asc ou desc)
function getAllArticleByFilter($bdd, $filter):?array
{
    try 
    {
        //cas ou $filter vaut 'asc'
        if($filter == 'asc')
        {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_art, nom_art, contenu_art,
            date_art FROM article ORDER BY date_art ASC");
        }
        //cas ou $filter vaut 'desc'
        else
        {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_art, nom_art, contenu_art,
            date_art FROM article ORDER BY date_art DESC");
        }
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
//fonction qui retourne un tableau associatif d'un article null (ex :?string)
function showArtByName($bdd, $nameArt, $date):?array
{
    try
    {
        //stocker et évaluer la requête
        $req = $bdd->prepare("SELECT nom_art, date_art FROM article WHERE nom_art = ? AND date_art = ?");
        //binder la valeur $nameArt $date au ?
        $req->bindParam(1, $nameArt, PDO::PARAM_STR);
        $req->bindParam(2, $date, PDO::PARAM_STR);
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
 //function qui recupére le code
 function getCode($bdd, $code):?array
 {
    try 
    {
        //stocker et évaluer la requête
        $req = $bdd->prepare("SELECT id_codeauto, valeur_codeauto FROM codeauto 
        WHERE valeur_codeauto = ?");
        //binder la valeur $mail au ?
        $req->bindParam(1, $code, PDO::PARAM_INT);
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