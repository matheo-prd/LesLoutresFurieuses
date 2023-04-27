<?php
require_once '../Dao/DAO.php';
require_once '../Classe/Reservations.php';
$fonctionresa = new FonctionResa();
// var_dump permet de vérifier le contenu et la structure d'une variable
// indispensable pour débugger
//var_dump($saison23->getlesTrajets());
//$pil = new trajet("Zarco","Johann","français","20-04-1999");
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Liste trajet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>liste des Trajets</h1>

        <?php

        	echo "<br>";
        ?>
        <table>
        	<thead>
                
        	</thead>
        <?php
        	// récupération de la listedes trajets
        	$lesReservations = $fonctionresa->getLesReservations();
            //var_dump($lesTrajets);
        	// nmbre d'éléments du tableau
        	$nbresa = count($lesReservations);

        	for($i = 0; $i < $nbresa; $i++) {
                $reservations = $lesReservations[$i];
        		echo "<tr>
        				<td>".$lesReservations[$i]->getId()."</td>
        				<td>".$lesReservations[$i]->getId_utilisateur()."</td>
        				<td>".$lesReservations[$i]->getId_trajet()."</td>
        			  </tr>";
        	}	       	
        ?>
         </table>
    </body>
</html>