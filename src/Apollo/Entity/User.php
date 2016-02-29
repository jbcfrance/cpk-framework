<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apollo\Entity;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="user_infos")
 * @ORM\Entity(repositoryClass="Apollo\Repository\UserRepository")
 */
class User
{
  /**
   * @var string
   *
   * @ORM\Column(name="UI_LOGIN", type="string")
   * @ORM\Id
   *
   */
  private $login;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="UI_PWD", type="text")
   */
  private $password;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="UI_LANG", type="string", length=255)
   */
  private $lang;

  /**
   * @ORM\ManyToOne(targetEntity="Roles", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="R_ID", referencedColumnName="R_ID")
   *
   */
  private $role;

  /**
   * Set login
   *
   * @param string $login
   * @return User
   */
  public function setLogin($login)
  {
    $this->login = $login;

    return $this;
  }

  /**
   * Get login
   *
   * @return string
   */
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * Set type
   *
   * @param integer $type
   * @return User
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
   * Set password
   *
   * @param string $password
   * @return User
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get password
   *
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set lang
   *
   * @param string $lang
   * @return User
   */
  public function setLang($lang)
  {
    $this->lang = $lang;

    return $this;
  }

  /**
   * Get lang
   *
   * @return string 
   */
  public function getLang()
  {
    return $this->lang;
  }

  /**
   * Set role
   *
   * @param \Apollo\Entity\Roles $role
   * @return User
   */
  public function setRole(\Apollo\Entity\Roles $role = null)
  {
    $this->role = $role;

    return $this;
  }

  /**
   * Get role
   *
   * @return \Apollo\Entity\Roles
   */
  public function getRole()
  {
    return $this->role;
  }
}