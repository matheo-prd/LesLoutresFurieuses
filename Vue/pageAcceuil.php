<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Loutre Furieuses -  Acceuil</title>
    <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<body>
    <header>
        <table>
            <thead>
                <tr>
                    <th>
                        <a href=".."><img src="../_Pages/Img/logo/banderole_logo_transparent.png" width="8%" height="8%"></a>
                        <button type="button" class="btn btn-outline-success" onclick=window.location.href="https://0170022g.index-education.net/pronote/FichiersExternes/75c9177f9827d19a4c53ecde284caf7b92590e819fa40c9957e5effacca0d85bae47e78dffadf65844c2da702102fd3f/AP-Covoiturage.pdf?Session=2726931">Cahier des charges</button>
                        <button type="button" class="btn btn-outline-success" onclick=window.location.href="https://trello.com/b/aQwag315/les-loutres-furieuses-site-de-co-voiturage">Trello</button>

                        <button type="button" class="btn btn-outline-info" onclick=window.location.href="liste_trajets.php">Voir les trajets disponibles</button>
                        <button type="button" class="btn btn-outline-info" onclick=window.location.href="ajouter_trajet.php">Ajouter un nouveau trajet</button>
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
                        <a href ="profil.php">
                            <?php
                                // Vérification de la connexion de l'utilisateur
                                if (isset($_SESSION['email'])) {
                                    //echo $_SESSION["email"];
                                    echo "<img class='pdp' width='5%' height='5%' src='../_Pages/Img/pdp/1.png'>";
                                }
                            ?>
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
    </header>
    <section>
        <img src="../_Pages/Img/banderoleLLF.gif" width="1006%">
    </section>
    <br><br>
    <table HEIGHT="100" class="w-50 table table-hover">
        <thead>
            <tr>
                <th scope="col">Lieu de départ</th>
                <th scope="col">Lieu d'arrivée</th>
                <th scope="col">Date du trajet</th>
                <th scope="col">Heure de départ</th>
                <th scope="col">Heure d'arrivée</th>
            </tr>
        </thead>
        <?php
        require_once '../Dao/DAO.php';
        $fonctiontrajet = new FonctionTrajet();
        $lesTrajets = $fonctiontrajet->getLesTrajets();
        $nbtrajets = count($lesTrajets);
        for ($i = 0; $i < $nbtrajets; $i++) {
            $trajet = $lesTrajets[$i];
            echo "
                    <tr>
                        <td>" . $lesTrajets[$i]->getLieu_depart() . "</td>
                        <td>" . $lesTrajets[$i]->getLieu_arrive() . "</td>
                        <td>" . $lesTrajets[$i]->getDate() . "</td>
                        <td>" . $lesTrajets[$i]->getHoraire_depart() . "</td>
                        <td>" . $lesTrajets[$i]->getHoraire_arrive() . "</td>
                    </tr>";
        }
        ?>
    </table>
    <a href="../Vue/liste_trajets.php">Voir plus</a>
    <br><br>
    <footer id="texte" onmouseover="changeText()" onmouseout="revertText()">Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.</footer>

    <script>
        function changeText() {
            document.getElementById("texte").innerHTML = "Copyright © 2023 Perodeau Mathéo, Hugo Texier, Cottereau Corentin, Buil Victor - Tous droits réservés.";
        }

        function revertText() {
            document.getElementById("texte").innerHTML = "Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.";
        }
    </script>
</body>

</html>