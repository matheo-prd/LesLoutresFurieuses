<?php
class Reservations implements JsonSerializable
{
     // attributs de classe
    private $id;
    private $id_utilisateur;
    private $id_trajet;

    public function __construct($id,$id_utilisateur, $id_trajet)
    {
        $this->id=$id;
        $this->id_utilisateur =$id_utilisateur;
        $this->id_trajet = $id_trajet;
    }
    // GETTERS
         /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
         /**
     * @return mixed
     */
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }
        /**
     * @return mixed
     */
    public function getId_trajet()
    {
        return $this->id_trajet;
    }
    // SETTERS
        /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
        /**
     * @param mixed $id_utilisateur
     */
    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }
            /**
     * @param mixed $id_trajet
     */
    public function setId_trajet($id_trajet)
    {
        $this->id_trajet = $id_trajet;
    }
    public function jsonSerialize() : mixed
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'id_utilisateur' => $this->id_utilisateur,
            'id_trajet' => $this->id_trajet,

        );
    }
}
