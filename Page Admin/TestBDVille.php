<?php
require_once '../Dao/DAO.php';
require_once '../Classe/Ville.php';
$fonctionVille = new FonctionVille();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Liste Ville</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>liste des Villes</h1>

        <?php

        	echo "<br>";
        ?>
        <table>
        	<thead>
                
        	</thead>
        <?php
        	// récupération de la listedes Villes
        	$lesVilles = $fonctionVille->getLesVilles();
        	// nmbre d'éléments du tableau
        	$nbVille = count($lesVilles);

        	for($i = 0; $i < $nbVille; $i++) {
                $Ville = $lesVilles[$i];
        		echo "<tr>
        				<td>".$lesVilles[$i]->getId()."</td>
        				<td>".$lesVilles[$i]->getNom()."</td>
        			  </tr>";
        	}	       	
        ?>
         </table>
    </body>
</html>