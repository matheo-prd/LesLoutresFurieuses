<?php 
class Utilisateur implements JsonSerializable
{
    // attributs de classe
    private $nom;
    private $prenom;
    private $motdepasse;
    private $age;
    private $sexe;
    private $email;
    private $telephone;

    // constructeur
    public function __construct($nom, $prenom, $motdepasse, $age, $sexe, $email, $telephone)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->motdepasse = $motdepasse;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->email = $email;
        $this->telephone = $telephone;

    }

    // méthodes

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->prenom = $nom;
    }

       /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     *
     */
    public function setPrenom($prenom)
    {
        $this->nom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param mixed $motdepasse
     *
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     *
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
    
        /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     *
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     */
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     *
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */

    public function __toString()
    {
        return "L'utilisateur sélectionné : ". $this->prenom." ".$this->nom;

    }

 public function jsonSerialize() : mixed
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'motdepasse' => $this->motdepasse,
            'age' => $this->age,
            'sexe' => $this->sexe,
            'email' => $this->email,
            'telephone' => $this->telephone,
        );
    }   
}
?>