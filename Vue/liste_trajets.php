<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les Loutre Furieuses - Les trajets</title>
        <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require_once '../Classe/Trajet.php';
            require_once '../Dao/DAO.php';
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
        </header>
        <section>
            <img src="../_Pages/Img/touslestrajets.png" width="1006%">
        </section>
        <br><br>
        <form action="afficher_trajet_filtre.php" method="post" name="login">
            <table>
                <thead> 
                    <tr>
                        <th colspan="2">
                            Ville de départ :
                        </th>
                        <th colspan="2">
                            <select name="ville_d" id="ville_d">
                                <?php 
                                    $fonctionVille = new DAO();
                                    // récupération de la liste des Villes
                                    $lesVilles = $fonctionVille->getLesVilles();
                                    // nombre d'éléments du tableau
                                    $nbVille = count($lesVilles);
                                    for($i = 0; $i < $nbVille; $i++) {
                                        $Ville = $lesVilles[$i];
                                        echo "<option value='".$Ville->getNom()."'>".$Ville->getNom()."</option>";
                                    }
                                ?>
                            </select>
                        </th>
                        <th colspan="2">
                            Ville d'arrivée :
                        </th>
                        <th colspan="2">
                            <select name="ville_a" id="ville_a">
                                <?php
                                    $nbVille = count($lesVilles);
                                    for($i = 0; $i < $nbVille; $i++) {
                                        $Ville = $lesVilles[$i];
                                        echo "<option value='".$Ville->getNom()."'>".$Ville->getNom()."</option>";
                                    }
                                ?>
                            </select>
                        </th>
                        <th colspan="2">
                            Date :
                        </th>
                        <th colspan="2">
                            <input type="date" id="date" name="date" value="2018-07-22" min="2015-01-01" max="2023-12-31">
                        </th>
                        <th colspan="2">    
                            <input type="submit" value="Chercher" />
                        </th>
                    </tr>
                </thead>
            </table>
        </form>
        <br>
        <table HEIGHT="100" class="w-100 table table-hover"  >
            <thead>
                <tr>
                    <th scope="col">Lieu de départ</th>
                    <th scope="col">Lieu d'arrivée</th>
                    <th scope="col">Date du trajet</th>
                    <th scope="col">Heure de départ</th>
                    <th scope="col">Heure d'arrivée</th>
                    <th scope="col">Places restantes</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Réservation</th>
                </tr>
            </thead>
            <?php
                $fonctiontrajet = new FonctionTrajet();
                $lesTrajets = $fonctiontrajet->getLesTrajets();
                $nbtrajets = count($lesTrajets);
                for($i = 0; $i < $nbtrajets; $i++) {
                    $trajet = $lesTrajets[$i];
                    echo "
                    <tr>
                        <td>".$lesTrajets[$i]->getLieu_depart()."</td>
                        <td>".$lesTrajets[$i]->getLieu_arrive()."</td>
                        <td>".$lesTrajets[$i]->getDate()."</td>
                        <td>".$lesTrajets[$i]->getHoraire_depart()."</td>
                        <td>".$lesTrajets[$i]->getHoraire_arrive()."</td>
                        <td>".$lesTrajets[$i]->getPlace_dispo()."</td>
                        <td>".$lesTrajets[$i]->getPrix()."</td>
                        <td><button type='button' class='btn btn-outline-info' onclick=window.location.href='./Vue/inscription.php'>Réservé</button></td>
                    </tr>"
                ;}
            ?>
        </table>
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