<!DOCTYPE html>
<html lang="fr" class="margepage">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les Loutre Furieuses - Inscription</title>
        <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <table>
                <thead> 
                    <tr>
                        <th>
                            <a href="pageAcceuil.php"><img src="../_Pages/Img/logo/banderole_logo_transparent.png" width="8%" height="8%"></a>
                            <button type="button" class="btn btn-outline-success" onclick=window.location.href="https://0170022g.index-education.net/pronote/FichiersExternes/75c9177f9827d19a4c53ecde284caf7b92590e819fa40c9957e5effacca0d85bae47e78dffadf65844c2da702102fd3f/AP-Covoiturage.pdf?Session=2726931">Cahier des charges</button>
                            <button type="button" class="btn btn-outline-success" onclick=window.location.href="https://trello.com/b/aQwag315/les-loutres-furieuses-site-de-co-voiturage">Trello</button>

                            <button type="button" class="btn btn-outline-info" onclick=window.location.href="./liste_trajets.php">Voir les trajets disponibles</button>
                            <button type="button" class="btn btn-outline-info" onclick=window.location.href="./ajouter_trajet.php">Ajouter un nouveau trajet</button>
                            <button type="button" class="btn btn-outline-info" onclick=window.location.href='placeholder.php'>Mes trajets</button>
                        </th>
                        <th>
                        <?php
                            session_start()
                        ?>
                        <?php
                            // Vérification de la connexion de l'utilisateur
                            if (isset($_SESSION['email'])) {
                                // Si l'utilisateur est connecté, on n'affiche le bouton déconnexion
                                echo '<button type="button" class="btn btn-outline-info" onclick=window.location.href="../DAO/Deconnexion.php">Déconnexion</button>';
                            } else {
                                // Si l'utilisateur n'est pas connecté, on affiche le bouton avec un lien
                                echo '<button type="button" class="btn btn-outline-info" onclick=window.location.href="../Vue/connexion.php">Connexion</button>';
                            }
                        ?>
                        </th>
                    </tr>
                </thead>
            </table>
          <img src="../_Pages/Img/inscription.png" width="1006%">
        </header>
        <main>
          <a href="pageAcceuil.php"><img class="rounded mx-auto d-block" src="../_Pages/Img/logo/banderole_logo_transparent.png"></a>
          <div class="titre">Page d'inscription</div>
          <form name="Inscritpion" method="POST">
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
  <?php
  require_once '../Dao/DAO.php';
  $fonctionuser = new FonctionUser;
  //$email = new Email();
  //$email->setverifmail($_POST["mail"]);
  if (isset($_POST["Valider"])) {
    //$email->setverifmail();
    $fonctionuser->setUnUtilisateurs(new Utilisateur($_POST["nom"], $_POST["prenom"], $_POST["mdp"], $_POST["age"], $_POST["sexe"], $_POST["mail"], $_POST["numero_telephone"]));
  }

  ?>
  <br>
</main>
</body>
<br>
  <footer>
    <p id="texte" onmouseover="changeText()" onmouseout="revertText()">Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.</p>
    <script>
      function changeText() {
        document.getElementById("texte").innerHTML = "Copyright © 2023 Perodeau Mathéo, Hugo Texier, Cottereau Corentin, Buil Victor - Tous droits réservés.";
      }

      function revertText() {
        document.getElementById("texte").innerHTML = "Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.";
      }
    </script>
  </footer>
</html>