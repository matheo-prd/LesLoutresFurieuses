<!DOCTYPE html>
<html lang="fr">
<?php session_start() ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Loutre Furieuses - Profil</title>
    <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once '../Dao/DAO.php';
    require_once '../Dao/Connexion.php';
    ?>
    <header>
        <table>
            <thead>
                <tr>
                    <th>
                        <a href="pageAcceuil.php"><img src="../_Pages/Img/logo/banderole_logo_transparent.png" width="8%" height="8%"></a>
                        <button type="button" class="btn btn-outline-success" onclick=window.location.href="../">Cahier des charges</button>
                        <button type="button" class="btn btn-outline-success" onclick=window.location.href="https://trello.com/b/aQwag315/les-loutres-furieuses-site-de-co-voiturage">Trello</button>

                        <button type="button" class="btn btn-outline-info" onclick=window.location.href="./liste_trajets.php">Voir les trajets disponibles</button>
                        <button type="button" class="btn btn-outline-info" onclick=window.location.href="./ajouter_trajet.php">Ajouter un nouveau trajet</button>
                        <button type="button" class="btn btn-outline-info" onclick=window.location.href='./Vue/placeholder'>Mes trajets</button>
                    </th>
                    <th>
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
    </header>
    <section>
        <img src="../_Pages/Img/profil.png" width="1006%">
    </section>
    <?php

    $lesUtilisateursCo = array();
    $sgbd = new DAO();

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $lesUtilisateursCo = $sgbd->getUtilisateurCo($_SESSION["email"]);

        if (!empty($lesUtilisateursCo)) {
            $nbUserCo = count($lesUtilisateursCo); 
            echo "<table>";
            for ($i = 0; $i < $nbUserCo; $i++) {
                echo "<tr>
                          <td>Nom:</td>
                          <td>" . $lesUtilisateursCo[$i]->getNom() . "</td>
                      </tr>
                      <tr>
                          <td>Prénom:</td>
                          <td>" . $lesUtilisateursCo[$i]->getPrenom() . "</td>
                      </tr>
                      <tr>
                          <td>Âge:</td>
                          <td>" . $lesUtilisateursCo[$i]->getAge() . "</td>
                      </tr>
                      <tr>
                          <td>Sexe:</td>
                          <td>" . $lesUtilisateursCo[$i]->getSexe() . "</td>
                      </tr>
                      <br>
                      <tr>
                          <td>Email:</td>
                          <td>" . $lesUtilisateursCo[$i]->getEmail() . "</td>
                      </tr>
                      <br>
                      <tr>
                          <td>Téléphone:</td>
                          <td>" . $lesUtilisateursCo[$i]->getTelephone() . "</td>
                      </tr>";
            }
            
            echo "</table>";
        } else {
            echo "Aucun utilisateur trouvé.";
        }
    } else {
        echo 'Vous devez vous connecter pour accéder à cette page.';
    }
    ?>
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
</body>
</html>
