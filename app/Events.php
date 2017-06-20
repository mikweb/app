<?php

/**
 * Events - all standard Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */
/** Define Events. */
// Add a Listener Closure to the Event 'router.matched'.
Event::listen('router.matched', function($route, $request) {
   // Share the Application version.
   $path = ROOTDIR . 'VERSION.txt';

   if (is_readable($path)) {
      $version = trim(file_get_contents($path));
   } else {
      $version = VERSION;
   }

   View::share('version', $version);

   // Share on Views the CSRF Token.
   View::share('csrfToken', Session::token());

   // Url informations
   $uri = $request->path();
   View::share('currentUri', $uri);
   $parts = explode('/', trim($uri, '/'));
   $baseUri = array_shift($parts);
   View::share('baseUri', $baseUri);

   // User informations
   $logged = Auth::check();
   View::share('logged', $logged);
   $user = Auth::user();
   View::share('usr', $user);

   // Language informations
   $languageCode = Language::code();
   View::share('languageCode', $languageCode);
   $languageLinks = [];
   foreach (Config::get('languages') as $code => $info) {
      if ($code != $languageCode) {
         $languageLinks[] = '<li><a href="' . site_url('language/' . $code) . '" title="' . $info['info'] . '">' . $info['name'] . '</li></a>';
      }
   }
   View::share('languageLinks', implode('', $languageLinks));
});

Event::listen('menu.main', function($user) {
   $items = array(
      array(
         'uri' => 'about-app',
         'title' => __('About'),
         'icon' => 'mdi mdi-help-circle',
         'weight' => 100,
      ),
      array(
         'uri' => 'pages/product/latest',
         'title' => __('Products'),
         'icon' => 'mdi mdi-view-list',
         'weight' => 200,
      ),
      array(
         'uri' => 'contact',
         'title' => __('Contact'),
         'icon' => 'mdi mdi-email',
         'weight' => 300,
      )
   );
   return $items;
});

Event::listen('menu.mainOnePage', function($user) {
   $items = array(
      array(
         'uri' => '#about',
         'title' => __('About'),
         'icon' => 'mdi mdi-help-circle',
         'classAnchor' => 's',
         'weight' => 100,
      ),
      array(
         'uri' => '#pages',
         'title' => __('Pages'),
         'icon' => 'mdi mdi-view-list',
         'classAnchor' => 's',
         'weight' => 200,
      ),
      array(
         'uri' => '#contact',
         'title' => __('Contact'),
         'icon' => 'mdi mdi-email',
         'classAnchor' => 's',
         'weight' => 300,
      ),
      array(
         'uri' => '#',
         'title' => '<span class="show-s"> ' . __("More") . '</span>',
         'icon' => 'mdi mdi-dots-horizontal',
         'weight' => 400,
         'childs' => array(
            array(
               'uri' => 'material-design-icons',
               'title' => __('Material Design Icons'),
               'icon' => 'mdi mdi-flag',
               'weight' => 100,
            ),
            array(
               'uri' => 'theme-demos',
               'title' => __('Theme Demos'),
               'icon' => 'mdi mdi-flag',
               'weight' => 200,
            ),
            array(
               'type' => 'divider',
               'weight' => 300,
            ),
            array(
               'uri' => 'about-app',
               'title' => __('About Ntheme'),
               'icon' => 'mdi mdi-help-circle',
               'weight' => 400,
            )
         )
      )
   );
   return $items;
});
