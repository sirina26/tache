<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- poour faire les icones -->
    <script src="https://kit.fontawesome.com/cd1eb87d27.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    <title>Login</title>
</head>
<body>
    
</body>
<form method="post" action="connect.php">
    <div class="mb-3">
        <label for="username" class="form-label">Identifiant</label>
        <input type="text" class="form-control" name="username" required="required">

        <div id="infoUsername" class="form-text">Identifiant de connexion.</div>
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Mot de passe</label>
        <input type="password" name="pass" class="form-control" required="required">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>`
<a href="inscription.php">inscription</a>

</html>