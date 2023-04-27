<!DOCTYPE html>
<html lang="fr">
<?php
session_start();

//Vérifiez si l'utilisateur est authentifié en vérifiant la variable de session
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LesLoutresFurieuses</title>
    <link rel="stylesheet" type="text/css" href="./_Pages/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <table class="tableindex">
            <thead>
                <tr>
                    <th colspan="2"><a href="./Index.html"><img src="./_Pages/Img/logo/banderole_logo_transparent.png" width="40%" height="40%"></a></th>
                    <th colspan="2">
                        <p>Voir les trajets disponible</p>
                    </th>
                    <th colspan="2">
                        <p>Ajouter un nouveau trajet</p>
                    </th>
                    <th colspan="2"><img src="./_Pages/Img/logo/blank.png" width="50%" height="50%"></th>
                    <th class="tableuser" colspan="2">
                        <p>
                            <?php
                            // Vérification de la connexion de l'utilisateur
                            if (isset($_SESSION['loggedin'])) {
                                // Si l'utilisateur est connecté, on n'affiche le bouton déconnexion
                                echo '<button type="button" class="btn btn-outline-info" onclick=window.location.href="./Vue/inscription.php">Déconnexion</button>';
                            } else {
                                // Si l'utilisateur n'est pas connecté, on affiche le bouton avec un lien
                                echo '<button type="button" class="btn btn-outline-info" onclick=window.location.href="./Vue/inscription.php">Inscription</button>';
                            }
                            ?>

                        </p>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="tableconneciton">
            <thead>
                <tr>
                </tr>
            </thead>
        </table>
    </header>
    <section>
        <img src="./_Pages/Img/banderole.gif" width="100%" height="100%">
    </section>
    <br>

    <table HEIGHT="100" class="w-50 table table-hover">
        <thead class="thead-white">
            <tr>
                <th scope="col">Lieu de départ</th>
                <th scope="col">Lieu d'arrivée</th>
                <th scope="col">Date du trajet</th>
                <th scope="col">Horaire de départ</th>
                <th scope="col">Horaire d'arrivée</th>
            </tr>
        </thead>
        <?php
        require_once './Dao/Dao.php';
        require_once './Dao/lesClasses.php';
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
    <br>
    <footer>Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.</footer>
</body>

</html>
<?php
exit;
}
?>