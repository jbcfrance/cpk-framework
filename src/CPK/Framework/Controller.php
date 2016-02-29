<?php
/*
 * The MIT License
 *
 * Copyright 2016 Jean-Baptiste CIEPKA.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */


/**
 * Classe de contrôle de la navigation et du traitement des données entre les pages de l'application.
 * Elle regroupe les methodes génériques de tout les controlleurs de l'applicaiton.
 *
 * @author       Jean-Baptiste CIEPKA
 * @license      https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 * @subpackage   Controller
 */
namespace CPK\Framework;

use Doctrine\ORM\EntityManager;

class Controller
{
  const DEFAULT_VIEW_PATH = 'views',
      DEFAULT_CONTROLER_PATH = 'Controllers',
      DEFAULT_SITE_TITLE = 'Apollo',
      TPL_EXT = '.htm';

  /** @var string|null */
  public $sRequestController = null;

  /** @var array Tableau de l'ensemble des données transmises à la vue et pouvant y être affichée. */
  public $aVars = array();

  /** @var array Tableau de l'ensemble des données transmises au layout et pouvant y être affichée. */
  public $aLayoutVars = array();

  /** @var string|null URL vers le fichier de la vue */
  public $sTplURL = null;

  /** @var string Fichier servant de layout au site. Par defaut: layout.htm */
  public $sLayoutName = 'layout.htm';

  /** @var string|null */
  public $sSubTitle = null;

  /** @var string|null */
  public $sCurrentControllerName = null;

  /** @var string|null */
  public $sCurrentActionName = null;

  /** @var string Class CSS global de la page. Le passer en variable permet d'adapter le style global de la page selon les besoins de la vue. */
  public $sClassPage = 'container-fluid';

  /** @var EntityManager */
  public $oEm = null;

  /**
   * __construct
   *
   * Methode principal de lecture du fichier et composition du tableau aFileContent.
   *
   * @param string $sRequestController Nom du controller detecté par le routing.
   * @param array $aVars ensemble des variables reçu par la page ($_GET, paramettre de l'url...)
   */
  public function __construct($sRequestController, $aVars, EntityManager $oEm)
  {
    $this->sRequestController = $sRequestController;
    $this->oEm                = $oEm;
    $this->setActiveController($aVars['sAction']);
    $this->sTplURL            = $this->sRequestController.DIRECTORY_SEPARATOR.$this->sRequestController.self::TPL_EXT;
    $this->defineGetVars($aVars);
    $this->setControllerTitle(self::DEFAULT_SITE_TITLE);

    $this->traitementController();
    $this->setBreadcrumb();
  }

  /**
   * getBreadcrumb
   *
   * Recupère le Breadcrumb généré pour la page
   *
   * @param void
   */
  public function getBreadcrumb()
  {
    return $this->aBreadcrumb;
  }

  /**
   * getControllerTitle
   *
   *
   * @param void
   */
  public function getControllerTitle()
  {
    return $this->aVars['sControllerTitle'];
  }

  /**
   * setLayoutVars
   *
   *
   * @param array $aLayoutVars
   */
  public function setLayoutVars($aLayoutVars)
  {
    $this->aLayoutVars = $aLayoutVars;
  }

  /**
   * getActiveController
   *
   *
   * @param void
   */
  public function getActiveController()
  {
    return $this->aVars['sActiveController'];
  }

  /**
   * setBreadcrumb
   *
   * Generation du Breadcrumb à partir du nom du controller
   *
   * @param void
   */
  protected function setBreadcrumb()
  {

    $this->aBreadcrumb = array(0 => array('name' => $this->sCurrentControllerName,
            'action' => $this->aVars['sAction'], 'controller' => $this->sRequestController));
  }

  /**
   * setLayout
   *
   * Setter permettant de modifier le layout par defaut.
   *
   * @param string|layout $sLayoutName nom du layout à charger
   */
  protected function setLayout($sLayoutName)
  {
    if (isset($sLayoutName)){
      $this->sLayoutName = $sLayoutName.'.htm';
    } else {
      $this->sLayoutName = 'layout.htm';
    }
  }

  /**
   * setClassPage
   *
   *
   * @param void
   */
  protected function setClassPage($sClassPage)
  {
    $this->sClassPage = $sClassPage;
  }

  /**
   * setControllerTitle
   *
   *
   * @param string $sControllerTitle
   */
  protected function setControllerTitle($sControllerTitle)
  {
    $this->aVars['sControllerTitle'] = $sControllerTitle;
  }

  /**
   * setCurrentControllerName
   *
   *
   * @param string $sControllerName
   */
  protected function setCurrentControllerName($sControllerName)
  {
    $this->sCurrentControllerName = $sControllerName;
  }

  /**
   * setActiveController
   *
   *
   * @param string $activeController
   */
  protected function setActiveController($activeController)
  {
    if (empty($activeController)){
      $this->aVars['sActiveController'] = $this->sRequestController;
    }else {
      $this->aVars['sActiveController'] = $activeController;
    }
  }

  /**
   * defineGetVars
   *
   * Setter global pour le tableau $aVars.
   *
   * @param array $aVars
   */
  protected function defineGetVars($aVars)
  {
    if (!empty($aVars)) {
      foreach ($aVars as $k => $v) {
        $this->aVars[$k] = $v;
      }
    }
  }

  /**
   * setTpl
   *
   *
   * @param string $sTpl
   */
  protected function setTpl($sTpl)
  {
    $this->sTplURL = self::DEFAULT_VIEW_PATH.DIRECTORY_SEPARATOR.$this->sRequestController.DIRECTORY_SEPARATOR.$sTpl;
  }

  /**
   * traitementController
   *
   * Methode initalisant le tableau de variable spécifique au controller afin de l'envoyer à la vue.
   *
   * @param void
   * @return void
   */
  protected function traitementController()
  {
    $this->aVars[$this->sRequestController] = array();
    $this->setTpl($this->sRequestController.self::TPL_EXT);
  }

  /**
   * __toString
   *
   * Méthode de PHP permettant de gérer le comportement de l'objet lorsqu'il est echo.
   *
   * @param void
   */
  public function __toString()
  {
    return $this->display();
  }

  /**
   * display
   *
   * Méthode de rendu de la view et du controller pour générer la page finale.
   *
   * @param void
   */
  protected function display()
  {
    chdir(dirname($_SERVER['SCRIPT_FILENAME']));
    if (file_exists(BASE_PATH.'views'.DIRECTORY_SEPARATOR.'menu.htm')) {
      ob_start();

      require_once(BASE_PATH.'views'.DIRECTORY_SEPARATOR.'menu.htm');
      $this->aVars['MENU'] = ob_get_contents();

      ob_end_clean();
    } else {
      $this->aVars['MENU'] = BASE_PATH.'views'.DIRECTORY_SEPARATOR.'menu.htm';
    }
    $sTemplate = $this->sTplURL;
    if (file_exists(BASE_PATH.$sTemplate)) {
      ob_start();

      require_once(BASE_PATH.$sTemplate);
      $this->aVars['CONTENT'] = ob_get_contents();

      ob_end_clean();
    } else {
      $this->aVars['CONTENT'] = BASE_PATH.$sTemplate;
    }
    ob_start();
    require_once(self::DEFAULT_VIEW_PATH.DIRECTORY_SEPARATOR.$this->sLayoutName);
    $sTempReturn = ob_get_contents();
    ob_end_clean();
    return $sTempReturn;
  }

  /**
   * stripAccents
   *
   * Remplacement des accents par les lettres non accentués correspondantes.
   *
   * @param string $string
   */
  protected function stripAccents($string)
  {
    return strtr($string, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
        'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
  }
}