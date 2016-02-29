<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Entity
 * @ORM\Table(name="contrats")
 * @ORM\Entity(repositoryClass="Apollo\Repository\ContratRepository")
 */
class Contrat
{
  /**
   * @var integer
   *
   * @ORM\Column(name="C_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   *
   * @var integer
   *
   * @ORM\Column(name="C_TYPECONTRAT", type="integer", nullable=true)
   */
  private $type;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="C_LABEL", type="text", nullable=true)
   */
  private $label;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="C_CREATION", type="datetime", nullable=true)
   */
  private $dateCreation;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="C_DDEBUT", type="datetime", nullable=true)
   */
  private $dateDebut;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="C_DFIN", type="datetime", nullable=true)
   */
  private $dateFin;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="C_NUMFOURN", type="string", length=255, nullable=true)
   */
  private $numFourn;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="C_COND_REGL", type="string", length=255, nullable=true)
   */
  private $conditionReglement;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="C_DDEMARRAGE", type="datetime", nullable=true)
   */
  private $dateDemarrage;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="C_DECHEANCE", type="datetime", nullable=true)
   */
  private $dateEcheance;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="C_MONTANTHT",type="decimal", precision=10, scale=2 , nullable=true)
   */
  private $montantRecu;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="C_MECART",type="decimal", precision=10, scale=2 , nullable=true)
   */
  private $ecart;

  /**
   *
   * @var boolean
   *
   * @ORM\Column(name="C_HAS_CONTRAT",type="boolean", nullable=true)
   */
  private $hasContrat;

  /**
   *
   * @var boolean
   *
   * @ORM\Column(name="C_HAS_JUSTIF",type="boolean", nullable=true)
   */
  private $hasJustif;

  /**
   *
   * @var boolean
   *
   * @ORM\Column(name="C_IS_COMPLET",type="boolean", nullable=true)
   */
  private $isComplet;

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
   * Set type
   *
   * @param integer $type
   * @return Contrat
   */
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return integer 
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set label
   *
   * @param string $label
   * @return Contrat
   */
  public function setLabel($label)
  {
    $this->label = $label;

    return $this;
  }

  /**
   * Get label
   *
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * Set dateCreation
   *
   * @param \DateTime $dateCreation
   * @return Contrat
   */
  public function setDateCreation($dateCreation)
  {
    $this->dateCreation = $dateCreation;

    return $this;
  }

  /**
   * Get dateCreation
   *
   * @return \DateTime 
   */
  public function getDateCreation()
  {
    return $this->dateCreation;
  }

  /**
   * Set dateDebut
   *
   * @param \DateTime $dateDebut
   * @return Contrat
   */
  public function setDateDebut($dateDebut)
  {
    $this->dateDebut = $dateDebut;

    return $this;
  }

  /**
   * Get dateDebut
   *
   * @return \DateTime
   */
  public function getDateDebut()
  {
    return $this->dateDebut;
  }

  /**
   * Set dateFin
   *
   * @param \DateTime $dateFin
   * @return Contrat
   */
  public function setDateFin($dateFin)
  {
    $this->dateFin = $dateFin;

    return $this;
  }

  /**
   * Get dateFin
   *
   * @return \DateTime 
   */
  public function getDateFin()
  {
    return $this->dateFin;
  }

  /**
   * Set numFourn
   *
   * @param string $numFourn
   * @return Contrat
   */
  public function setNumFourn($numFourn)
  {
    $this->numFourn = $numFourn;

    return $this;
  }

  /**
   * Get numFourn
   *
   * @return string
   */
  public function getNumFourn()
  {
    return $this->numFourn;
  }

  /**
   * Set conditionReglement
   *
   * @param string $conditionReglement
   * @return Contrat
   */
  public function setConditionReglement($conditionReglement)
  {
    $this->conditionReglement = $conditionReglement;

    return $this;
  }

  /**
   * Get conditionReglement
   *
   * @return string 
   */
  public function getConditionReglement()
  {
    return $this->conditionReglement;
  }

  /**
   * Set dateDemarrage
   *
   * @param \DateTime $dateDemarrage
   * @return Contrat
   */
  public function setDateDemarrage($dateDemarrage)
  {
    $this->dateDemarrage = $dateDemarrage;

    return $this;
  }

  /**
   * Get dateDemarrage
   *
   * @return \DateTime
   */
  public function getDateDemarrage()
  {
    return $this->dateDemarrage;
  }

  /**
   * Set dateEcheance
   *
   * @param \DateTime $dateEcheance
   * @return Contrat
   */
  public function setDateEcheance($dateEcheance)
  {
    $this->dateEcheance = $dateEcheance;

    return $this;
  }

  /**
   * Get dateEcheance
   *
   * @return \DateTime 
   */
  public function getDateEcheance()
  {
    return $this->dateEcheance;
  }

  /**
   * Set montantRecu
   *
   * @param string $montantRecu
   * @return Contrat
   */
  public function setMontantRecu($montantRecu)
  {
    $this->montantRecu = $montantRecu;

    return $this;
  }

  /**
   * Get montantRecu
   *
   * @return string
   */
  public function getMontantRecu()
  {
    return $this->montantRecu;
  }

  /**
   * Set ecart
   *
   * @param string $ecart
   * @return Contrat
   */
  public function setEcart($ecart)
  {
    $this->ecart = $ecart;

    return $this;
  }

  /**
   * Get ecart
   *
   * @return string 
   */
  public function getEcart()
  {
    return $this->ecart;
  }

  /**
   * Set hasContrat
   *
   * @param boolean $hasContrat
   * @return Contrat
   */
  public function setHasContrat($hasContrat)
  {
    $this->hasContrat = $hasContrat;

    return $this;
  }

  /**
   * Get hasContrat
   *
   * @return boolean
   */
  public function getHasContrat()
  {
    return $this->hasContrat;
  }

  /**
   * Set hasJustif
   *
   * @param boolean $hasJustif
   * @return Contrat
   */
  public function setHasJustif($hasJustif)
  {
    $this->hasJustif = $hasJustif;

    return $this;
  }

  /**
   * Get hasJustif
   *
   * @return boolean 
   */
  public function getHasJustif()
  {
    return $this->hasJustif;
  }

  /**
   * Set isComplet
   *
   * @param boolean $isComplet
   * @return Contrat
   */
  public function setIsComplet($isComplet)
  {
    $this->isComplet = $isComplet;

    return $this;
  }

  /**
   * Get isComplet
   *
   * @return boolean
   */
  public function getIsComplet()
  {
    return $this->isComplet;
  }
}