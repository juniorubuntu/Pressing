<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fonction
 * @ORM\Entity
 * @ORM\Table(name="Fonction")
 */
class Fonction {

    public function __toString() {
        return $this->getNom();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var int
     * @ORM\Column(name="salaire", type="integer", unique=false)
     */
    private $salaire;

    /**
     * @var array
     * @ORM\Column(name="listeDesAcces", type="array")
     */
    private $listeDesAcces;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Fonction
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set salaire
     *
     * @param integer $salaire
     *
     * @return Fonction
     */
    public function setSalaire($salaire) {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return integer
     */
    public function getSalaire() {
        return $this->salaire;
    }

    /**
     * Set listeDesAcces
     *
     * @param array $listeDesAcces
     *
     * @return Fonction
     */
    public function setListeDesAcces($listeDesAcces) {
        $this->listeDesAcces = $listeDesAcces;

        return $this;
    }

    /**
     * Get listeDesAcces
     *
     * @return array
     */
    public function getListeDesAcces() {
        return $this->listeDesAcces;
    }

}
