<?php

/**
 * Controller des pages Condition
 *
 * @author       Jean-Baptiste CIEPKA
 * @license      https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage   Controller
 */
use CPK\Framework\Controller;
use Apollo\Entity\Negociation;
use Apollo\Entity\Financement;
use Apollo\Entity\Contrat;
use Apollo\Entity\SousNego;
use Apollo\Entity\TypeNego;
use Apollo\Entity\Departement;

/**
 * Controller des pages Condition
 *
 * @author       Jean-Baptiste CIEPKA
 * @license      https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage   Controller
 */
class conditionController extends Controller
{

  /**
   * traitementController
   *
   * Methode regrouppant les actions d'initialisation pouvant être spécifique à la page.
   *
   * @param void
   * @return void
   */
  public function traitementController()
  {
    if (isset($_POST) and ! empty($_POST)) {
      $aPost = array();
      foreach ($_POST as $kPost => $vPost) {
        $aPost[$kPost] = $vPost;
      }
    }

    $this->aVars[$this->aVars['sAction']] = array();


    if (method_exists($this, $this->aVars['sAction'])) {
      $this->{$this->aVars['sAction']}();
    } else {
      $this->{'defaut'}();
    }
  }
  /* User */

  /**
   * defaut
   *
   * Methode de configuration de la vue par defaut du controller.
   *
   * @param void
   * @return void
   */
  public function defaut()
  {
    $this->setTpl('defaut.htm');
    $this->setControllerTitle('Apollo');
    $this->setCurrentControllerName('Condition');
  }

  /**
   * create
   *
   * Methode de configuration de la vue par create du controller.
   *
   * @param void
   * @return void
   */
  public function create()
  {
    $this->setTpl('create.htm');
    $this->setControllerTitle('Apollo');
    $this->setCurrentControllerName('Création d\'une condition');

    //$oParam = new ParamsModel();

    $this->aVars['aDepartementsListe'] = $this->oEm->getRepository('Apollo\Entity\Departement')->findAll();
    $this->aVars['aTypeNego']          = $this->oEm->getRepository('Apollo\Entity\TypeNego')->findAll();

    //$oParam->close();
  }

  public function do_create()
  {

    $aFormData = $_POST;

    $oNegociation = new Negociation();
    $oContrat     = new Contrat();
    $oFinancement = new Financement();
    $oTypeNego    = new TypeNego();
    $oSousNego    = new SousNego();
    $oDepartement = new Departement();



    foreach ($_POST as $kPost => $vPost) {



      $aFieldName = array();

      preg_match("/([a-zA-Z]*)_([a-zA-Z]*)/", $kPost, $aFieldName);

      $sEntityClassName = "o".ucfirst($aFieldName[1]);

      if ($aFieldName[2] == 'id') {
        $$sEntityClassName = $this->oEm->getRepository('Apollo\Entity\\'.ucfirst($aFieldName[1]))->findOneBy(array(
            'id' => $aFieldName[2]));
        $sSetFunc          = 'set'.ucfirst($aFieldName[1]);
        $oNegociation->{$sSetFunc}($$sEntityClassName);
      } else {
        $sSetFunc = 'set'.ucfirst($aFieldName[2]);

        if (true === method_exists($$sEntityClassName, $sSetFunc))
            $$sEntityClassName->{$sSetFunc}($vPost);
      }
    }

    $oNegociation->setContrat($oContrat);
    $oNegociation->setFinancement($oFinancement);



    $this->oEm->persist($oNegociation);

    $this->oEm->flush();
    header("Location: ".HTML_ROOT_PATH."home/");
  }

  /**
   * search
   *
   * Methode de configuration de la vue par search du controller.
   *
   * @param void
   * @return void
   */
  public function search()
  {
    $this->setTpl('search.htm');
    $this->setControllerTitle('Apollo');
    $this->setCurrentControllerName('Rechecher une condition');
  }

  /**
   * edit
   *
   * 
   *
   * @param void
   * @return void
   */
  public function edit()
  {

    $this->setControllerTitle('Apollo');

    $sEntityClassName = $this->aVars["aParams"][0];
    $iId              = $this->aVars["aParams"][1];

    $this->setCurrentControllerName('Edition '.$sEntityClassName);

    $this->aVars["oEntity"] = $this->oEm->getRepository('Apollo\Entity\\'.$sEntityClassName)->findOneBy(array(
        'id' => $iId));

    $this->aVars['aTypeNego']    = $this->oEm->getRepository('Apollo\Entity\TypeNego')->findAll();
    $this->aVars['aSousNego']    = $this->oEm->getRepository('Apollo\Entity\SousNego')->findAll();
    $this->aVars['aDepartement'] = $this->oEm->getRepository('Apollo\Entity\Departement')->findAll();


    if (true === file_exists(BASE_PATH.'views/condition/edit_templates/'.$sEntityClassName.'.htm')) {
      $this->setTpl('edit_templates/'.$sEntityClassName.'.htm');
    } else {
      $this->setTpl('edit.htm');
    }
  }

  public function do_edit_negociation()
  {
    echo "<pre>";
    $oContrat     = new Contrat();
    $oFinancement = new Financement();
    $oTypeNego    = new TypeNego();
    $oSousNego    = new SousNego();
    $oDepartement = new Departement();

    $oNegociation = $this->oEm->getRepository('Apollo\Entity\Negociation')->findOneBy(array(
        'id' => $_POST['id']));

    unset($_POST['id']);

    var_dump($_POST);
    foreach ($_POST as $kPost => $vPost) {

      //var_dump($kPost);
      //var_dump($vPost);

      $aFieldName = array();

      preg_match("/([a-zA-Z]*)_([a-zA-Z]*)/", $kPost, $aFieldName);

      $sEntityClassName = "o".ucfirst($aFieldName[1]);
      //echo $sEntityClassName."<br>";
      if ($aFieldName[2] == 'id') {
        $$sEntityClassName = $this->oEm->getRepository('Apollo\Entity\\'.ucfirst($aFieldName[1]))->findOneBy(array(
            'id' => $vPost));
        $sSetFunc          = 'set'.ucfirst($aFieldName[1]);

        $oNegociation->{$sSetFunc}($$sEntityClassName);

        //var_dump($$sEntityClassName);
      } else {
        $sSetFunc = 'set'.ucfirst($aFieldName[2]);

        if (true === method_exists($$sEntityClassName, $sSetFunc))
            if ($vPost != '') $$sEntityClassName->{$sSetFunc}($vPost);
      }
    }

    $oNegociation->setContrat($oContrat);
    $oNegociation->setFinancement($oFinancement);



    $this->oEm->persist($oNegociation);

    $this->oEm->flush();
    header("Location: ".HTML_ROOT_PATH."home/");
  }

  protected function do_upload_pj()
  {
    $this->setLayout('blankLayout');
    $this->setTpl('do_upload_pj.htm');
    require(BASE_PATH.'src'.DIRECTORY_SEPARATOR.'UploadHandler.php');
    $upload_handler = new UploadHandler();
  }

  public function upload_pj()
  {
    $this->setTpl('upload_pj.htm');
    $this->setControllerTitle('Apollo');
    $this->setCurrentControllerName('Enregistrement de pièces jointes');

    //$oParams = new ParamsModel();
    $this->aVars['pj_type'] = $this->oEm->getRepository('Apollo\Entity\PJType')->findAll();
  }
}