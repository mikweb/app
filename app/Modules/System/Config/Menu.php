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
         'uri' => 'settings',
         'title' => __d('system', 'Settings'),
         'icon' => 'mdi mdi-settings-box',
         'weight' => 200,
      )
   ),
   'main' => array(
      array(
         'uri' => 'settings',
         'title' => __d('system', 'Settings'),
         'icon' => 'mdi mdi-settings-box',
         'weight' => 100,
      )
   )
);
