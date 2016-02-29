<?php
/**
 * Controller de la page login
 *
 * @author       Jean-Baptiste CIEPKA
 * @license		https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage	Controller
 */
use CPK\Framework\Controller;

/**
 * Controller de la page login
 *
 * @author       Jean-Baptiste CIEPKA
 * @license		https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage	Controller
 */
class loginController extends Controller
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
    $this->setControllerTitle('Bridge');
    $this->setLayout('loginLayout');
    $this->setCurrentControllerName('Login');
  }

  /**
   * login
   *
   * Methode de configuration de login sans vue car elle redirige sur l'accueil.
   *
   * @param void
   * @return void
   */
  public function login()
  {
    $this->setTpl('login.htm');
    $this->setControllerTitle('Bridge');
    $this->setLayout('loginLayout');
    $this->setCurrentControllerName('Login');

    $oUser = $this->oEm->getRepository('Apollo\Entity\User')->findOneBy(array('login' => $_POST['login'],
        'password' => $_POST['pwd']));

    if (false === is_null($oUser)) {
      $_SESSION['login']    = $_POST['login'];
      $_SESSION['isLogged'] = true;
      //$_SESSION['right']    = $right;
      header("Location: ".HTML_ROOT_PATH."home/");
    } else {
      $this->aVars['sLogin'] = $_POST['login'];
    }
  }

  /**
   * logout
   *
   * Methode de configuration de logout sans vue car elle redirige sur le login.
   *
   * @param void
   * @return void
   */
  public function logout()
  {
    $this->setTpl('logout.htm');
    $this->setControllerTitle('Bridge');
    $this->setLayout('loginLayout');
    $this->setCurrentControllerName('Logout');

    session_unset();
    session_destroy();
    header("Location: ".HTML_ROOT_PATH."login/");
  }
}