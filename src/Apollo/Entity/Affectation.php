<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apollo\Entity;

/**
 * Affectation
 *
 * @ORM\Entity
 * @ORM\Table(name="affectation")
 * @ORM\Entity(repositoryClass="Apollo\Repository\AffectationRepository")
 */
class Affectation
{
  /**
   * @var integer
   *
   * @ORM\Column(name="A_ID", type="integer")
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
   * @var boolean
   *
   * @ORM\Column(name="A_TYPE", type="boolean")
   */
  private $type;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="A_CODE", type="string", length=255, nullable=true)
   */
  private $code;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="A_LABEL", type="string", length=255, nullable=true)
   */
  private $label;

  /**
   *
   * @var \Datetime
   *
   * @ORM\Column(name="A_DATE", type="datetime", nullable=true)
   */
  private $date;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="A_MONTANT", type="decimal", precision=10, scale=2, nullable=true)
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
   * Set type
   *
   * @param boolean $type
   * @return Affectation
   */
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return boolean 
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set code
   *
   * @param string $code
   * @return Affectation
   */
  public function setCode($code)
  {
    $this->code = $code;

    return $this;
  }

  /**
   * Get code
   *
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }

  /**
   * Set label
   *
   * @param string $label
   * @return Affectation
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
   * Set date
   *
   * @param \DateTime $date
   * @return Affectation
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

  /**
   * Set montant
   *
   * @param string $montant
   * @return Affectation
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
   * @return Affectation
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