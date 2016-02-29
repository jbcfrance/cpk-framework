<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apollo\Entity;

/**
 * Piece_Jointe
 *
 * @ORM\Entity
 * @ORM\Table(name="piece_jointe")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Apollo\Repository\PieceJointeRepository")
 */
class PieceJointe
{
  /**
   * @var integer
   *
   * @ORM\Column(name="PJ_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="PjType", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="PJ_TYPE_ID", referencedColumnName="PJ_TYPE_ID")
   *
   */
  private $type;

  /**
   * @ORM\ManyToOne(targetEntity="Contrat", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="C_ID", referencedColumnName="C_ID")
   * 
   */
  private $contrat;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="PJ_FILENAME", type="string", length=255)
   */
  private $filename;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="PJ_URL", type="string", length=255)
   */
  private $url;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="PJ_CREATED", type="datetime")
   */
  private $createdAt;

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
   * Set filename
   *
   * @param string $filename
   * @return Piece_Jointe
   */
  public function setFilename($filename)
  {
    $this->filename = $filename;

    return $this;
  }

  /**
   * Get filename
   *
   * @return string
   */
  public function getFilename()
  {
    return $this->filename;
  }

  /**
   * Set url
   *
   * @param string $url
   * @return Piece_Jointe
   */
  public function setUrl($url)
  {
    $this->url = $url;

    return $this;
  }

  /**
   * Get url
   *
   * @return string 
   */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * Set createdAt
   *
   * @param \DateTime $createdAt
   * @return Piece_Jointe
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  /**
   * Get createdAt
   *
   * @return \DateTime
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * Set type
   *
   * @param \Apollo\Entity\PjType $type
   * @return PieceJointe
   */
  public function setType(\Apollo\Entity\PjType $type = null)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return \Apollo\Entity\PjType 
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set contrat
   *
   * @param \Apollo\Entity\Contrat $contrat
   * @return PieceJointe
   */
  public function setContrat(\Apollo\Entity\Contrat $contrat = null)
  {
    $this->contrat = $contrat;

    return $this;
  }

  /**
   * Get contrat
   *
   * @return \Apollo\Entity\Contrat
   */
  public function getContrat()
  {
    return $this->contrat;
  }
}