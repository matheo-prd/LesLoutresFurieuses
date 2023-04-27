<?php
require_once '../Dao/DAO.php';
require_once '../Classe/Utilisateurs.php';

$fonctionuser = new FonctionUser();
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
        	$lesUtilisateurs = $fonctionuser->getLesUtilisateurs();
        	// nmbre d'éléments du tableau
        	$nbuser = count($lesUtilisateurs);

        	for($i = 0; $i < $nbuser; $i++) {
                $utilisateurs = $lesUtilisateurs[$i];
        		echo "<tr>
        				<td>".$lesUtilisateurs[$i]->getNom()."</td>
        				<td>".$lesUtilisateurs[$i]->getPrenom()."</td>
                        <td>".$lesUtilisateurs[$i]->getEmail()."</td>
        			  </tr>";
        	}	       	
        ?>
         </table>
    </body>
</html>