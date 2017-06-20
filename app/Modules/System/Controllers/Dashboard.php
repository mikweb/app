<?php

/**
 * Dasboard - Implements a simple Administration Dashboard.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers;

use App\Core\Controller;
use Nova\Helpers\ReCaptcha;
use View;
use Auth;
use Input;
use Redirect;
use Validator;

class Dashboard extends Controller {

   /**
    * Front Page
    * @return type
    */
   public function index() {
      if (Auth::check()) {
         // User is authenticated
         return $this->dashboard();
      } else {
         // User is not logged in
         $css = '<link href="' . theme_url('css/animate.min.css', 'Ntheme') . '" rel="stylesheet" type="text/css">';
         $js = '<script src="' . theme_url('js/wow.min.js', 'Ntheme') . '" type="text/javascript"></script>';

         return $this->getView()
               ->shares('title', __d('system', 'Front'))
               ->shares('css', $css)
               ->shares('js', $js);
      }
   }

   /**
    * Generic Dashboard
    * @return type
    */
   public function dashboard() {
      return View::make('Dashboard/Dashboard', [], 'System')
            ->shares('title', __d('system', 'Dashboard'));
   }

   /**
    * Contact form
    */
   public function contactPost() {

      // Verify the reCAPTCHA
      if (!ReCaptcha::check()) {
         $status = __d('system', 'Invalid reCAPTCHA submitted.');

         return Redirect::back()->withStatus($status, 'danger');
      }

      $input = Input::only('name', 'email', 'message');

      $rules = array(
         'name' => 'required|min:1|max:100',
         'email' => 'required|min:5|max:100|email',
         'message' => 'required|min:1'
      );

      $attributes = array(
         'name' => __('Name'),
         'email' => __('E-mail'),
         'message' => __('Message')
      );

      $validator = Validator::make($input, $rules, [], $attributes);

      if ($validator->passes()) {
         // #################
         // Send the email
         // #################
         return Redirect::back()->withStatus(__('Form Submited'));
      }

      // Errors occurred on Validation.
      $status = $validator->errors();

      return Redirect::back()->withInput()->withStatus($status, 'danger');
   }

}
