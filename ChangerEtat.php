<?php require 'fonc.php'; 

    //Chargement de la fonction de connexion à la base de donnée
    $bdd=getBDD();

    $id = $_GET['id'];
    $etat =$_GET['etat'];

    //Définition de la requête SQL
    $requete="
    UPDATE taches SET etat='$etat' WHERE id=$id";

    //Exécution de la requête SQL et récupération de ses résultats
    $resultat=$bdd->query($requete);

    header('Location: http://localhost/tache/taches.php');
exit;
?>
