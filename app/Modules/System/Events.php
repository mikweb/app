<?php

/**
 * Events - all Module's specific Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */
/** Define Events. */
Event::listen('menu.mainRoot', function($user) {

   if (is_null($user) || !$user->hasRole('root')) {
      return array();
   }

   $items = array(
      array(
         'uri' => 'settings',
         'title' => __('Settings'),
         'icon' => Config::get('system::config.iconMultiple'),
         'weight' => 200,
      )
   );
   return $items;
});

