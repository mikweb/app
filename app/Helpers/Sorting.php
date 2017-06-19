<?php

/**
 * Sort Handling
 */

namespace App\Helpers;

use Input;

class Sorting {

   /**
    * 
    * @param type $string
    * @param type $default
    * @return string
    */
   public static function swap($string, $default = 'updated_at,desc') {
      $sort = Input::get('sorting');
      $sort = empty($sort) ? $default : $sort;
      //
      $sortP = explode(',', $sort);
      $stringP = explode(',', $string);
      //
      if (count($sortP) == 2 && count($stringP) == 2 && $sortP[0] == $stringP[0]) {
         if ($sortP[1] == 'desc') {
            return 'asc';
         } else {
            return 'desc';
         }
      }
      return $stringP[1];
   }

   /**
    * 
    * @param type $string
    * @param type $default
    * @return type
    */
   public static function link($string, $default = 'updated_at,desc') {
      //
      $urlString = $_SERVER['QUERY_STRING'];
      //
      $variables = explode('&', $urlString);
      $variablesNew = [];
      foreach ($variables as $v) {
         if (!empty($v) && strpos($v, 'offset') !== 0 && strpos($v, 'sorting') !== 0) {
            $variablesNew[] = $v;
         }
      }
      //
      $stringP = explode(',', $string);
      $variablesNew[] = 'sorting=' . $stringP[0] . ',' . Sorting::swap($string, $default);
      //
      return site_url(trim($_SERVER['REDIRECT_URL'], '/')) . '?' . implode('&', $variablesNew);
   }

   /**
    * 
    * @param type $string
    * @param type $default
    * @return string
    */
   public static function icon($string, $default = 'updated_at,desc') {
      $sort = Input::get('sorting');
      $sort = empty($sort) ? $default : $sort;
      //
      if (!empty($sort)) {
         $sortP = explode(',', $sort);
         if (count($sortP) == 2 && $sortP[0] == $string) {
            if ($sortP[1] == 'asc') {
               return ' <span class="mdi mdi-sort-ascending"></span>';
            } else {
               return ' <span class="mdi mdi-sort-descending"></span>';
            }
         }
      }
      return '';
   }

}
