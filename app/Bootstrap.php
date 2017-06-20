<?php
/**
 * Bootstrap - the Application's specific Bootstrap.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

// Handle absolute path to 'assets' folder (FileField)
if (!function_exists('assets_url')) {

   function assets_url($path) {
      return resource_url(str_replace(ROOTDIR . 'assets/', '', $path));
   }

}
