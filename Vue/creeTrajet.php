<!DOCTYPE html>
<html lang="fr" class="margepage">

<head>
    <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crée trajet</title>
</head>

<body>
    <a href="../page d'acceuil.php"><img class="rounded mx-auto d-block" src="../_Pages/Img/logo/banderole_logo_transparent.png"></a>
    <div class="titre">Page d'inscription</div>
    <form name="Inscritpion" method="POST">
        <div class="form-group">

            Nom du créateur :<br> <input type="number" class="form-control" name="code_createur" required><br>
            Place disponible :<br> <input type="text" class="form-control" name="place_disponible" required><br>
            <input type="date" id="date" name="date" value="2018-07-22" min="2023-01-01" max="2023-12-31">
            Horaire départ : <br><input type="time" class="form-control" name="horaire_depart" min="00:00" max="23:59" required><br>
            Horaire arrivé :<br> <input type="time" class="form-control" name="horaire_arrive" min="00:00" max="23:59" required><br>
            Prix :<br> <input type="number" class="form-control" name="prix" required><br>
            <select name="Lieu_depart">
                <?php
                require_once '../Dao/lesClasses.php';
                require_once '../Dao/DAO.php';
                $fonctionVille = new DAO();
                // récupération de la liste des Villes
                $lesVilles = $fonctionVille->getLesVilles();
                // nombre d'éléments du tableau
                $nbVille = count($lesVilles);
                for ($i = 0; $i < $nbVille; $i++) {
                    $Ville = $lesVilles[$i];
                    echo
                    " <option value='" . $Ville->getNom() . "'>" . $Ville->getNom() . "</option>";
                } ?>
            </select>
            <p><label for="choisir-ville a">Arrivé</label></p>
            <select name="Lieu_arrive">
                <?php
                $nbVille = count($lesVilles);
                for ($i = 0; $i < $nbVille; $i++) {
                    $Ville = $lesVilles[$i];
                    echo
                    " <option value='" . $Ville->getNom() . "'>" . $Ville->getNom() . "</option>";
                }
                ?>
            </select>
            <br>

            <input class="btn btn-outline-secondary" type="submit" name="Valider">
        </div>
    </form>
    <?php
    if (isset($_POST["Valider"])) {
        $fonctiontrajet->setUnTrajet(new Trajet($_POST["code_createur"], $_POST["Lieu_depart"], $_POST["Lieu_arrive"], $_POST["place_disponible"], $_POST["date"], $_POST["horaire_depart"], $_POST["horaire_arrive"], $_POST["prix"]));
    }
    ?>
    <br>
</body>
<br>
<footer>Copyright © 2023 Les Loutres Furieuses - Tous droits réservés.</footer>

</html>