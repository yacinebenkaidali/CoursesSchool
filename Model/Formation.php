<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 09-Dec-18
 * Time: 18:41
 */
class Formation {
    private $id_formation;
    private $nom;
    private $categorie ;
    private $domaine;
    private $wilaya ;
    private $commune ;
    private $adresse ;
    private $téléphones ;

    /**
     * Formation constructor.
     * @param $id_formation
     * @param $nom
     * @param $categorie
     * @param $wilaya
     * @param $commune
     * @param $adresse
     * @param $téléphones
     */
    public function __construct($id_formation, $nom, $categorie,$domaine, $wilaya, $commune, $adresse, $téléphones)
    {
        $this->id_formation = $id_formation;
        $this->nom = $nom;
        $this->categorie = $categorie;
        $this->domaine=$domaine;
        $this->wilaya = $wilaya;
        $this->commune = $commune;
        $this->adresse = $adresse;
        $this->téléphones = $téléphones;
    }

    /**
     * @return mixed
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * @param mixed $domaine
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
    }

    /**
     * @return mixed
     */
    public function getIdFormation()
    {
        return $this->id_formation;
    }

    /**
     * @param mixed $id_formation
     */
    public function setIdFormation($id_formation)
    {
        $this->id_formation = $id_formation;
    }

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
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getWilaya()
    {
        return $this->wilaya;
    }

    /**
     * @param mixed $wilaya
     */
    public function setWilaya($wilaya)
    {
        $this->wilaya = $wilaya;
    }

    /**
     * @return mixed
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * @param mixed $commune
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getTéléphones()
    {
        return $this->téléphones;
    }

    /**
     * @param mixed $téléphones
     */
    public function setTéléphones($téléphones)
    {
        $this->téléphones = $téléphones;
    }



}