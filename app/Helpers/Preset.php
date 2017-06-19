<?php

/**
 * Images Presets Handling
 */

namespace App\Helpers;

class Preset {

   /**
    * Create image
    * @param type $path
    * @param type $prest
    * @param type $size
    * @return boolean|string
    */
   public static function create($path, $prest, $size) {

      if (file_exists($path)) {
         $path = (string) $path;
         $parts = pathinfo($path);
         $size = explode('x', $size);
         if (count($size) != 2 || !is_numeric($size[0]) || !is_numeric($size[1])) {
            return false;
         }
         $imagick = new \Imagick($path);
         $imagick->setImageFormat("jpg");
         $imagick->thumbnailImage($size[0], $size[1]);
         $new = $parts['dirname'] . '/' . $parts['filename'] . '-preset-' . strtolower($prest) . '.jpg';
         if (file_exists($new)) {
            @unlink($new);
         }
         $imagick->writeImage($new);
         return $new;
      }
      return false;
   }

   /**
    * Remove image
    * @param type $path
    * @param type $prest
    * @return type
    */
   public static function remove($path, $prest) {
      $path = (string) $path;
      $parts = pathinfo($path);
      // Remove image
      $new = $parts['dirname'] . '/' . $parts['filename'] . '-preset-' . strtolower($prest) . '.jpg';
      if (file_exists($new)) {
         return @unlink($new);
      }
   }

   /**
    * Get image for print
    * @param type $path
    * @param type $prest
    * @return string
    */
   public static function get($path, $prest) {
      $path = (string) $path;
      $parts = pathinfo($path);
      $new = $parts['dirname'] . '/' . $parts['filename'] . '-preset-' . strtolower($prest) . '.jpg';
      if (file_exists($new)) {
         return assets_url($new);
      }
      if (file_exists($path)) {
         return assets_url($path);
      }
      return '';
   }

}
