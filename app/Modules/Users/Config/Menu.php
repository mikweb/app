<?php

/**
 * Config - the Module's specific Configuration.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */
return array(
   'breadcrumb' => array(
      array(
         'uri' => '',
         'title' => '',
         'icon' => 'mdi mdi-gauge',
         'weight' => 100,
      ),
      array(
         'uri' => 'users',
         'title' => __d('users', 'Users'),
         'icon' => 'mdi mdi-account-multiple',
         'weight' => 200,
      )
   ),
   'main' => array(
      array(
         'uri' => 'users',
         'title' => __d('users', 'Users List'),
         'icon' => 'mdi mdi-account-multiple',
         'weight' => 100,
      ),
      array(
         'uri' => 'users/create',
         'title' => __d('users', 'New User'),
         'icon' => 'mdi mdi-plus-circle',
         'weight' => 200,
      )
   ),
   'entry' => array(
      array(
         'uri' => 'users/{id}',
         'title' => __d('users', 'Show User'),
         'icon' => 'mdi mdi-eye',
         'weight' => 100,
      ),
      array(
         'uri' => 'users/{id}/edit',
         'title' => __d('users', 'Edit User'),
         'icon' => 'mdi mdi-pencil',
         'weight' => 200,
      )
   )
);
