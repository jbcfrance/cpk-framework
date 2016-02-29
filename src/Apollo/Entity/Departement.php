<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Entity
 * @ORM\Table(name="departements")
 * @ORM\Entity(repositoryClass="Apollo\Repository\DepartementRepository")
 */
class Departement
{
  /**
   * @var integer
   *
   * @ORM\Column(name="D_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="D_LABEL", type="string", length=255)
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
   * @return Departement
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