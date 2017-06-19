<?php

/**
 * Boostrap : Usefull and Shortcuts
 */

namespace App\Helpers;

class Bs {

   /**
    * Active
    * @param type $a
    * @param type $b
    * @return string
    */
   public static function a($a, $b) {
      if ($a === $b) {
         return ' class="active"';
      }
      return '';
   }

   /**
    * Just Active
    * @param type $a
    * @param type $b
    * @return string
    */
   public static function aMin($a, $b) {
      if ($a === $b) {
         return ' active';
      }
      return '';
   }

   /**
    * Empty
    * @param type $a
    * @return string
    */
   public static function e($a) {
      if (!empty($a) || $a === '0') {
         return ' active';
      }
      return '';
   }

   /**
    * Selected
    * @param type $a
    * @param type $b
    * @return string
    */
   public static function s($a, $b) {
      if ($a === $b) {
         return ' selected="selected"';
      }
      return '';
   }

   /**
    * Checked
    * @param type $a
    * @param type $b
    * @return string
    */
   public static function c($a, $b) {
      if ($a === $b) {
         return ' checked ="checked"';
      }
      return '';
   }

   /**
    * Print array variable
    * @param type $data
    * @param type $exit
    */
   public static function pr($data, $exit = true) {
      echo '<pre>';
      print_r($data);
      echo '</pre>';
      if ($exit == true) {
         exit();
      }
   }

}
