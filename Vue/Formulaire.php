<?php
require_once '../Classe/Ville.php';
require_once '../Dao/DAO.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <h2>Chercher un trajet<h2>
       <form action="afficher_trajet_filtre.php" method="post" name="login">
       <p><label for="choisir-ville d">Départ</label></p>
       <select name="ville_d" id="ville_d">
       <?php 
       $fonctionVille = new DAO();
        // récupération de la liste des Villes
       $lesVilles = $fonctionVille->getLesVilles();
        // nombre d'éléments du tableau
       $nbVille = count($lesVilles);
       for($i = 0; $i < $nbVille; $i++) {
        $Ville = $lesVilles[$i];
        echo 
        " <option value='".$Ville->getNom()."'>".$Ville->getNom()."</option>" ;
      }?>
      </select>
  
      <p><label for="choisir-ville a">Arrivé</label></p>
       <select name="ville_a" id="ville_a">
       <?php
         $nbVille = count($lesVilles);
         for($i = 0; $i < $nbVille; $i++) {
          $Ville = $lesVilles[$i];
          echo 
          " <option value='".$Ville->getNom()."'>".$Ville->getNom()."</option>";
        }
       ?>
      </select>

      <p><label for="start">Start date:</label></p>

      <input type="date" id="date" name="date"
       value="2018-07-22"
       min="2015-01-01" max="2023-12-31">

       <p><input type="submit" value="Submit" /></p>
 </form>
</body>
</html>