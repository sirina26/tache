<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- poour faire les icones -->
    <script src="https://kit.fontawesome.com/cd1eb87d27.js" crossorigin="anonymous"></script>
    <title>Change etat</title>
</head>
<body>
    
<?php
require 'fonc.php';
$bdd=getBDD();

	//Définition de la requête SQL
	$requete = "SELECT * FROM taches";

	//Exécution de la requête SQL et récupération de ses résultats
	$resultat=$bdd->query($requete);?>
    <table class="table table-bordered">
		<thead>
            <h1>Change etat</h1>
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Etat</th>
                <th scope="col">Chager l'état</th>
			</tr>
		</thead>
    <tbody>
    <?php 
        $donnees=$resultat->fetchAll();

        foreach ($donnees as $ligne) {
        $id=$ligne['id'];
        $nom=$ligne['nom'];
        $etat=$ligne['etat'];
        echo "<tr><td>$nom</td>";
        echo "<td>$etat</td>";
        echo "<td>";
        if($etat == "En attente"){
            
            echo "<a href='ChangerEtat.php?id=$id&etat=En cours'><i class='fas fa-spinner'></i></a>
            <a href='ChangerEtat.php?id=$id&etat=Terminer'><i class='fas fa-check'></i></a>";
        }
        if($etat=="Terminer")
        {
            echo "
            <a href='ChangerEtat.php?id=$id&etat=En cours'><i class='fas fa-spinner'></i></a>
            <a href='ChangerEtat.php?id=$id&etat=En attente'><i class='fas fa-pause'></i></a>";
        }
        if($etat=="En cours")
        {
            echo "<a href='ChangerEtat.php?id=$id&etat=En attente'><i class='fas fa-pause'></i></a>
            <a href='ChangerEtat.php?id=$id&etat=Terminer'><i class='fas fa-check'></i></a>";
        }
        echo "</td>";
        echo '</tr>';
    }
?>
</tbody>
</table>
<script src="js/bootstrap.js"></script>
</body>
</html>
