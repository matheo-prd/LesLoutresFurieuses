<?php
require_once 'Connexion.php';
require_once '../Classe/Reservations.php';
require_once '../Classe/Trajet.php';
require_once '../Classe/Utilisateurs.php';
require_once '../Classe/Ville.php';
class Dao
{
    private PDO $sgbd;

    public function __construct()
    {
        $connexion = new Connexion();
        $this->sgbd = $connexion->getConnexion();
    }
    function getLesTrajets_f($ville_d, $ville_a, $dateT): array
    {

        $requete = "select * from trajet WHERE lieu_depart = '" . $ville_d  .
            "' AND lieu_arrive = '" . $ville_a . "' AND date = '" . $dateT  . "'";
        //print_r($requete);
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        // on récupère le resultat du select dans un tableau nommé $lignes
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        //print_r($lignes);
        $lesTrajets_f=array();
        // boucle qui traite les lignes du select
        foreach ($lignes as $ligne) {
            // on instancie un nouveau trajet avec chaque ligne de la table
            $trajet  = new Trajet(
                $ligne["code_createur"],
                $ligne["lieu_depart"],
                $ligne["lieu_arrive"],
                $ligne["place_dispo"],
                $ligne["date"],
                $ligne["horaire_depart"],
                $ligne["horaire_arrive"],
                $ligne["prix"]
            );
            array_push($lesTrajets_f, $trajet);
        }
        //var_dump($lesTrajets);
        return $lesTrajets_f;
    }

    public function getLesTrajets(): array
    {
        $lesTrajets = array();
        $requete = "select * from trajet;";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        // on récupère le resultat du select dans un tableau nommé $lignes
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($lignes);
        // boucle qui traite les lignes du select
        foreach ($lignes as $ligne) {
            // on instancie un nouveau trajet avec chaque ligne de la table
            $trajet  = new Trajet(
                $ligne["code_createur"],
                $ligne["lieu_depart"],
                $ligne["lieu_arrive"],
                $ligne["place_dispo"],
                $ligne["date"],
                $ligne["horaire_depart"],
                $ligne["horaire_arrive"],
                $ligne["prix"]
            );
            array_push($lesTrajets, $trajet);
        }
        //var_dump($lesTrajets);
        return $lesTrajets;
    }
    public function insertTrajet($unTrajet)
    {
        $requete = "INSERT INTO `trajet` (`code_createur`, `lieu_depart`, `lieu_arrive`, `place_dispo`, `date`, `horaire_depart`, `horaire_arrive`, `prix`) ";
        $requete .= "VALUES (
            '" . $unTrajet->getCode_createur() .
            "','" . $unTrajet->getLieu_depart() .
            "','" . $unTrajet->getLieu_arrive() .
            "','" . $unTrajet->getPlace_dispo() .
            "','" . $unTrajet->getDate() .
            "','" . $unTrajet->getHoraire_depart() .
            "','" . $unTrajet->getHoraire_arrive() .
            "','" . $unTrajet->getPrix() .
            "');";

        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "Félicitation ! Votre trajet à bien été ajouter ! ";
        echo "<a href='liste_trajets.php'>Rejoindre la liste des trajets</a>";
    }
    public function deleteTrajet($id)
    {
        $requete = "delete from trajet where id='" . $id . "';";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "le trajet $id a bien été supprimé de la base de données";
    }
    public function modifUnTrajet(Trajet $unTrajet)
    {
        $requete = "UPDATE trajet SET nom = '" . $unTrajet->getCode_createur() .
            "','" . $unTrajet->getLieu_depart() . "','" . $unTrajet->getLieu_arrive() . "','" . $unTrajet->getPlace_dispo() .
            "','" . $unTrajet->getDate() .
            "','" . $unTrajet->getHoraire_depart() .
            "' WHERE id = '" . $unTrajet->getId() . "';";
        // préparer la requête
        var_dump($requete);
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "le trajet '" . $unTrajet->getId() . "' a bien été modifié ";
    }
    // *************************************************************************************************************************************************
    public function getLesReservations(): array
    {
        $lesReservations = array();
        $requete = "select * from reservation;";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        // on récupère le resultat du select dans un tableau nommé $lignes
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($lignes);
        // boucle qui traite les lignes du select
        foreach ($lignes as $ligne) {
            // on instancie un nouveau trajet avec chaque ligne de la table
            $reservations  = new Reservations(
                $ligne["id"],
                $ligne["id_utilisateur"],
                $ligne["id_trajet"],
            );
            $reservations->setId($ligne["id"]);
            array_push($lesReservations, $reservations);
        }
        //var_dump($lesTrajets);
        return $lesReservations;
    }
    public function insertReservations($uneReservations)
    {
        $requete = "insert into reservation (id, id_utilisateur, id_trajet) ";
        $requete .= "values (
                    '" . $uneReservations->getId() .
            "','" . $uneReservations->getId_utilisateur() .
            "','" . $uneReservations->getId_trajet() . "');";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "la réservations $uneReservations a bien été ajouté dans la base de données";
    }
    public function deleteReservations($id)
    {
        $requete = "delete from reservation where id='" . $id . "';";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "la reservations $id a bien été supprimé de la base de données";
    }
    public function modifUneReservations(Reservations $uneReservations)
    {
        $requete = "UPDATE reservation SET nom = '" . $uneReservations->getId_utilisateur() .
            "','" . $uneReservations->getId_utilisateur() . "',WHERE id = '" . $uneReservations->getId() . "';";
        // préparer la requête
        var_dump($requete);
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "la reservations '" . $uneReservations->getId() . "' a bien été modifié ";
    }
    // *************************************************************************************************************************************************
    public function getLesUtilisateurs(): array
    {
        $lesUtilisateurs = array();
        $requete = "select * from utilisateurs;";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        // on récupère le resultat du select dans un tableau nommé $lignes
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($lignes);
        // boucle qui traite les lignes du select
        foreach ($lignes as $ligne) {
            // on instancie un nouveau trajet avec chaque ligne de la table
            $utilisateur  = new Utilisateur(
                $ligne["nom"],
                $ligne["prenom"],
                $ligne["motdepasse"],
                $ligne["age"],
                $ligne["sexe"],
                $ligne["email"],
                $ligne["telephone"]
            );
            array_push($lesUtilisateurs, $utilisateur);
        }
        return $lesUtilisateurs;
    }
    public function getUtilisateurCo($email): array
    {
        $lesUtilisateursCo = array();
        $requete = "select * from utilisateurs WHERE email  = '" . $email  . "'";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        // on récupère le resultat du select dans un tableau nommé $lignes
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);

        // boucle qui traite les lignes du select
        foreach ($lignes as $ligne) {
            // on instancie un nouvelle utilisateurs avec chaque ligne de la table
            $utilisateur  = new Utilisateur(
                $ligne["id"],
                $ligne["nom"],
                $ligne["prenom"],
                //$ligne["motdepasse"],
                $ligne["age"],
                $ligne["sexe"],
                $ligne["email"],
                $ligne["telephone"]
            );
            array_push($lesUtilisateursCo, $utilisateur);
        }
        return $lesUtilisateursCo;
    }
    public function verifmail($email)
    {
        $requete = "SELECT * FROM users WHERE email=?";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute([$email]);
        $user = $result->fetch();
        if ($user) {
            return "L'e-mail est déjà utilisé";
        } else {
            return "Inscription réussie !<br><em>La loutre, qui sait si bien faire la guerre aux poissons, ne se creuse point de domicile ; mais elle profite habilement des conducteurs qu'elle rencontre</em>";
        }
    }

    public function insertUtilisateurs($unUtilisateur)
    {
        $requete = "insert into utilisateurs (nom, prenom, motdepasse, age, sexe, email, telephone) ";
        $requete .= "values ('"
            . $unUtilisateur->getNom() . "','"
            . $unUtilisateur->getPrenom() . "','"
            . $unUtilisateur->getMotdepasse() . "','"
            . $unUtilisateur->getAge() . "','"
            . $unUtilisateur->getSexe() . "','"
            . $unUtilisateur->getEmail() . "','"
            . $unUtilisateur->getTelephone() . "'
                );";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        echo "Inscription réussie !<" . 'br' . ">
        \"<" . 'em' . ">La loutre, qui sait si bien faire la guerre aux poissons, ne se creuse point de domicile ; mais elle profite habilement des conducteurs qu'elle rencontre<" . '/em' . ">\"";
    }
    // *************************************************************************************************************************************************
    public function getLesVilles(): array
    {
        $lesVilles = array();
        $requete = "select * from villes;";
        // préparer la requête
        $result = $this->sgbd->prepare($requete);
        // exécuter la requête
        $result->execute();
        // on récupère le resultat du select dans un tableau nommé $lignes
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($lignes);
        // boucle qui traite les lignes du select
        foreach ($lignes as $ligne) {
            // on instancie un nouveau trajet avec chaque ligne de la table
            $ville  = new Ville(
                $ligne["id"],
                $ligne["nom"],
            );
            $ville->setId($ligne["id"]);
            array_push($lesVilles, $ville);
        }
        return $lesVilles;
    }
};
class FonctionTrajet
{
    // attribut
    // attribut pour accèder à la base de données
    private Dao $dao;
    // on crée un tableau de trajets
    private array $lesTrajets = array();
    // constructeur
    public function __construct()
    {
        $this->dao = new Dao();
        $this->init();
    }
    public function init()
    {
        $this->lesTrajets = $this->dao->getLesTrajets();
    }

    public function array2ObjectV2(array $array, $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(serialize($array), ':')
        ));
    }
    // getter
    // accès direct à un trajet à partir de son indice
    public function getTrajet($i): Trajet
    {
        return $this->lesTrajets[$i];
    }

    public function getLesTrajets(): array
    {
        return $this->lesTrajets;
    }

    // ajout d'un nouveau trajet
    public function setUnTrajet($unTrajet)
    {
        // insère un nouveau trajet en fin de tableau
        array_push($this->lesTrajets, $unTrajet);
        // ajouter un trajet dans la table trajet avec la émthode insert du Dao
        $this->dao->insertTrajet($unTrajet);
    }

    public function supprimeUnTrajet($id)
    {
        $this->dao->deleteTrajet($id);
    }
    public function modifierUnTrajet(Trajet $unTrajet)
    {
        $this->dao->modifUnTrajet($unTrajet);
    }
}

class FonctionVille
{
    // attribut
    // attribut pour accèder à la base de données
    private Dao $dao;
    // on crée un tableau de Villes
    private array $lesVilles = array();
    // constructeur
    public function __construct()
    {
        $this->dao = new Dao();
        $this->init();
    }
    public function init()
    {
        $this->lesVilles = $this->dao->getLesVilles();
    }

    public function array2ObjectV2(array $array, $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(serialize($array), ':')
        ));
    }

    // getter
    // accès direct à une Ville à partir de son indice
    public function getVille($i): Ville
    {
        return $this->lesVilles[$i];
    }

    public function getLesVilles(): array
    {
        return $this->lesVilles;
    }
}
class FonctionResa
{
    // attribut
    // attribut pour accèder à la base de données
    private Dao $dao;
    // on crée un tableau de trajets
    private array $lesReservations = array();
    // constructeur
    public function __construct()
    {
        $this->dao = new Dao();
        $this->init();
    }
    public function init()
    {
        $this->lesReservations = $this->dao->getLesReservations();
    }

    public function array2ObjectV2(array $array, $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(serialize($array), ':')
        ));
    }

    // getter
    // accès direct à un trajet à partir de son indice
    public function getReservations($i): Reservations
    {
        return $this->lesReservations[$i];
    }

    public function getLesReservations(): array
    {
        return $this->lesReservations;
    }

    // ajout d'un nouveau trajet
    public function setUneReservations($uneReservations)
    {
        // insère un nouveau trajet en fin de tableau
        array_push($this->lesReservations, $uneReservations);
        // ajouter un trajet dans la table trajet avec la émthode insert du Dao
        $this->dao->insertReservations($uneReservations);
    }

    public function supprimeUneReservations($id)
    {
        $this->dao->deleteReservations($id);
    }
    public function modifierUneReservations(Reservations $uneReservations)
    {
        $this->dao->modifUneReservations($uneReservations);
    }
}
class FonctionUser
{
    // attribut
    // attribut pour accèder à la base de données
    private Dao $dao;
    // on crée un tableau de pilotes
    private array $unUtilisateurCo = array();
    private array $lesUtilisateurs = array();

    // constructeur
    public function __construct()
    {
        $this->dao = new Dao();
        $this->init();
    }
    public function init()
    {
        $this->lesUtilisateurs = $this->dao->getLesUtilisateurs();
    }
    public function array2ObjectV2(array $array, $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(serialize($array), ':')
        ));
    }

    public function getUtilisateurs($i): Utilisateur
    {
        return $this->lesUtilisateurs[$i];
    }

    public function getLesUtilisateurs(): array
    {
        return $this->lesUtilisateurs;
    }

    public function setUnUtilisateurs($unUtilisateur)
    {
        array_push($this->lesUtilisateurs, $unUtilisateur);
        $this->dao->insertUtilisateurs($unUtilisateur);
    }
    public function setverifmail($email)
    {
        $this->dao->verifmail($email);
        // Si l'e-mail est déjà utilisé, verifmail() affiche un message d'erreur avec echo
        // Si l'e-mail n'est pas déjà utilisé, verifmail() affiche un message de succès avec echo
        // Dans les deux cas, la méthode setverifmail() ne retourne rien de significatif
        return true;
    }
}
