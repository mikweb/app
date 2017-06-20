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
         'uri' => 'roles',
         'title' => __d('users', 'Roles'),
         'icon' => 'mdi mdi-account-key',
         'weight' => 200,
      )
   ),
   'main' => array(
      array(
         'uri' => 'roles',
         'title' => __d('roles', 'Roles List'),
         'icon' => 'mdi mdi-account-key',
         'weight' => 100,
      ),
      array(
         'uri' => 'roles/create',
         'title' => __d('roles', 'New Role'),
         'icon' => 'mdi mdi-plus-circle',
         'weight' => 200,
      )
   ),
   'entry' => array(
      array(
         'uri' => 'roles/{id}',
         'title' => __d('roles', 'Show Role'),
         'icon' => 'mdi mdi-eye',
         'weight' => 100,
      ),
      array(
         'uri' => 'roles/{id}/edit',
         'title' => __d('roles', 'Edit Role'),
         'icon' => 'mdi mdi-pencil',
         'weight' => 200,
      )
   )
);
