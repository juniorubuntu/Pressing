<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Promotion
 * @ORM\Table(name="Promotion")
 * @ORM\Entity()
 */
class Promotion {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, unique=false)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="debut", type="date", unique=false)
     */
    private $debut;

    /**
     * @var string
     * @ORM\Column(name="fin", type="date", unique=false)
     */
    private $fin;

    /**
     * @var string
     * @ORM\Column(name="reduction", type="integer", unique=false)
     */
    private $reduction;

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
     * @return Promotion
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
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Promotion
     */
    public function setDebut($debut) {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut() {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Promotion
     */
    public function setFin($fin) {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin() {
        return $this->fin;
    }

    /**
     * Set reduction
     *
     * @param integer $reduction
     *
     * @return Promotion
     */
    public function setReduction($reduction) {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return integer
     */
    public function getReduction() {
        return $this->reduction;
    }

}
