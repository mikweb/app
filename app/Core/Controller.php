<?php

/**
 * Controller - A backend Controller for the included example Modules.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Core;

use Nova\Http\Request;
use Nova\Routing\Route;
use Nova\Support\Facades\Auth;
use Nova\Support\Facades\Config;
use Nova\Support\Facades\Event;
use Nova\Support\Facades\Redirect;
use Nova\Support\Facades\View;
use App\Core\AppController;

abstract class Controller extends AppController {

   /**
    * A Before Filter which permit the access to Administrators.
    */
   public function adminUsersFilter(Route $route, Request $request, $guard = null) {
      $guard = $guard ?: Config::get('auth.defaults.guard', 'web');

      // Check the User Authorization.
      $user = Auth::guard($guard)->user();

      $status = __('You are not authorized to access this resource.');

      if (!is_null($user) && !$user->admin()) {
         $status = __('You are not authorized to access this resource.');
         return Redirect::to('admin/dashboard')->withStatus($status, 'warning');
      }

      //if (is_null($user)) {
      //   return Redirect::to('login')->withStatus($status, 'warning');
      //} elseif (!$user->admin()) {
      //   return Redirect::to('/')->withStatus($status, 'warning');
      //}
   }

   /**
    * Method executed before any action.
    */
   protected function before() {
      // Setup the Menus
      $user = Auth::user();

      View::share('menuMain', $this->getMenuItems($user, 'menu.main'));
      View::share('menuMainOnePage', $this->getMenuItems($user, 'menu.mainOnePage'));
      View::share('menuMainAdmin', $this->getMenuItems($user, 'menu.mainAdmin'));
      View::share('menuMainRoot', $this->getMenuItems($user, 'menu.mainRoot'));
   }

   protected function getMenuItems($user, $menuName) {

      //if (is_null($user)) {
      //   // The User is not authenticated.
      //   return array();
      //}
      // Prepare the Event payload.
      $payload = array($user);

      // Fire the Event 'backend.menu' and store the results.
      $results = Event::fire($menuName, $payload);

      // Merge all results on a menu items array.
      $items = array();

      foreach ($results as $result) {
         if (is_array($result) && !empty($result)) {
            $items = array_merge($items, $result);
         }
      }

      // Sort the menu items by their weight and title.
      $items = array_sort($items, function($value) {
         return $value['weight'] . ' - ' . (isset($value['title']) ? $value['title'] : '');
      });

      return $items;
   }

}
