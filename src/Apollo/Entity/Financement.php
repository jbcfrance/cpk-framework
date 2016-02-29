<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apollo\Entity;

/**
 * Financement
 *
 * @ORM\Entity
 * @ORM\Table(name="financement")
 * @ORM\Entity(repositoryClass="Apollo\Repository\FinancementRepository")
 */
class Financement
{
  /**
   * @var integer
   *
   * @ORM\Column(name="F_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="StatusFinancement", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="SF_ID", referencedColumnName="SF_ID")
   * 
   */
  private $statusFinancement;

  /**
   *
   * @var integer
   *
   * @ORM\Column(name="F_TYPE", type="integer", nullable=true)
   */
  private $type;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="F_NUMFACT", type="string", length=255, nullable=true)
   */
  private $numFact;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="F_ABANDON", type="string", length=255, nullable=true)
   */
  private $abandon;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="F_ABANDON_MOTIF", type="string", length=255, nullable=true)
   */
  private $abandonMotif;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="F_SAP", type="string", length=255, nullable=true)
   */
  private $sap;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="F_MONTANT_RECU",type="decimal", precision=10, scale=2 , nullable=true)
   */
  private $montantRecu;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="F_DECHEANCE", type="datetime", nullable=true)
   */
  private $echeance;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="F_DREGLEMENT", type="datetime", nullable=true)
   */
  private $reglement;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="F_MCHARGES",type="decimal", precision=10, scale=2 , nullable=true)
   */
  private $charges;

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
   * @return Financement
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
   * Set numFact
   *
   * @param string $numFact
   * @return Financement
   */
  public function setNumFact($numFact)
  {
    $this->numFact = $numFact;

    return $this;
  }

  /**
   * Get numFact
   *
   * @return string 
   */
  public function getNumFact()
  {
    return $this->numFact;
  }

  /**
   * Set abandon
   *
   * @param string $abandon
   * @return Financement
   */
  public function setAbandon($abandon)
  {
    $this->abandon = $abandon;

    return $this;
  }

  /**
   * Get abandon
   *
   * @return string
   */
  public function getAbandon()
  {
    return $this->abandon;
  }

  /**
   * Set abandonMotif
   *
   * @param string $abandonMotif
   * @return Financement
   */
  public function setAbandonMotif($abandonMotif)
  {
    $this->abandonMotif = $abandonMotif;

    return $this;
  }

  /**
   * Get abandonMotif
   *
   * @return string 
   */
  public function getAbandonMotif()
  {
    return $this->abandonMotif;
  }

  /**
   * Set sap
   *
   * @param string $sap
   * @return Financement
   */
  public function setSap($sap)
  {
    $this->sap = $sap;

    return $this;
  }

  /**
   * Get sap
   *
   * @return string
   */
  public function getSap()
  {
    return $this->sap;
  }

  /**
   * Set montantRecu
   *
   * @param string $montantRecu
   * @return Financement
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
   * Set echeance
   *
   * @param \DateTime $echeance
   * @return Financement
   */
  public function setEcheance($echeance)
  {
    $this->echeance = $echeance;

    return $this;
  }

  /**
   * Get echeance
   *
   * @return \DateTime
   */
  public function getEcheance()
  {
    return $this->echeance;
  }

  /**
   * Set reglement
   *
   * @param \DateTime $reglement
   * @return Financement
   */
  public function setReglement($reglement)
  {
    $this->reglement = $reglement;

    return $this;
  }

  /**
   * Get reglement
   *
   * @return \DateTime 
   */
  public function getReglement()
  {
    return $this->reglement;
  }

  /**
   * Set charges
   *
   * @param string $charges
   * @return Financement
   */
  public function setCharges($charges)
  {
    $this->charges = $charges;

    return $this;
  }

  /**
   * Get charges
   *
   * @return string
   */
  public function getCharges()
  {
    return $this->charges;
  }

  /**
   * Set statusFinancement
   *
   * @param \Apollo\Entity\StatusFinancement $statusFinancement
   * @return Financement
   */
  public function setStatusFinancement(\Apollo\Entity\StatusFinancement $statusFinancement
  = null)
  {
    $this->statusFinancement = $statusFinancement;

    return $this;
  }

  /**
   * Get statusFinancement
   *
   * @return \Apollo\Entity\StatusFinancement
   */
  public function getStatusFinancement()
  {
    return $this->statusFinancement;
  }
}