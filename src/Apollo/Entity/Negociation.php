<?php

namespace Apollo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apollo\Entity;

/**
 * Negociation
 * @ORM\Entity
 * @ORM\Table(name="negociations")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Apollo\Repository\NegociationRepository")
 */
class Negociation
{
  /**
   * @var integer
   *
   * @ORM\Column(name="N_ID", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="Contrat", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="C_ID", referencedColumnName="C_ID")
   *
   */
  private $contrat;

  /**
   * @ORM\ManyToOne(targetEntity="Financement", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="F_ID", referencedColumnName="F_ID")
   */
  private $financement;

  /**
   * @ORM\ManyToOne(targetEntity="TypeNego", cascade={"persist"})
   * @ORM\JoinColumn(name="TN_ID", referencedColumnName="TN_ID")
   *
   */
  private $typeNego;

  /**
   * @ORM\ManyToOne(targetEntity="SousNego", cascade={"persist"})
   * @ORM\JoinColumn(name="SN_ID", referencedColumnName="SN_ID")
   * 
   */
  private $sousNego;

  /**
   * @ORM\ManyToOne(targetEntity="Departement", cascade={"persist"})
   * @ORM\JoinColumn(name="D_ID", referencedColumnName="D_ID")
   *
   */
  private $departement;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_CHEFP", type="string", length=255, nullable=true)
   */
  private $chefProduit;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_CFAMNCG", type="string", length=5, nullable=true)
   */
  private $famNcg;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_FOURNSAP", type="string", length=5, nullable=true)
   */
  private $codeFournisseurSap;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_CMARQ", type="string", length=255, nullable=true)
   */
  private $marque;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_GMARQ", type="string", length=255, nullable=true)
   */
  private $groupMarque;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_CODIC", type="string", length=255, nullable=true)
   */
  private $codic;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_LREF", type="string", length=255, nullable=true)
   */
  private $reference;

  /**
   *
   * @var string
   *
   * @ORM\Column(name="N_LACTION", type="string", length=255, nullable=true)
   */
  private $labelAction;

  /**
   *
   * @var decimal
   *
   * @ORM\Column(name="N_MPLANCOMHT",type="decimal", precision=10, scale=2, nullable=true )
   */
  private $planCom;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="N_DDEBUT", type="datetime", nullable=true)
   */
  private $dateDebut;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="N_DFIN", type="datetime", nullable=true)
   */
  private $dateFin;

  /**
   *
   * @var \DateTime
   *
   * @ORM\Column(name="N_TIMESTAMP", type="datetime")
   */
  private $timestamp;

  /**
   *  @ORM\PrePersist 
   */
  public function doStuffOnPrePersist()
  {
    $this->timestamp = new \DateTime;
  }

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
   * Set chefProduit
   *
   * @param string $chefProduit
   * @return Negociation
   */
  public function setChefProduit($chefProduit)
  {
    $this->chefProduit = $chefProduit;

    return $this;
  }

  /**
   * Get chefProduit
   *
   * @return string
   */
  public function getChefProduit()
  {
    return $this->chefProduit;
  }

  /**
   * Set famNcg
   *
   * @param string $famNcg
   * @return Negociation
   */
  public function setFamNcg($famNcg)
  {
    $this->famNcg = $famNcg;

    return $this;
  }

  /**
   * Get famNcg
   *
   * @return string 
   */
  public function getFamNcg()
  {
    return $this->famNcg;
  }

  /**
   * Set codeFournisseurSap
   *
   * @param string $codeFournisseurSap
   * @return Negociation
   */
  public function setCodeFournisseurSap($codeFournisseurSap)
  {
    $this->codeFournisseurSap = $codeFournisseurSap;

    return $this;
  }

  /**
   * Get codeFournisseurSap
   *
   * @return string
   */
  public function getCodeFournisseurSap()
  {
    return $this->codeFournisseurSap;
  }

  /**
   * Set marque
   *
   * @param string $marque
   * @return Negociation
   */
  public function setMarque($marque)
  {
    $this->marque = $marque;

    return $this;
  }

  /**
   * Get marque
   *
   * @return string 
   */
  public function getMarque()
  {
    return $this->marque;
  }

  /**
   * Set groupMarque
   *
   * @param string $groupMarque
   * @return Negociation
   */
  public function setGroupMarque($groupMarque)
  {
    $this->groupMarque = $groupMarque;

    return $this;
  }

  /**
   * Get groupMarque
   *
   * @return string
   */
  public function getGroupMarque()
  {
    return $this->groupMarque;
  }

  /**
   * Set codic
   *
   * @param string $codic
   * @return Negociation
   */
  public function setCodic($codic)
  {
    $this->codic = $codic;

    return $this;
  }

  /**
   * Get codic
   *
   * @return string 
   */
  public function getCodic()
  {
    return $this->codic;
  }

  /**
   * Set reference
   *
   * @param string $reference
   * @return Negociation
   */
  public function setReference($reference)
  {
    $this->reference = $reference;

    return $this;
  }

  /**
   * Get reference
   *
   * @return string
   */
  public function getReference()
  {
    return $this->reference;
  }

  /**
   * Set labelAction
   *
   * @param string $labelAction
   * @return Negociation
   */
  public function setLabelAction($labelAction)
  {
    $this->labelAction = $labelAction;

    return $this;
  }

  /**
   * Get labelAction
   *
   * @return string 
   */
  public function getLabelAction()
  {
    return $this->labelAction;
  }

  /**
   * Set planCom
   *
   * @param string $planCom
   * @return Negociation
   */
  public function setPlanCom($planCom)
  {
    $this->planCom = $planCom;

    return $this;
  }

  /**
   * Get planCom
   *
   * @return string
   */
  public function getPlanCom()
  {
    return $this->planCom;
  }

  /**
   * Set dateDebut
   *
   * @param \DateTime $dateDebut
   * @return Negociation
   */
  public function setDateDebut($dateDebut)
  {
    $this->dateDebut = new \DateTime($dateDebut);

    return $this;
  }

  /**
   * Get dateDebut
   *
   * @return \DateTime 
   */
  public function getDateDebut()
  {
    return $this->dateDebut;
  }

  /**
   * Set dateFin
   *
   * @param \DateTime $dateFin
   * @return Negociation
   */
  public function setDateFin($dateFin)
  {
    $this->dateFin = new \DateTime($dateFin);

    return $this;
  }

  /**
   * Get dateFin
   *
   * @return \DateTime
   */
  public function getDateFin()
  {
    return $this->dateFin;
  }

  /**
   * Set timestamp
   *
   * @param \DateTime $timestamp
   * @return Negociation
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;

    return $this;
  }

  /**
   * Get timestamp
   *
   * @return \DateTime 
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }

  /**
   * Set contrat
   *
   * @param \Apollo\Entity\Contrat $contrat
   * @return Negociation
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

  /**
   * Set financement
   *
   * @param \Apollo\Entity\Financement $financement
   * @return Negociation
   */
  public function setFinancement(\Apollo\Entity\Financement $financement = null)
  {
    $this->financement = $financement;

    return $this;
  }

  /**
   * Get financement
   *
   * @return \Apollo\Entity\Financement 
   */
  public function getFinancement()
  {
    return $this->financement;
  }

  /**
   * Set typeNego
   *
   * @param \Apollo\Entity\TypeNego $typeNego
   * @return Negociation
   */
  public function setTypeNego(\Apollo\Entity\TypeNego $typeNego = null)
  {
    $this->typeNego = $typeNego;

    return $this;
  }

  /**
   * Get typeNego
   *
   * @return \Apollo\Entity\TypeNego
   */
  public function getTypeNego()
  {
    return $this->typeNego;
  }

  /**
   * Set sousNego
   *
   * @param \Apollo\Entity\SousNego $sousNego
   * @return Negociation
   */
  public function setSousNego(\Apollo\Entity\SousNego $sousNego = null)
  {
    $this->sousNego = $sousNego;

    return $this;
  }

  /**
   * Get sousNego
   *
   * @return \Apollo\Entity\SousNego 
   */
  public function getSousNego()
  {
    return $this->sousNego;
  }

  /**
   * Set departement
   *
   * @param \Apollo\Entity\Departement $departement
   * @return Negociation
   */
  public function setDepartement(\Apollo\Entity\Departement $departement = null)
  {
    $this->departement = $departement;

    return $this;
  }

  /**
   * Get departement
   *
   * @return \Apollo\Entity\Departement
   */
  public function getDepartement()
  {
    return $this->departement;
  }
}