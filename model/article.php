<?php

    function createArticle($bdd,$nom, $contenue, $date)
    {
        $req = $bdd->prepare("INSERT INTO utilisateur(nom_art, contenue_art, date_art)VALUES(?, ?, ?)");
        $req->bindParam(1, $nom, PDO::PARAM_STR);
        $req->bindParam(2, $contenue, PDO::PARAM_STR);
        $req->bindParam(3, $date, PDO::PARAM_STR);
        $req->execute();
    } 
    catch (Exception $e) 
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
    