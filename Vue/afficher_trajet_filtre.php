<!DOCTYPE html>
<html lang="fr">
    <?php
        require_once '../Dao/DAO.php';
        require_once '../Dao/Connexion_compte.php';
        require_once '../Dao/Connexion.php';
        require_once '../Classe/Trajet.php';
        
	    $lesTrajets = array();
	    $sgbd = new DAO();
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les Loutre Furieuses - Recherche</title>
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
            <img src="../_Pages/Img/filtre.png" width="1006%">
        </section>
        <br><br>
        <main>
            <table HEIGHT="100" class="table table-hover"  >
                <thead class="thead-brown">
                    <tr>
                        <th scope="col">Lieu de départ</th>
                        <th scope="col">Lieu d'arrivée</th> 
                        <th scope="col">Date du trajet</th>                     
                        <th scope="col">Horaire de départ</th> 
                        <th scope="col">Horaire d'arrivée</th> 
                    </tr>
                </thead>
                <?php
	                $lesTrajets= $sgbd->getLesTrajets_f($_POST["ville_d"],$_POST["ville_a"], $_POST["date"] );
			        $nbtrajets = count($lesTrajets);
			        for ($i = 0; $i < $nbtrajets; $i++) {
			            $trajet = $lesTrajets[$i];
			            
						echo "
			            <tr>
			                <td>" .  $trajet->getLieu_depart() . "a</td>
			                <td>" .  $trajet->getLieu_arrive() . "a</td>
			                <td>" .  $trajet->getDate() . "a</td>
			                <td>" .  $trajet->getHoraire_depart() . "a</td>
			                <td>" .  $trajet->getHoraire_arrive() . "a</td>
			            </tr>";
			        }
                ?>
            </table>
        </main>
	</body>
</html>