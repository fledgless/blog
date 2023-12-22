<?php 
function executeRequete($req)
{
    global $mysqli;
    try {
        $resultat = $mysqli->query($req);
        if (!$resultat) {
            die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
        }
        return $resultat;
    } catch (Exception $e) {
        return $e;
    }
}