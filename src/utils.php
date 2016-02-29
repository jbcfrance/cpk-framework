<?php
/*

  ---------------------------outils-------------------------------------
  -															 		 -
  - Fonctions diverses utiles dans les pages               			 -
  -																	 -
  ----------------------------------------------------------------------


 */

function read_csv3($filename)
{
  $handle = fopen($filename, "r");

  if ($handle !== FALSE) {
    $i    = 0;
    $dump = array();

    while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) {
      $dump[$i] = $data;
      $i++;
    }
    return $dump;
  }
  return FALSE;
}
?>
