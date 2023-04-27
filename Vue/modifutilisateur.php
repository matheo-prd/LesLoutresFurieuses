<?php
require_once '../Dao/DAO.php';
require_once '../Classe/Utilisateurs.php';
session_start();
if (isset($_SESSION['email'])) {
    echo "<p>Bonjour {$_SESSION['email']} !</p>"; 
}
if(isset($_SESSION["email"]) && (isset($_POST["valider"]))) {
    $utilisateur = new Utilisateur($_POST["nom"], $_POST["prenom"], $_POST["mdp"], $_POST["age"], $_POST["sexe"], $_POST["mail"], $_POST["numero_telephone"]);
    $utilisateur->setemail($_SESSION["email"]);
    $fonctionuser = new FonctionUser();
    $fonctionuser->modifUtilisateur($utilisateur);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modification utilisateur</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Modification d'un utilisateur</h1>
        <form name="creerPilote" method="POST">
    <div class="form-group">

      Nom :<br> <input type="text" class="form-control" name="nom" required><br>
      Prénom :<br> <input type="text" class="form-control" name="prenom" required><br>
      Age :<br> <input type="text" class="form-control" name="age"><br>
      <p> SEXE </p>
      <p>
        Homme : <input type="radio" name="sexe" value="homme" required><br>
        Femme : <input type="radio" name="sexe" value="femme" required><br>
        Autre : <input type="radio" name="sexe" value="autre" required><br>
      </p>
      Téléphone :<br> <input type="text" class="form-control" name="numero_telephone" required><br>
      Email : <br><input type="text" class="form-control" name="mail" required><br>
      Mot de passe :<br> <input type="password" class="form-control" name="mdp" required><br>

      <input class="btn btn-outline-secondary" type="submit" name="Valider">
      <p>Déjà inscrit ?<a href="connexion.php"> Connectez-vous</a></p>
    </div>
  </form>
            <input type="submit" name="valider">
    </body>
</html>
