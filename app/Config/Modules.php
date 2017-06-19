<?php

/**
 * Active Modules
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */
return array(
   //--------------------------------------------------------------------------
   // Path to Modules
   //--------------------------------------------------------------------------

   'path' => APPDIR . 'Modules',
   //--------------------------------------------------------------------------
   // Modules Base Namespace
   //--------------------------------------------------------------------------
   'namespace' => 'App\Modules\\',
   //--------------------------------------------------------------------------
   // Path to Cache
   //--------------------------------------------------------------------------
   'cache' => STORAGE_PATH . 'modules.php',
   //--------------------------------------------------------------------------
   // Registered Modules
   //--------------------------------------------------------------------------
   'modules' => array(
      'system' => array(
         'name' => 'Modules/System',
         'basename' => 'System',
         'enabled' => true,
         'order' => 8001,
      ),
      'users' => array(
         'name' => 'Modules/Users',
         'basename' => 'Users',
         'enabled' => true,
         'order' => 9001,
      ),
      'pages' => array(
         'name' => 'Modules/Pages',
         'basename' => 'Pages',
         'enabled' => true,
         'order' => 2001,
      )
   ),
);
