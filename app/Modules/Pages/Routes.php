<?php

/*
  |--------------------------------------------------------------------------
  | Module Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for the module.
  | It's a breeze. Simply tell Nova the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

/** Define static routes. */
// The Page CRUD.
Route::get('page/{slug}', array('before' => '', 'uses' => 'Pages@fetch'));
Route::get('pages', array('before' => 'manage', 'uses' => 'Pages@index'));
Route::get('pages/create', array('before' => 'manage', 'uses' => 'Pages@create'));
Route::post('pages', array('before' => 'manage|csrfCustom', 'uses' => 'Pages@store'));
Route::get('pages/{id}', array('before' => 'manage', 'uses' => 'Pages@show'));
Route::get('pages/{id}/edit', array('before' => 'manage', 'uses' => 'Pages@edit'));
Route::post('pages/{id}', array('before' => 'manage|csrfCustom', 'uses' => 'Pages@update'));
Route::post('pages/{id}/destroy', array('before' => 'manage|csrfCustom', 'uses' => 'Pages@destroy'));
Route::get('pages/{type}/latest', array('before' => '', 'uses' => 'Pages@latest'));

// *REMOVE_ON_PRODUCTION*
Route::get('material-design-icons', array('before' => '', 'uses' => 'Pages@materialDesignIcons'));
Route::get('theme-demos', array('before' => '', 'uses' => 'Pages@themeDemos'));
Route::get('about-app', array('before' => '', 'uses' => 'Pages@aboutApp'));
// *\REMOVE_ON_PRODUCTION*
