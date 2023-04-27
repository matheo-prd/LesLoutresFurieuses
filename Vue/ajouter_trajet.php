<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les Loutre Furieuses - Ajouter un trajet</title>
        <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require_once '../Dao/DAO.php';
        ?>
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
        </header>
        <section>
            <img src="../_Pages/Img/ajoutertrajet.png" width="1006%">
        </section>
        <br><br>
        <h2>Ajouter un trajet</h2>
        <form action="ajouter_trajet_result.php" name="Inscritpion" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="code" placeholder="Votre id" required><br>
                <input type="text" class="form-control" name="dep" placeholder="Lieu de départ" required><br>
                <input type="text" class="form-control" name="arr" placeholder="Lieu d'arrivé" required><br>
                Places disponibles : 
                <select id="places" name="places">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select><br><br>
                Date : <input type="date" id="start" name="date" value="2023-01-01" min="2023-01-01" max="2023-12-31"><br><br>
                <input type="text" class="form-control" name="h_dep" placeholder="Heure de départ" required><br>
                <input type="text" class="form-control" name="h_arr" placeholder="Heure d'arrivé" required><br>
                <input type="text" class="form-control" name="prix" placeholder="Prix" required><br>
                
                <input class="btn btn-outline-secondary" type="submit" name="Créer le trajet">
            </div>
        </form>
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