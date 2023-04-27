<?php
session_start();

if(isset($_SESSION['email'])){
    // Détruire toutes les variables de session
    $_SESSION = array();

    // Si vous voulez détruire complètement la session, effacez également
    // le cookie de session.
    // Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalement, détruire la session.
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion
    header("Location: ../Vue/connexion.php");
    exit;
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: ../Vue/connexion.php");
    exit;
}
