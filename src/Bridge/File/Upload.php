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

// src/Bridge/File/Upload.php

namespace Bridge\File;

use Bridge\File;
use Bridge;

/**
 * File Upload
 *
 * @author      Jean-Baptiste CIEPKA
 * @package     Bridge
 * @subpackage  File
 */
class Upload extends File
{

  public function prepaFile()
  {

    if ($this->aFileParameters['fichierxls']['error'] > 0) {

      switch ($this->aFileParameters['fichierxls']['error']) {
        case UPLOAD_ERR_NO_FILE:
          throw new Bridge\Exception('Fichier manquant.', UPLOAD_ERR_NO_FILE);

          break;
        case UPLOAD_ERR_INI_SIZE:
          throw new Bridge\Exception('Fichier dépassant la taille maximale autorisée par PHP.',
          UPLOAD_ERR_INI_SIZE);

          break;
        case UPLOAD_ERR_FORM_SIZE:
          throw new Bridge\Exception('Fichier dépassant la taille maximale autorisée par le formulaire.',
          UPLOAD_ERR_FORM_SIZE);

          break;
        case UPLOAD_ERR_PARTIAL:
          throw new Bridge\Exception('Fichier transféré partiellement.',
          UPLOAD_ERR_PARTIAL);

          break;
        default:
          throw new Bridge\Exception('Erreur lors de l\'upload.',
          $this->aFileParameters['fichierxls']['error']);
      }
    } else {

      $sFilePath       = BASE_PATH.self::UPLOAD_DIR.DIRECTORY_SEPARATOR;
      $sFileName       = $this->aFileParameters['fichierxls']['name'];
      $resultat        = move_uploaded_file($this->aFileParameters['fichierxls']['tmp_name'],
          $sFilePath.$this->aFileParameters['fichierxls']['name']);
      $this->sFilePath = $sFilePath;
      $this->sFileName = $sFileName;

      return array(
          'response_code' => 200,
          'response_message' => 'Transfert terminé avec succès.');
    }
  }
}