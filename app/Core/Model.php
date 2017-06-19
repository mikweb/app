<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core;

use Nova\Database\ORM\Model as BaseModel;
use Input;

abstract class Model extends BaseModel {

   /**
    * 
    * @param type $query
    * @return type
    */
   public function scopeSorting($query) {
      $sort = Input::get('sorting');
      $sort = empty($sort) ? 'updated_at,desc' : $sort;
      //
      $sortParts = explode(',', $sort);
      if (count($sortParts) == 2) {
         return $query->orderBy($sortParts[0], $sortParts[1]);
      }
      //
      return $query;
   }

   /**
    * 
    * @param type $idx
    * @return string
    */
   public static function slugSuffix($idx) {
      $idx = intval($idx);
      if ($idx == 0) {
         return "";
      } else {
         return "-" . $idx;
      }
   }

}
