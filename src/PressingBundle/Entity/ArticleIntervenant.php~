<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ArticleIntervenant
 * @ORM\Table(name="ArticleIntervenant")
 * @ORM\Entity()
 */
class ArticleIntervenant {

    function __construct() {
        $this->setQuantiteRetire(0);
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
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Reception")
     * @Assert\NotBlank()
     */
    private $idReception;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Article")
     * @Assert\NotBlank()
     */
    private $article;

    /**
     * @ORM\Column(name="couleur", type="string", nullable=true)
     */
    private $couleur;

    /**
     * @var integer
     * @ORM\Column(name="quantiteDepose", type="integer")
     */
    private $quantiteDepose;

    /**
     * @var integer
     * @ORM\Column(name="quantiteRetire", type="integer")
     */
    private $quantiteRetire;

    /**
     * @var boolean
     * @ORM\Column(name="enCours", type="boolean", nullable=true)
     */
    private $enCours;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set quantiteDepose
     *
     * @param integer $quantiteDepose
     *
     * @return ArticleIntervenant
     */
    public function setQuantiteDepose($quantiteDepose) {
        $this->quantiteDepose = $quantiteDepose;

        return $this;
    }

    /**
     * Get quantiteDepose
     *
     * @return integer
     */
    public function getQuantiteDepose() {
        return $this->quantiteDepose;
    }

    /**
     * Set quantiteRetire
     *
     * @param integer $quantiteRetire
     *
     * @return ArticleIntervenant
     */
    public function setQuantiteRetire($quantiteRetire = 0) {
        $this->quantiteRetire = $quantiteRetire;

        return $this;
    }

    /**
     * Get quantiteRetire
     *
     * @return integer
     */
    public function getQuantiteRetire() {
        return $this->quantiteRetire;
    }

    /**
     * Set enCours
     *
     * @param boolean $enCours
     *
     * @return ArticleIntervenant
     */
    public function setEnCours($enCours) {
        $this->enCours = $enCours;

        return $this;
    }

    /**
     * Get enCours
     *
     * @return boolean
     */
    public function getEnCours() {
        return $this->enCours;
    }

    /**
     * Set idReception
     *
     * @param \PressingBundle\Entity\Reception $idReception
     *
     * @return ArticleIntervenant
     */
    public function setIdReception(\PressingBundle\Entity\Reception $idReception = null) {
        $this->idReception = $idReception;

        return $this;
    }

    /**
     * Get idReception
     *
     * @return \PressingBundle\Entity\Reception
     */
    public function getIdReception() {
        return $this->idReception;
    }

    /**
     * Set article
     *
     * @param \PressingBundle\Entity\Article $article
     *
     * @return ArticleIntervenant
     */
    public function setArticle(\PressingBundle\Entity\Article $article = null) {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \PressingBundle\Entity\Article
     */
    public function getArticle() {
        return $this->article;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return ArticleIntervenant
     */
    public function setCouleur($couleur) {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur() {
        return $this->couleur;
    }

}
