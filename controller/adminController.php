<?php

/**
 * Controller de l'administration
 *
 * @author       Jean-Baptiste CIEPKA
 * @license      https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage   Controller
 */
use CPK\Framework\Controller;
use Apollo\Entity\Departement;

/**
 * Controller de l'administration
 *
 * @author       Jean-Baptiste CIEPKA
 * @license      https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage   Controller
 */
class adminController extends Controller
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
  /* Accueil */

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
    $this->setCurrentControllerName('Administration');

    $aEntitiesAdministrables = array("Departement", "TypeNego", "SousNego");

    foreach ($aEntitiesAdministrables as $sEntity) {
      $aEntityConf                = array(
          "count" => count($this->oEm->getRepository('Apollo\Entity\\'.$sEntity)->findAll()),
          "name" => $sEntity,
      );
      $this->aVars['aEntities'][] = $aEntityConf;
    }
  }

  public function entity()
  {
    if (class_exists("Apollo\Entity\\".$this->aVars['aParams'][0])) {
      $this->buildLabelForm('Apollo\Entity\\'.$this->aVars['aParams'][0]);
    } else {
      header("Location: ".HTML_ROOT_PATH."admin/");
    }
  }

  public function do_update()
  {
    $sEntityName = $this->aVars['aParams'][0];
    $sLabel      = $_POST['value'];
    $iId         = $_POST['pk'];

    $sEntity = "Apollo\Entity\\".$sEntityName;
    $oEntity = $this->oEm->getRepository($sEntity)->findOneBy(array('id' => $iId));



    $oEntity->setLabel($sLabel);

    $this->oEm->persist($oEntity);

    $this->oEm->flush();

    header(' ', false, 200);
  }

  public function do_delete()
  {
    $sEntityName = $_POST['entity'];
    $iId         = $_POST['id'];

    $sEntity = "Apollo\Entity\\".$sEntityName;
    $oEntity = $this->oEm->getRepository($sEntity)->findOneBy(array('id' => $iId));


    $this->oEm->remove($oEntity);

    $this->oEm->flush();

    header(' ', false, 200);
  }

  public function do_save()
  {
    $sEntityName = $_POST['entity_name'];
    $sLabel      = $_POST['label'];

    $sEntity = "Apollo\Entity\\".$sEntityName;
    $oEntity = new $sEntity;

    $oEntity->setLabel($sLabel);

    $this->oEm->persist($oEntity);

    $this->oEm->flush();

    header("Location: ".HTML_ROOT_PATH."admin/entity/".$sEntityName);
  }

  protected function buildLabelForm($sEntityFullName)
  {
    $this->setTpl('labelForm.htm');

    $aAllResult = $this->oEm->getRepository($sEntityFullName)->findAll();


    $this->aVars['aAllResult'] = $aAllResult;

    $aEntitySplitName = explode('\\', $sEntityFullName);
    $sEntityName      = end($aEntitySplitName);

    $this->aVars['entityName'] = $sEntityName;

    $this->aVars['countEntity'] = count($this->oEm->getRepository($sEntityFullName)->findAll());
  }
}