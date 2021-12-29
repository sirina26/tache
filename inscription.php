<?php
require "fonc.php";	 
$bdd=getBDD();
	if(isset($_POST['forminscription'])) {
	   $pseudo = ($_POST['pseudo']);
	   $mdp = ($_POST['mdp']);
	   if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) {
	        $pseudolength = strlen($pseudo);
	        if($pseudolength <= 200) {
                $sql = ("SELECT COUNT(*) FROM user WHERE `username` = '$pseudo'");
                $res = $bdd->query($sql);
                $mailexist = $res->fetchColumn();
                   var_dump($mailexist);
	               if($mailexist == 0) {
	                     $insertmbr = $bdd->prepare("INSERT INTO `user`(`id`, `username`, `password`) VALUES (null,'$pseudo','$mdp')");
	                     $insertmbr->execute(array($pseudo, $mdp));
	                     $erreur = "Votre compte a bien été créé ! <a href=\"index.php\">Me connecter</a>";
	                  } 
	                else {
	                  $erreur = "Adresse mail déjà utilisée !";
	               }	           
	      } else {
	         $erreur = "Votre pseudo ne doit pas dépasser 200 caractères !";
	      }
	   } else {
	      $erreur = "Tous les champs doivent être complétés !";
	   }
	}
	?>
<html>
    <head>
        <title>inscription</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div align="center">
            <h2>Inscription</h2>
            <br /><br />
            <form method="POST" action="">
            <table>
                <tr>
                    <td align="right">
                        <label for="pseudo">Pseudo :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                    </td>
                </tr>
                
                <tr>
                    <td align="right">
                        <label for="mdp">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td align="center">
                        <br />
                        <input type="submit" name="forminscription" value="Je m'inscris" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
            if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
            }
            ?>
        </div>
	</body>
</html>