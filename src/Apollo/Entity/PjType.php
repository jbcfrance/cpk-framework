<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pj_Type
 *
 * @ORM\Entity
 * @ORM\Table(name="pj_types")
 * @ORM\Entity(repositoryClass="Apollo\Repository\PjTypeRepository")
 */
class PjType
{
  /**
   * @var integer
   *
   * @ORM\Column(name="PJ_TYPE_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="PJ_TYPE_LABEL", type="string", length=255)
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
   * Set label
   *
   * @param string $label
   * @return Pj_Type
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