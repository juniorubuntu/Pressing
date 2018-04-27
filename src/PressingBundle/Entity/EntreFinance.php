<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EntreFinance
 * @ORM\Table(name="EntreFinance")
 * @ORM\Entity()
 */
class EntreFinance {

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
     * @ORM\ManyToOne(targetEntity="User")
     * @Assert\NotBlank()
     */
    private $receptionniste;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Reception")
     * @Assert\NotBlank()
     */
    private $reception;

    /**
     * @var integer
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set receptionniste
     *
     * @param \PressingBundle\Entity\User $receptionniste
     *
     * @return EntreFinance
     */
    public function setReceptionniste(\PressingBundle\Entity\User $receptionniste = null) {
        $this->receptionniste = $receptionniste;

        return $this;
    }

    /**
     * Get receptionniste
     *
     * @return \PressingBundle\Entity\User
     */
    public function getReceptionniste() {
        return $this->receptionniste;
    }

    /**
     * Set reception
     *
     * @param \PressingBundle\Entity\Reception $reception
     *
     * @return EntreFinance
     */
    public function setReception(\PressingBundle\Entity\Reception $reception = null) {
        $this->reception = $reception;

        return $this;
    }

    /**
     * Get reception
     *
     * @return \PressingBundle\Entity\Reception
     */
    public function getReception() {
        return $this->reception;
    }


    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return EntreFinance
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return EntreFinance
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
