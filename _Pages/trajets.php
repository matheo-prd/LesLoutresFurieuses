<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LesLoutresFurieuses</title>
        <link rel="stylesheet" type="text/css" href="../Css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require_once '../Classe/Reservation.php';
            require_once '../Classe/Trajet.php';
            require_once '../Classe/Utilisateurs.php';
            require_once '../Classe/Ville.php';
            require_once '../Dao/DAO.php';
        ?>
        <header>
            <table>
                <thead> 
                    <tr>
                        <th>
                            <a href="../../"><img src="../Img/logo/banderole_logo_transparent.png" width="8%" height="8%"></a>
                            <button type="button" class="btn btn-outline-info" onclick=window.location.href="./trajets.php">Voir les trajets disponibles</button>
                            <button type="button" class="btn btn-outline-info" onclick=window.location.href="../../">Ajouter un nouveau trajet</button>
                        </th> 
                        <th><p> 
                            <button type="button" class="btn btn-outline-info" onclick=window.location.href='./Vue/inscription.php'>Inscription</button>
                        </p></th>
                    </tr>
                </thead>
            </table>
        </header>
        <section>
            <img src="../Img/touslestrajets.png">
        </section>
        <br><br>
        <form action="#" method="post" name="login">
            <table>
                <thead> 
                    <tr>
                        <th colspan="2">
                            Ville de départ :
                        </th>
                        <th colspan="2">
                            <select name="ville-depart" id="ville-d">
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
                            <select name="ville-arrivé" id="ville-a">
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
                            <input type="date" id="start" name="trip-start" value="2023-01-01" min="2023-01-01" max="2023-12-31">
                        </th>
                        <th colspan="2">    
                            <input type="submit" onclick="" value="Filtrer" />
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
                require_once '../Classe/Reservation.php';
                require_once '../Classe/Trajet.php';
                require_once '../Classe/Utilisateurs.php';
                require_once '../Classe/Ville.php';
                require_once '../Dao/DAO.php';
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
        <br><br>
        <footer>
            Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.
        </footer>
    </body>
</html>