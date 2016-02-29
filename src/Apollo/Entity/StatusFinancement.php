<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusFinancement
 *
 * @ORM\Entity
 * @ORM\Table(name="status_financement")
 * @ORM\Entity(repositoryClass="Apollo\Repository\StatusFinancementRepository")
 */
class StatusFinancement
{
  /**
   * @var integer
   *
   * @ORM\Column(name="SF_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="SF_SHORTLABEL", type="string", length=3)
   */
  private $shortLabel;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="SF_LABEL", type="string", length=255)
   */
  private $label;

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
   * Set shortLabel
   *
   * @param string $shortLabel
   * @return StatusFinancement
   */
  public function setShortLabel($shortLabel)
  {
    $this->shortLabel = $shortLabel;

    return $this;
  }

  /**
   * Get shortLabel
   *
   * @return string 
   */
  public function getShortLabel()
  {
    return $this->shortLabel;
  }

  /**
   * Set label
   *
   * @param string $label
   * @return StatusFinancement
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
}