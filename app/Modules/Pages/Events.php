<?php

/*
  |--------------------------------------------------------------------------
  | Module Events
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the Events for the module.
 */

Event::listen('menu.mainAdmin', function($user) {

   if (is_null($user) || !$user->admin()) {
      return array();
   }

   $items = array(
      array(
         'uri' => 'pages',
         'title' => __('Pages'),
         'icon' => Config::get('pages::config.iconMultiple'),
         'weight' => 100,
      )
   );
   return $items;
});

