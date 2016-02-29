<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_Nego
 *
 * @ORM\Entity
 * @ORM\Table(name="type_nego")
 * @ORM\Entity(repositoryClass="Apollo\Repository\TypeNegoRepository")
 */
class TypeNego
{
  /**
   * @var integer
   *
   * @ORM\Column(name="TN_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="TN_LABEL", type="string", length=255)
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
   * @return Type_Nego
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