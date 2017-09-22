<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 * @ORM\Table(name="article")
 * @ORM\Entity()
 */
class Article {

    public function __toString() {
        return $this->getDesignation();
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
     * @ORM\Column(name="designation", type="string", length=255, unique=true)
     */
    private $designation;

    /**
     * @var integer
     * @ORM\Column(name="prixUnit", type="integer")
     */
    private $prixUnit;

    /**
     * @var integer
     * @ORM\Column(name="nbrePiece", type="integer")
     */
    private $nbrePiece;

    /**
     * @var boolean
     * @ORM\Column(name="definitif", type="boolean")
     */
    private $definitif;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Article
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set prixUnit
     *
     * @param integer $prixUnit
     *
     * @return Article
     */
    public function setPrixUnit($prixUnit)
    {
        $this->prixUnit = $prixUnit;

        return $this;
    }

    /**
     * Get prixUnit
     *
     * @return integer
     */
    public function getPrixUnit()
    {
        return $this->prixUnit;
    }

    /**
     * Set nbrePiece
     *
     * @param integer $nbrePiece
     *
     * @return Article
     */
    public function setNbrePiece($nbrePiece)
    {
        $this->nbrePiece = $nbrePiece;

        return $this;
    }

    /**
     * Get nbrePiece
     *
     * @return integer
     */
    public function getNbrePiece()
    {
        return $this->nbrePiece;
    }

    /**
     * Set definitif
     *
     * @param boolean $definitif
     *
     * @return Article
     */
    public function setDefinitif($definitif)
    {
        $this->definitif = $definitif;

        return $this;
    }

    /**
     * Get definitif
     *
     * @return boolean
     */
    public function getDefinitif()
    {
        return $this->definitif;
    }
}
