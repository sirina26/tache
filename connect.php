<?php

session_start();
require "fonc.php";
$bdd= getBDD();
$name = $_POST['username'];
$pass = $_POST['pass'];

$req="SELECT * FROM `user` WHERE `username`='$name' and `password`='$pass' ";
// $res=$bdd->query($req);
$stmt = $bdd->prepare($req);
$stmt->bindParam('username', $name, PDO::PARAM_STR);
$stmt->bindValue('password', $pass, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
//
$resultat=$bdd->query($req);


if($count > 0)
{
    $donnees=$resultat->fetchAll();
    //Itération sur les résultats de la requête SQL
    foreach ($donnees as $ligne) {
        $id=$ligne['id'];
        $nom=$ligne['username'];
        $passsw=$ligne['password'];
    }

    $_SESSION['sess_id'] = $id;
    $_SESSION['sess_username'] = $nom;
    header('Location: http://localhost/tache/taches.php');
}
else
{
    echo "invalid username or password";
} 
?>