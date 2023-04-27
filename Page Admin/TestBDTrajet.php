<?php
require_once '../Dao/DAO.php';
require_once '../Classe/Trajet.php';
$fonctiontrajet = new FonctionTrajet();
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
        	$lesTrajets = $fonctiontrajet->getLesTrajets();
            //var_dump($lesTrajets);
        	// nmbre d'éléments du tableau
        	$nbtrajets = count($lesTrajets);

        	for($i = 0; $i < $nbtrajets; $i++) {
                $trajet = $lesTrajets[$i];
        		echo "<tr>
        				<td>".$lesTrajets[$i]->getLieu_depart()."</td>
        				<td>".$lesTrajets[$i]->getLieu_arrive()."</td>
        				<td>".$lesTrajets[$i]->getPlace_dispo()."</td>
                        <td>".$lesTrajets[$i]->getDate()."</td>
                        <td>".$lesTrajets[$i]->getHoraire_depart()."</td>
                        <td>".$lesTrajets[$i]->getHoraire_arrive()."</td>
                        <td>".$lesTrajets[$i]->getPrix()."</td>
        				<td>
        				    <a href='supprimertrajet.php?id=".$lesTrajets[$i]->getId()."'>
        				        <img src='../ressources/poubelle.png' height='24px'- width='24px' >
        				    </a>
        				</td>
						<td>
        				    <a href='modiftrajet.php?id=".$lesTrajets[$i]->getId()."'>
        				        <img src='../ressources/edit.png' height='24px'- width='24px' >
        				    </a>
        				</td>
        			  </tr>";
        	}	       	
        ?>
         </table>
    </body>
</html>