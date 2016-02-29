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

// src/Bridge/File.php

namespace Bridge;

/**
 * File
 *
 * @author      Jean-Baptiste CIEPKA
 * @package     Bridge
 * @subpackage  File
 */
abstract class File
{
  const UPLOAD_DIR = 'in';

  /**
   * @var string
   */
  protected $sFileName;

  /**
   * @var string
   */
  protected $sFilePath;

  /**
   * @var Array 
   */
  protected $aFileParameters;

  public function __construct(array $aFileParameters)
  {
    $this->aFileParameters = $aFileParameters;
  }

  abstract public function prepaFile();

  public function getFileName()
  {
    return $this->sFileName;
  }

  public function getFilePath()
  {
    return $this->sFilePath;
  }

  public function getFilePathAndName()
  {
    return $this->sFilePath.$this->sFileName;
  }
}