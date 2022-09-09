<?php
    //fonction qui retourne la liste des categories
    function getAllCategory($bdd){
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_cat, nom_cat FROM categorie ORDER BY nom_cat ASC");
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
    // fonction création des categories
    function createCategorie($bdd,$nom):void
    {
        try
        { 
            $req = $bdd->prepare("INSERT INTO categorie(nom_cat)VALUES(?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->execute();
        }
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function showCatByName($bdd, $name):?array
    {
        try 
        {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT  nom_cat FROM categorie WHERE nom_cat = ?");
            //binder la valeur $mail au ?
            $req->bindParam(1, $name, PDO::PARAM_STR);
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