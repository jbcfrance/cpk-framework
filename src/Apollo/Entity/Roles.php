<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Entity
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="Apollo\Repository\RoleRepository")
 */
class Roles
{
  /**
   * @var integer
   *
   * @ORM\Column(name="R_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="R_ROLE", type="string", length=255)
   */
  private $role;

  /**
   *
   * @var boolean
   *
   * @ORM\Column(name="R_CAN_CREATE", type="boolean")
   */
  private $canCreate;

  /**
   *
   * @var boolean
   *
   * @ORM\Column(name="R_CAN_MODIF", type="boolean")
   */
  private $canModif;

  /**
   *
   * @var boolean
   *
   * @ORM\Column(name="R_CAN_VIEW", type="boolean")
   */
  private $canView;

  /**
   *
   * @var blob
   *
   * @ORM\Column(name="R_MODIF_FIELDS", type="blob", nullable=true)
   */
  private $modifFields;

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
   * Set role
   *
   * @param string $role
   * @return Roles
   */
  public function setRole($role)
  {
    $this->role = $role;

    return $this;
  }

  /**
   * Get role
   *
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }

  /**
   * Set canCreate
   *
   * @param boolean $canCreate
   * @return Roles
   */
  public function setCanCreate($canCreate)
  {
    $this->canCreate = $canCreate;

    return $this;
  }

  /**
   * Get canCreate
   *
   * @return boolean 
   */
  public function getCanCreate()
  {
    return $this->canCreate;
  }

  /**
   * Set canModif
   *
   * @param boolean $canModif
   * @return Roles
   */
  public function setCanModif($canModif)
  {
    $this->canModif = $canModif;

    return $this;
  }

  /**
   * Get canModif
   *
   * @return boolean
   */
  public function getCanModif()
  {
    return $this->canModif;
  }

  /**
   * Set canView
   *
   * @param boolean $canView
   * @return Roles
   */
  public function setCanView($canView)
  {
    $this->canView = $canView;

    return $this;
  }

  /**
   * Get canView
   *
   * @return boolean 
   */
  public function getCanView()
  {
    return $this->canView;
  }

  /**
   * Set modifFields
   *
   * @param string $modifFields
   * @return Roles
   */
  public function setModifFields($modifFields)
  {
    $this->modifFields = $modifFields;

    return $this;
  }

  /**
   * Get modifFields
   *
   * @return string
   */
  public function getModifFields()
  {
    return $this->modifFields;
  }
}