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
error_reporting(E_ALL | E_STRICT);
use CPK\Framework\Controller;

/**
 * Index de l'application. Permet un routing sommaire et l'autoload de l'application.
 *
 * @author       Jean-Baptiste CIEPKA
 * @license		https://opensource.org/licenses/MIT MIT
 * @package      CPKFramework
 */
session_start();
define('HTML_ROOT_PATH',
    'http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0,
        strrpos($_SERVER['SCRIPT_NAME'], '/') + 1));
define('BASE_PATH', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

require_once('bootstrap.php');

/* Nettoyage de l'URI pour obtenir l'arborescence d'actions et les paramètres. */
$sRequestURI = substr($_SERVER['REQUEST_URI'],
    strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);


// Effacer les parametres en GET :
if (strchr($sRequestURI, '?')) {
  $sRequestURI = substr($sRequestURI, 0, strpos($sRequestURI, '?'));
}
// explode de l'URL :
$aRequestURI = explode('/', $sRequestURI);
while (count($aRequestURI) > 0 && end($aRequestURI) == '') {
  array_pop($aRequestURI);
}

$aVars = array();
if (isset($aRequestURI[0]) && !empty($aRequestURI[0])) {
  $sRequestController = $aRequestURI[0];
  array_shift($aRequestURI);
} else {
  $sRequestController = 'home';
}

if (isset($aRequestURI[0]) && !empty($aRequestURI[0])) {
  $aVars['sAction'] = $aRequestURI[0];
  array_shift($aRequestURI);
} else {
  $aVars['sAction'] = 'defaut';
}

/*if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] != true) {
  if ($sRequestController != 'login') {
    header("Location: ".HTML_ROOT_PATH."login/");
  }
}*/

$aVars['aParams'] = $aRequestURI;
$aVars['aGets']   = $_GET;



// Appel du controller correspondant à l'Action detectée et initialisation de la page.
require_once(BASE_PATH.'controller'.DIRECTORY_SEPARATOR.$sRequestController.'Controller.php');
$oTmp        = $sRequestController."Controller";
$oController = new $oTmp($sRequestController, $aVars, $entityManager);


// Chargement des possibles fonctions / variables disponible dans le fichier layoutUtils.php
require_once(BASE_PATH."src/layoutUtils.php");
$oController->setLayoutVars($aLayoutVars);

// Rendu de la page à l'aide de la vue et du controller.
echo $oController;
