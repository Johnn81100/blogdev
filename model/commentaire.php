<?php
function addCom($bdd, $id_art, $id,$date_com,$com)
{
    try
    {
        $req = $bdd->prepare("INSERT TO ajouter (id_util, id_art, date_com, com)  VALUE ( ?,?,?,?)");
        $req->bindParam(1, $id, PDO::PARAM_STR);
        $req->bindParam(2, $id_art, PDO::PARAM_STR);
        $req->bindParam(3, $date_com, PDO::PARAM_STR);
        $req->bindParam(4, $com, PDO::PARAM_STR);
        $req->execute();
    }
    catch (Exception $e) 
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
}
?>