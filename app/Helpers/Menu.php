<?php
/**
 * Menus Rendering: Unwrap, Tab, and Nav ...
 *
 * Menu Convention Example       
  array(
  ///////'uri' => '#contact',
  ///////'external' => false,
  ///////'title' => __('Contact'),
  ///////'icon' => 'mdi mdi-email',
  ///////'class' => '',
  ///////'attr' => '',
  ///////'classAnchor' => 's',
  ///////'attrAnchor' => '',
  ///////'weight' => 300,
  ///////'childs' => array()
  )
  array(
  'type' => 'divider',
  'weight' => 300,
  )

  Options:
 * type : bootsrap, plain (default: bootsrap)
 * child : true for child-menu (default: false)
 * attr : wrapper extra HTML tag attributes
 * class : wrapper extra CSS classes


 * 
 * 
 */

namespace App\Helpers;

use Request;

class Menu {

   public static $defaultOptions = array(
      'type' => 'bootsrap',
      'base' => false,
      'child' => false,
      'attr' => '',
      'class' => ''
   );

   /**
    * 
    * @param type $menu
    * @param type $replacements
    * @param type $options
    */
   public static function render($menu, $replacements = [], $options = []) {
      // Check empty
      if (empty($menu)) {
         return;
      }
      // Merge options with default
      $options = array_merge(Menu::$defaultOptions, $options);
      // Clone options for child.
      $optionsChild = $options;
      $optionsChild['child'] = true;
      $optionsChild['attr'] = '';
      $optionsChild['class'] = '';
      // Compare uri
      $uri = Request::path();
      if ($options['base']) {
         $parts = explode('/', trim($uri, '/'));
         $uri = array_shift($parts);
      }
      // Replacements
      foreach ($replacements as $k => $v) {
         foreach ($menu as $key => $value) {
            $menu[$key]['uri'] = str_replace('{' . $k . '}', $v, $value['uri']);
         }
      }
      // Sort by weight
      $menu = array_sort($menu, function($value) {
         return (isset($value['weight']) ? $value['weight'] : '999') . ' - ' . (isset($value['title']) ? $value['title'] : '');
      });
      //
      if ($options['type'] == 'bootsrap') {
         // Bootstrap
         if ($options['child']) {
            print '<ul class="dropdown-menu">';
         }
         // Loop
         foreach ($menu as $key => $row) {
            //
            if (isset($row['type']) && $row['type'] == 'divider') {
               print '<li role="separator" class="divider"></li>';
               continue;
            }
            //
            $link = (isset($row['external']) && $row['external']) ? $row['uri'] : Menu::anchorURL($row['uri']);
            //   
            $title = (isset($row['title']) && !empty($row['title'])) ? ' ' . $row['title'] : '';
            //
            $active = ($uri == $row['uri']) ? 'active' : '';
            //
            $class = isset($row['class']) ? ' ' . $row['class'] : '';
            //
            $attr = isset($row['attr']) ? ' ' . $row['attr'] : '';
            //
            $classAnchor = isset($row['classAnchor']) ? ' ' . $row['classAnchor'] : '';
            //
            $attrAnchor = isset($row['attrAnchor']) ? ' ' . $row['attrAnchor'] : '';
            //
            $icon = isset($row['icon']) ? $row['icon'] : '';
            //
            if (isset($row['childs'])) {
               $title .= ' <span class="caret"></span>';
               $class .= ' dropdown';
               $classAnchor .= ' dropdown-toggle';
               $attrAnchor .= ' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';
            }
            //
            print '<li class="' . $active . $class . '"' . $attr . '>';
            print '<a href="' . $link . '" class="' . $classAnchor . '" ' . $attrAnchor . '>';
            print '<span class="' . $icon . '"></span> ' . $title;
            print '</a>';
            print isset($row['childs']) ? Menu::render($row['childs'], $replacements, $optionsChild) : '';
            print '</li>';
         }
         if ($options['child']) {
            print '</ul>';
         }
      } else {
         // Plain
         if ($options['child']) {
            print '<ul class="menu-child">';
         }
         // Loop
         foreach ($menu as $key => $row) {
            //
            if (isset($row['type']) && $row['type'] == 'divider') {
               print '<li role="separator" class="divider"></li>';
               continue;
            }
            //
            $link = (isset($row['external']) && $row['external']) ? $row['uri'] : Menu::anchorURL($row['uri']);
            //   
            $title = (isset($row['title']) && !empty($row['title'])) ? ' ' . $row['title'] : '';
            //
            $active = ($row['uri'] == $uri) ? 'active' : '';
            //
            $class = isset($row['class']) ? ' ' . $row['class'] : '';
            //
            $attr = isset($row['attr']) ? ' ' . $row['attr'] : '';
            //
            $classAnchor = isset($row['classAnchor']) ? ' ' . $row['classAnchor'] : '';
            //
            $attrAnchor = isset($row['attrAnchor']) ? ' ' . $row['attrAnchor'] : '';
            //
            $icon = isset($row['icon']) ? $row['icon'] : '';
            //
            print '<li class="' . $active . $class . '"' . $attr . '>';
            print '<a href="' . $link . '" class="' . $classAnchor . '" ' . $attrAnchor . '>';
            print '<span class="' . $icon . '"></span> ' . $title;
            print '</a>';
            print isset($row['childs']) ? Menu::render($row['childs'], $replacements, $optionsChild) : '';
            print '</li>';
         }
         if ($options['child']) {
            print '</ul>';
         }
      }
   }

   /**
    * 
    * @param type $menu
    * @param type $replacements
    * @param type $options
    */
   public static function tab($menu, $replacements = [], $options = []) {
      if (empty($menu)) {
         return;
      }
      $options = array_merge(Menu::$defaultOptions, $options);
      //
      $class = isset($options['class']) ? ' ' . $options['class'] : '';
      //
      $attr = isset($options['attr']) ? ' ' . $options['attr'] : '';
      ?>
      <ul class="nav nav-tabs<?= $class ?>"<?= $attr ?>>
          <?= Menu::render($menu, $replacements, $options) ?>
      </ul>
      <?php
   }

   /**
    * 
    * @param type $menu
    * @param type $replacements
    * @param type $options
    */
   public static function breadcrumb($menu, $replacements = [], $options = []) {
      if (empty($menu)) {
         return;
      }
      $options = array_merge(Menu::$defaultOptions, $options);
      //
      $class = isset($options['class']) ? ' ' . $options['class'] : '';
      //
      $attr = isset($options['attr']) ? ' ' . $options['attr'] : '';
      ?>
      <ol class="breadcrumb"<?= $class ?>"<?= $attr ?>>
         <?= Menu::render($menu, $replacements, $options) ?>
      </ol>
      <?php
   }

   /**
    * 
    * @param type $menu
    * @param type $replacements
    * @param type $options
    */
   public static function actions($menu, $replacements = [], $options = []) {
      if (empty($menu)) {
         return;
      }
      $options = array_merge(Menu::$defaultOptions, $options);
      //
      $class = isset($options['class']) ? ' ' . $options['class'] : '';
      //
      $attr = isset($options['attr']) ? ' ' . $options['attr'] : '';
      ?>
      <ul class="<?= $class ?>"<?= $attr ?>>
          <?= Menu::render($menu, $replacements, $options) ?>
      </ul>
      <?php
   }

   /**
    * 
    * @param type $uri
    * @return type
    */
   public static function anchorURL($uri) {
      if (strpos($uri, '#') === 0) {
         return $uri;
      }
      return site_url($uri);
   }

}
