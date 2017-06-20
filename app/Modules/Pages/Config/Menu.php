<?php

/*
  |--------------------------------------------------------------------------
  | Module Configuration
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the Configuration for the module.
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
         'uri' => 'pages',
         'title' => __d('pages', 'Pages'),
         'icon' => 'mdi mdi-checkbox-multiple-blank',
         'weight' => 200,
      )
   ),
   'main' => array(
      array(
         'uri' => 'pages',
         'title' => __d('pages', 'Pages List'),
         'icon' => 'mdi mdi-checkbox-multiple-blank',
         'weight' => 100,
      ),
      array(
         'uri' => 'pages/create',
         'title' => __d('pages', 'New Page'),
         'icon' => 'mdi mdi-plus-circle',
         'weight' => 200,
      )
   ),
   'entry' => array(
      array(
         'uri' => 'pages/{id}',
         'title' => __d('pages', 'Show Page'),
         'icon' => 'mdi mdi-eye',
         'weight' => 100,
      ),
      array(
         'uri' => 'pages/{id}/edit',
         'title' => __d('pages', 'Edit Page'),
         'icon' => 'mdi mdi-pencil',
         'weight' => 200,
      )
   )
);
