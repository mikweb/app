<?php

/**
 * Users - A Controller for managing the Users Authentication.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\Users\Controllers;

use App\Core\Controller;
use App\Modules\Users\Models\Role;
use App\Modules\Users\Models\User;
use Config;
use Carbon\Carbon;
use Auth;
use Hash;
use Input;
use File;
use Redirect;
use Session;
use Validator;
use View;

class Users extends Controller {

   public function __construct() {
      parent::__construct();

      //
      $this->beforeFilter('@adminUsersFilter');
   }

   /**
    * Method executed before any action.
    */
   protected function before() {
      // Application fefore
      parent::before();

      // Setup breadcrumb 
      $user = Auth::user();
      View::share('breadcrumb', Config::get('users::menu.breadcrumb'));
   }

   protected function validator(array $data, $id = null) {
      if (!is_null($id)) {
         $ignore = ',' . intval($id);

         $required = 'sometimes|required';
      } else {
         $ignore = '';

         $required = 'required';
      }

      // The Validation rules.
      $rules = array(
         'username' => 'required|min:4|max:100|alpha_dash|unique:users,username' . $ignore,
         'role' => 'required|numeric|exists:roles,id',
         'realname' => 'required|min:5|max:100|valid_name',
         'password' => $required . '|confirmed|strong_password',
         'password_confirmation' => $required . '|same:password',
         'email' => 'required|min:5|max:100|email',
         'image' => 'max:1024|mimes:png,jpg,jpeg,gif',
      );

      $messages = array(
         'valid_name' => __d('users', 'The :attribute field is not a valid name.'),
         'strong_password' => __d('users', 'The :attribute field is not strong enough.'),
      );

      $attributes = array(
         'username' => __d('users', 'Username'),
         'role' => __d('users', 'Role'),
         'realname' => __d('users', 'Name and Surname'),
         'password' => __d('users', 'Password'),
         'password_confirmation' => __d('users', 'Password confirmation'),
         'email' => __d('users', 'E-mail'),
         'image' => __d('users', 'Profile Picture'),
      );

      // Add the custom Validation Rule commands.
      Validator::extend('valid_name', function($attribute, $value, $parameters) {
         $pattern = '~^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}$~u';

         return (preg_match($pattern, $value) === 1);
      });

      Validator::extend('strong_password', function($attribute, $value, $parameters) {
         $pattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";

         return (preg_match($pattern, $value) === 1);
      });

      return Validator::make($data, $rules, $messages, $attributes);
   }

   public function index() {
      $reset = FALSE;
      // Username
      $username = Input::get('username');
      $users = User::where('username', 'like', '%' . $username . '%');
      if (!empty($username)) {
         $reset = TRUE;
      }
      // Role
      $role_id = Input::get('role_id');
      if (!empty($role_id)) {
         $users = $users->where('role_id', $role_id);
         $reset = TRUE;
      }
      // Active
      $activated = Input::get('activated');
      if (!empty($activated) || $activated == '0') {
         $users = $users->where('activated', $activated);
         $reset = TRUE;
      }

      $users = $users->sorting()->paginate(25);

      // Add to pager links
      if (!empty($username)) {
         $users->appends('username', $username);
      }
      if (!empty($role_id)) {
         $users->appends('role_id', $role_id);
      }
      if (!empty($activated) || $activated == '0') {
         $users->appends('activated', $activated);
      }

      $roles = Role::all();

      return $this->getView()
            ->shares('title', __d('users', 'Users'))
            ->shares('menu', Config::get('users::menu.main'))
            ->with('users', $users)
            ->with('roles', $roles)
            ->shares('reset', $reset);
   }

   public function create() {
      // Get all available User Roles.
      $roles = Role::all();

      $title = __d('users', 'Create User');
      $breadcrumb = View::shared('breadcrumb');
      $breadcrumb = is_array($breadcrumb) ? $breadcrumb : array();
      array_push($breadcrumb, array(
         'uri' => "users/create",
         'title' => $title,
         'icon' => "mdi mdi-plus-circle",
         'weight' => 900
      ));

      return $this->getView()
            ->shares('title', $title)
            ->shares('breadcrumb', $breadcrumb)
            ->shares('menu', Config::get('users::menu.main'))
            ->with('roles', $roles);
   }

   public function store() {
      // Validate the Input data.
      $input = Input::only('username', 'role', 'realname', 'password', 'password_confirmation', 'email');

      $validator = $this->validator($input);

      if ($validator->passes()) {
         // Encrypt the given Password.
         $password = Hash::make($input['password']);

         // Create a User Model instance.
         User::create(array(
            'username' => $input['username'],
            'password' => $password,
            'role_id' => $input['role'],
            'realname' => $input['realname'],
            'email' => $input['email'],
            'activated' => 1,
         ));

         // Prepare the flash message.
         $status = __d('users', 'The User <b>{0}</b> was successfully created.', $input['username']);

         return Redirect::to('users')->withStatus($status);
      }

      // Errors occurred on Validation.
      $status = $validator->errors();

      return Redirect::back()->withInput()->withStatus($status, 'danger');
   }

   public function show($id) {
      // Get the User Model instance.
      $user = User::find($id);

      if (empty($user)) {
         // There is no User with this ID.
         $status = __d('users', 'User not found: #{0}', $id);

         return Redirect::to('users')->withStatus($status, 'danger');
      }

      $title = __d('users', 'Show User');
      $breadcrumb = View::shared('breadcrumb');
      $breadcrumb = is_array($breadcrumb) ? $breadcrumb : array();
      array_push($breadcrumb, array(
         'uri' => 'users/' . $user->id,
         'title' => $title,
         'icon' => "mdi mdi-eye",
         'weight' => 900
      ));

      return $this->getView()
            ->shares('title', $title)
            ->shares('breadcrumb', $breadcrumb)
            ->shares('menu', Config::get('users::menu.entry'))
            ->with('user', $user);
   }

   public function edit($id) {
      // Get the User Model instance.
      $user = User::find($id);

      if (empty($user)) {
         // There is no User with this ID.
         $status = __d('users', 'User not found: #{0}', $id);

         return Redirect::to('users')->withStatus($status, 'danger');
      }

      // Get all available User Roles.
      $roles = Role::all();

      $title = __d('users', 'Edit User');
      $breadcrumb = View::shared('breadcrumb');
      $breadcrumb = is_array($breadcrumb) ? $breadcrumb : array();
      array_push($breadcrumb, array(
         'uri' => 'users/' . $user->id . '/edit',
         'title' => $title,
         'icon' => "mdi mdi-pencil",
         'weight' => 900
      ));

      return $this->getView()
            ->shares('title', $title)
            ->shares('breadcrumb', $breadcrumb)
            ->shares('menu', Config::get('users::menu.entry'))
            ->with('roles', $roles)
            ->with('user', $user);
   }

   public function update($id) {
      // Get the User Model instance.
      $user = User::find($id);

      if (empty($user)) {
         // There is no User with this ID.
         $status = __d('users', 'User not found: #{0}', $id);

         return Redirect::to('users')->withStatus($status, 'danger');
      }

      // Validate the Input data.
      $input = Input::only('username', 'role', 'realname', 'password', 'password_confirmation', 'email', 'image');

      if (empty($input['password']) && empty($input['password_confirm'])) {
         unset($input['password']);
         unset($input['password_confirmation']);
      }

      $validator = $this->validator($input, $id);

      if ($validator->passes()) {
         $origName = $user->username;

         // Update the User Model instance.
         $user->username = $input['username'];
         $user->role_id = $input['role'];
         $user->realname = $input['realname'];
         $user->email = $input['email'];

         // If a file has been uploaded.
         if (Input::hasFile('image')) {
            $user->image = Input::file('image');
         }

         if (isset($input['password'])) {
            // Encrypt and add the given Password.
            $user->password = Hash::make($input['password']);
         }

         // Save the User information.
         $user->save();

         // Prepare the flash message.
         $status = __d('users', 'The User <b>{0}</b> was successfully updated.', $origName);

         return Redirect::to('users')->withStatus($status);
      }

      // Errors occurred on Validation.
      $status = $validator->errors();

      return Redirect::back()->withInput()->withStatus($status, 'danger');
   }

   public function destroy($id) {
      // Get the User Model instance.
      $user = User::find($id);

      if (empty($user)) {
         // There is no User with this ID.
         $status = __d('users', 'User not found: #{0}', $id);

         return Redirect::to('users')->withStatus($status, 'danger');
      }

      // Destroy the requested User record.
      $user->delete();

      // Prepare the flash message.
      $status = __d('users', 'The User <b>{0}</b> was successfully deleted.', $user->username);

      return Redirect::to('users')->withStatus($status);
   }

   public function search() {

      exit(); // TODO
      // Validation rules
      $rules = array(
         'query' => 'required|min:4|valid_query'
      );

      $messages = array(
         'valid_query' => __d('users', 'The :attribute field is not a valid query string.'),
      );

      $attributes = array(
         'query' => __d('users', 'Search Query'),
      );

      // Add the custom Validation Rule commands.
      Validator::extend('valid_query', function($attribute, $value, $parameters) {
         return (preg_match('/^[\p{L}\p{N}_\-\s]+$/', $value) === 1);
      });

      // Validate the Input data.
      $input = Input::only('query');

      $validator = Validator::make($input, $rules, $messages, $attributes);

      if ($validator->fails()) {
         // Prepare the flash message.
         $status = $validator->errors();

         return Redirect::back()->withStatus($status, 'danger');
      }

      // Search the Records on Database.
      $search = $input['query'];

      $users = User::where('username', 'LIKE', '%' . $search . '%')
         ->orWhere('realname', 'LIKE', '%' . $search . '%')
         ->orWhere('email', 'LIKE', '%' . $search . '%')
         ->get();

      // Prepare the Query for displaying.
      $search = htmlentities($search);

      return $this->getView()
            ->shares('title', __d('users', 'Searching Users for: {0}', $search))
            ->with('search', $search)
            ->with('users', $users);
   }

}
