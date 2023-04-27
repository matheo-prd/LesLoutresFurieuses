<?php
class Trajet implements JsonSerializable
{
    // attributs de classe
    private $id;
    private $code_createur;
    private $lieu_depart;
    private $lieu_arrive;
    private $place_dispo;
    private $date;
    private $horaire_depart;
    private $horaire_arrive;
    private $prix;

    // constructeur
    public function __construct($code_createur, $lieu_depart, $lieu_arrive, $place_dispo, $date, $horaire_depart, $horaire_arrive, $prix)
    {
        $this->code_createur = $code_createur;
        $this->lieu_depart = $lieu_depart;
        $this->lieu_arrive = $lieu_arrive;
        $this->place_dispo = $place_dispo;
        $this->date = $date;
        $this->horaire_depart = $horaire_depart;
        $this->horaire_arrive = $horaire_arrive;
        $this->prix = $prix;

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
    public function getCode_createur()
    {
        return $this->code_createur;
    }
     /**
     * @return mixed
     */
    public function getlieu_depart()
    {
        return $this->lieu_depart;
    }
     /**
     * @return mixed
     */
    public function getLieu_arrive()
    {
        return $this->lieu_arrive;
    }
     /**
     * @return mixed
     */
    public function getPlace_dispo()
    {
        return $this->place_dispo;
    }
     /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
     /**
     * @return mixed
     */
    public function getHoraire_depart()
    {
        return $this->horaire_depart;
    }
     /**
     * @return mixed
     */
    public function getHoraire_arrive()
    {
        return $this->horaire_arrive;
    }
     /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
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
     * @param mixed $code_createur
     *
     */
    public function setCode_createur($code_createur)
    {
        $this->code_createur = $code_createur;
    }
            /**
     * @param mixed $lieu_depart
     *
     */
    public function setLieu_depart($lieu_depart)
    {
        $this->lieu_depart = $lieu_depart;
    }
                /**
     * @param mixed $lieu_arrive
     *
     */
    public function setLieu_arrive($lieu_arrive)
    {
        $this->lieu_arrive = $lieu_arrive;
    }
                    /**
     * @param mixed $place_dispo
     *
     */
    public function setPlace_dispo($place_dispo)
    {
        $this->place_dispo = $place_dispo;
    }
                        /**
     * @param mixed $date
     *
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
                            /**
     * @param mixed $horaire_depart
     *
     */
    public function setHoraire_depart($horaire_depart)
    {
        $this->horaire_depart = $horaire_depart;
    }
                            /**
     * @param mixed $horaire_arrive
     *
     */
    public function setHoraire_arrive($horaire_arrive)
    {
        $this->horaire_arrive = $horaire_arrive;
    }
                                /**
     * @param mixed $horaire_arrive
     *
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
 public function jsonSerialize() : mixed
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'id' => $this->id,
            'code_createur' => $this->code_createur,
            'lieu_depart' => $this->lieu_depart,
            'lieu_arrive' => $this->lieu_arrive,
            'place_dispo' => $this->place_dispo,
            'date' => $this->date,
            'horaire_depart' => $this->horaire_depart,
            'horaire_arrive' => $this->horaire_arrive,
            'prix' => $this->prix,

        );
    }
   
}
?>