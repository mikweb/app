<?php

/**
 * Events - all Module's specific Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */
/** Define Events. */
Event::listen('menu.mainAdmin', function($user) {

   if (is_null($user) || !$user->admin()) {
      return array();
   }

   $items = array(
      array(
         'uri' => 'users',
         'title' => __('Users'),
         'icon' => Config::get('users::config.iconMultiple'),
         'weight' => 200,
      )
   );
   return $items;
});

Event::listen('menu.mainRoot', function($user) {

   if (is_null($user) || !$user->hasRole('root')) {
      return array();
   }

   $items = array(
      array(
         'uri' => 'roles',
         'title' => __('Roles'),
         'icon' => Config::get('users::roles.iconMultiple'),
         'weight' => 100,
      )
   );
   return $items;
});
