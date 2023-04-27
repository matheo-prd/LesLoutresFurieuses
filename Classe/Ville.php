<?php

class Ville implements JsonSerializable
{
    // attributs de classe
    private $id;
    private $nom;

    // constructeur
    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;

    }
    // GETTERS ======================================================================================================================================
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
    public function getNom()
    {
        return $this->nom;
    }

    // SETTERS ======================================================================================================================================

        /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
        /**
     * @param mixed $nom
     *
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

 public function jsonSerialize() : mixed
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'id' => $this->id,
            'nom' => $this->nom,
        );
    }
   
}