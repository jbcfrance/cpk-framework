<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apollo\Entity;

/**
 * Fractionnement
 *
 * @ORM\Entity
 * @ORM\Table(name="fractionnement")
 * @ORM\Entity(repositoryClass="Apollo\Repository\FractionnementRepository")
 */
class Fractionnement
{
  /**
   * @var integer
   *
   * @ORM\Column(name="FRAC_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="Negociation", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="N_ID", referencedColumnName="N_ID")
   *
   */
  private $negociation;

  /**
   *
   * @var integer
   *
   * @ORM\Column(name="FRAC_SEQ", type="integer", nullable=true)
   */
  private $seq;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="FRAC_PERIODE", type="string", length=255, nullable=true)
   */
  private $periode;

  /**
   *
   * @var \Datetime
   *
   * @ORM\Column(name="FRAC_DFACT", type="datetime", nullable=true)
   */
  private $dateFacture;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="FRAC_MONTANT", type="decimal", precision=10, scale=2, nullable=true)
   */
  private $montant;

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
   * Set seq
   *
   * @param integer $seq
   * @return Fractionnement
   */
  public function setSeq($seq)
  {
    $this->seq = $seq;

    return $this;
  }

  /**
   * Get seq
   *
   * @return integer
   */
  public function getSeq()
  {
    return $this->seq;
  }

  /**
   * Set periode
   *
   * @param string $periode
   * @return Fractionnement
   */
  public function setPeriode($periode)
  {
    $this->periode = $periode;

    return $this;
  }

  /**
   * Get periode
   *
   * @return string 
   */
  public function getPeriode()
  {
    return $this->periode;
  }

  /**
   * Set dateFacture
   *
   * @param \DateTime $dateFacture
   * @return Fractionnement
   */
  public function setDateFacture($dateFacture)
  {
    $this->dateFacture = $dateFacture;

    return $this;
  }

  /**
   * Get dateFacture
   *
   * @return \DateTime
   */
  public function getDateFacture()
  {
    return $this->dateFacture;
  }

  /**
   * Set montant
   *
   * @param string $montant
   * @return Fractionnement
   */
  public function setMontant($montant)
  {
    $this->montant = $montant;

    return $this;
  }

  /**
   * Get montant
   *
   * @return string 
   */
  public function getMontant()
  {
    return $this->montant;
  }

  /**
   * Set negociation
   *
   * @param \Apollo\Entity\Negociation $negociation
   * @return Fractionnement
   */
  public function setNegociation(\Apollo\Entity\Negociation $negociation = null)
  {
    $this->negociation = $negociation;

    return $this;
  }

  /**
   * Get negociation
   *
   * @return \Apollo\Entity\Negociation
   */
  public function getNegociation()
  {
    return $this->negociation;
  }
}