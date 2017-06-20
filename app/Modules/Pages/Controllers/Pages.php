<?php

/**
 * Pages controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Modules\Pages\Controllers;

use App\Core\Controller;
use App\Modules\Pages\Models\Page;
use App;
use Auth;
use Config;
use Input;
use Redirect;
use Validator;
use Str;
use View;

class Pages extends Controller {

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
      View::share('breadcrumb', Config::get('pages::menu.breadcrumb'));
   }

   /**
    *
    * @param type $id
    * @return type
    */
   public function fetch($slug) {
      $page = Page::
         where('slug', $slug)
         ->where('visible', 'Yes')
         ->where('published_date', '<=', date('Y-m-d H:i:s'))
         ->first();

      if (empty($page)) {
         return App::abort(404, __d('pages', 'Page not found!'));
      }

      return $this->getView()
            ->shares('title', __d('pages', $page->title))
            ->shares('type', $page->type)
            ->shares('page', $page);
   }

   /**
    *
    * @return type
    */
   public function index() {
      $reset = FALSE;
      // Title
      $title = Input::get('title');
      $pages = Page::where('title', 'like', '%' . $title . '%');
      if (!empty($title)) {
         $reset = TRUE;
      }
      // Type
      $type = Input::get('type');
      if (!empty($type)) {
         $pages = $pages->where('type', $type);
         $reset = TRUE;
      }
      // Visible
      $visible = Input::get('visible');
      if (!empty($visible)) {
         $pages = $pages->where('visible', $visible);
         $reset = TRUE;
      }
      // Language
      $language = Input::get('language');
      if (!empty($language)) {
         $pages = $pages->where('language', $language);
         $reset = TRUE;
      }

      $pages = $pages->sorting()->paginate(25);

      // Add to pager links
      if (!empty($title)) {
         $pages->appends('title', $title);
      }
      if (!empty($type)) {
         $pages->appends('type', $type);
      }
      if (!empty($visible)) {
         $pages->appends('visible', $visible);
      }
      if (!empty($language)) {
         $pages->appends('language', $language);
      }

      return $this->getView()
            ->shares('title', __d('pages', 'Pages'))
            ->shares('menu', Config::get('pages::menu.main'))
            ->shares('pages', $pages)
            ->shares('reset', $reset);
   }

   /**
    *
    * @return type
    */
   public function latest($type) {
      $pages = Page::where('visible', 'Yes')
            ->where('published_date', '<=', date('Y-m-d H:i:s'))
            ->where('type', $type)
            ->orderBy('updated_at', 'desc')->paginate(12);


      return $this->getView()
            ->shares('title', __d('pages', Str::title($type . 's')))
            ->shares('type', $type)
            ->shares('icon', Page::pageIcon($type))
            ->shares('pages', $pages)
            ->shares('articles', Page::latestBloc('article'));
   }

   /**
    *
    * @return type
    */
   public function create() {

      $title = __d('pages', 'New Page');
      $breadcrumb = View::shared('breadcrumb');
      $breadcrumb = is_array($breadcrumb) ? $breadcrumb : array();
      array_push($breadcrumb, array(
         'uri' => "pages/create",
         'title' => $title,
         'icon' => "mdi mdi-plus-circle",
         'weight' => 900
      ));

      return $this->getView()
            ->shares('title', $title)
            ->shares('breadcrumb', $breadcrumb)
            ->shares('menu', Config::get('pages::menu.main'));
   }

   /**
    *
    * @param type $section
    * @return type
    */
   public function store($section = null) {
      $input = Input::only('type', 'title', 'content');
      $validate = $this->validator($input);

      if ($validate->passes()) {
         // Save
         $page = new Page();
         $page->user_id = Auth::user()->id;
         $page->type = Input::get('type');
         $page->title = Input::get('title');
         $page->slug = Page::getSlug($page->title);
         $page->content = Input::get('content');
         $page->image = Input::hasFile('image') ? Input::file('image') : NULL;
         $page->language = Input::get('language');
         $page->visible = Input::get('visible');
         $page->front = Input::get('front');
         $page->published_date = Input::get('published_date');
         $page->head_title = Input::get('head_title');
         $page->head_description = Input::get('head_description');
         $page->head_image = Input::hasFile('head_image') ? Input::file('head_image') : NULL;
         $page->save();

         return Redirect::to('page/' . $page->slug)->withStatus(__d('pages', 'Page Created'));
      }

      return Redirect::to('pages/create')->withStatus($validate->errors(), 'danger')->withInput();
   }

   /**
    *
    * @return type
    */
   public function show($id) {
      $page = Page::find($id);

      if (empty($page)) {
         $status = __d('pages', 'Page not found: #{0}', $id);
         return Redirect::to('pages')->withStatus($status, 'danger');
      }

      $title = __d('pages', 'Show Page');
      $breadcrumb = View::shared('breadcrumb');
      $breadcrumb = is_array($breadcrumb) ? $breadcrumb : array();
      array_push($breadcrumb, array(
         'uri' => 'pages/' . $page->id,
         'title' => $title,
         'icon' => "mdi mdi-eye",
         'weight' => 900
      ));

      return $this->getView()
            ->shares('title', $title)
            ->shares('breadcrumb', $breadcrumb)
            ->shares('menu', Config::get('pages::menu.entry'))
            ->shares('page', $page);
   }

   /**
    *
    * @return type
    */
   public function edit($id) {
      $page = Page::find($id);

      if (empty($page)) {
         return Redirect::to('/')->withStatus(__d('pages', 'Page not found!'), 'danger');
      }

      $title = __d('pages', 'Edit Page');
      $breadcrumb = View::shared('breadcrumb');
      $breadcrumb = is_array($breadcrumb) ? $breadcrumb : array();
      array_push($breadcrumb, array(
         'uri' => 'pages/' . $page->id . '/edit',
         'title' => $title,
         'icon' => "mdi mdi-pencil",
         'weight' => 900
      ));

      return $this->getView()
            ->shares('title', $title)
            ->shares('breadcrumb', $breadcrumb)
            ->shares('menu', Config::get('pages::menu.entry'))
            ->shares('page', $page);
   }

   /**
    *
    * @param type $id
    * @return type
    */
   public function update($id) {
      $page = Page::find($id);

      if (empty($page)) {
         return App::abort(404, __d('pages', 'Page not found!'));
      }

      $input = Input::only('title', 'content');

      $validate = $this->validator($input);

      if ($validate->passes()) {

         // Update
         $page->user_id = Auth::user()->id;
         $page->type = Input::get('type');
         $page->title = Input::get('title');
         $page->slug = Page::getSlug($page->title);
         $page->content = Input::get('content');
         $page->image = Input::hasFile('image') ? Input::file('image') : $page->image;
         $page->language = Input::get('language');
         $page->visible = Input::get('visible');
         $page->front = Input::get('front');
         $page->published_date = Input::get('published_date');
         $page->head_title = Input::get('head_title');
         $page->head_description = Input::get('head_description');
         $page->head_image = Input::hasFile('head_image') ? Input::file('head_image') : $page->head_image;

         $page->save();

         return Redirect::to('page/' . $page->slug)->withStatus(__d('pages', 'Page Updated'));
      }

      return Redirect::to('page/' . $page->id . '/edit')->withStatus($validate->errors(), 'danger')->withInput();
   }

   /**
    *
    * @param type $id
    * @return type
    */
   public function destroy($id) {
      $page = Page::find($id);

      if (empty($page)) {
         return Redirect::to('/')->withStatus(__d('pages', 'Page not found!'), 'danger');
      }

      $page->delete();

      return Redirect::to('/')->withStatus(__d('pages', 'Page Deleted'));
   }

   /**
    *
    * @param type $data
    * @return type
    */
   protected function validator($data) {
      $rules = [
         'type' => 'required',
         'title' => 'required',
         'content' => 'required'
      ];

      $attributes = [
         'type' => __d('pages', 'Page Type'),
         'title' => __d('pages', 'Page Title'),
         'content' => __d('pages', 'Page Content')
      ];

      return Validator::make($data, $rules, [], $attributes);
   }

   /**
    * 
    * @return type
    */
   public function materialDesignIcons() {
      return $this->getView()
            ->shares('title', __d('pages', 'Material Design Icons'));
   }

   /**
    * 
    * @return type
    */
   public function themeDemos() {
      return $this->getView()
            ->shares('title', __d('pages', 'User Interface Demos'));
   }

   /**
    * 
    * @return type
    */
   public function aboutApp() {
      return $this->getView()
            ->shares('title', __d('pages', 'Ntheme - Better Bootstrap Material Design'));
   }

}
