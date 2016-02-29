<?php

/**
 * Controller de la page d'accueil
 *
 * @author       Jean-Baptiste CIEPKA
 * @license		https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage	Controller
 */
use CPK\Framework\Controller;
use Apollo\Entity\Negociation;

/**
 * Controller de la page d'accueil
 *
 * @author       Jean-Baptiste CIEPKA
 * @license		https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage	Controller
 */
class homeController extends Controller
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
    $this->setCurrentControllerName('Accueil');



    $this->aVars["aNegociations"] = $this->oEm->getRepository('Apollo\Entity\Negociation')->findAllNego(array(
        'timestamp' => 'DESC'));
  }
}