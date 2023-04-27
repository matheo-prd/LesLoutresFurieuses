<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les Loutre Furieuses - Connexion</title>
        <link rel="stylesheet" type="text/css" href="../_Pages/Css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
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
                                echo '<button type="button" class="btn btn-outline-info" onclick=window.location.href="../Vue/inscription.php">Inscription</button>';
                            }
                        ?>
                        </th>
                    </tr>
                </thead>
            </table>
        </header>
        <section>
            <img src="../_Pages/Img/connexion.png" width="1006%">
        </section>
        <main>
            <BR><BR>
            <h1 class="brown">Connexion</h1>
            <form action="" method="POST">
                <label for="email">Mail :</label>
                <input type="text" id="email" name="email" required><br>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" name="login" value="Connexion">
                </form>
            <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a></p>
            <?php
                if (isset($_SESSION['email'])) {
                    // Rediriger l'utilisateur vers la page d'accueil s'il est déjà connecté
                    header("Location: pageAcceuil.php");
                    exit;
                }

                require_once '../Dao/Connexion_compte.php';

                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Vérifier si le nom d'utilisateur et le mot de passe sont valides
                    //$query = "SELECT * FROM Utilisateurs WHERE email='$email' AND password='".hash('sha256', $password)."'";
                    $result = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE email='$email' AND motdepasse='$password'");
                    if(mysqli_num_rows($result) == 1){
                        // Enregistrer le nom d'utilisateur dans la session et rediriger l'utilisateur vers la page d'accueil
                        $_SESSION['email'] = $email;
                        session_start();
                        header("Location: pageAcceuil.php");
                        print("Bravo");
                        exit;
                    } else {
                        // Afficher un message d'erreur si les informations de connexion sont incorrectes
                        // Donne plus de précision sur si c'est le mot de passe ou l'email qui est incorrect.
                        $result = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE email='$email'");
                        if(mysqli_num_rows($result) == 1){
                            $error = "Mot de passe incorrect.";
                        } else {
                            $error = 'Pas de compte inscrit avec cette email. <a href="./inscription">Inscription ici</a>';
                        }
                    }
                }
                if (isset($error)) echo "<p>$error</p>";
            ?>
        </main>
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