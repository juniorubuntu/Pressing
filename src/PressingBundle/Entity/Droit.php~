<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Droit
 * 
 * @ORM\Table()
 * @ORM\Entity()
 */
class Droit {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Fonction")
     * @Assert\NotBlank()
     */
    private $fonction;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Tache")
     * @Assert\NotBlank()
     */
    private $tache;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fonction
     *
     * @param \PressingBundle\Entity\Fonction $fonction
     *
     * @return Droit
     */
    public function setFonction(\PressingBundle\Entity\Fonction $fonction = null)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return \PressingBundle\Entity\Fonction
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set tache
     *
     * @param \PressingBundle\Entity\Tache $tache
     *
     * @return Droit
     */
    public function setTache(\PressingBundle\Entity\Tache $tache = null)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return \PressingBundle\Entity\Tache
     */
    public function getTache()
    {
        return $this->tache;
    }
}
