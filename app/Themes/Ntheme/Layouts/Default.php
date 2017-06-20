<?php
/*
 * Ntheme Default template
 */
?><!DOCTYPE html>
<html lang="<?= Language::code() ?>">
   <head>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta charset="utf-8">
      <?php if (isset($headRobots)): ?>
         <!-- Robots -->
         <meta name="robots" content="<?= $headRobots ?>">
      <?php endif ?>
      <?php if (isset($headDescription)): ?>
         <!-- Description -->
         <meta name="description" content="<?= $headDescription ?>">
      <?php endif ?>
      <?php if (isset($headImage)): ?>
         <!-- Facebook share image -->
         <meta property="og:image:url" content="<?= $headImage ?>"/>
      <?php endif ?>
      <!-- Author -->
      <meta name="author" content="<?= Config::get('app.name') ?>">
      <!-- Shared meta -->
      <?= isset($meta) ? $meta : '' ?>
      <!-- Page Title -->
      <?php if (isset($headTitle)): ?>
         <title><?= $headTitle ?></title>
      <?php else: ?>
         <title><?= isset($title) ? $title . " | " : '' ?><?= __(Config::get('app.name')) ?></title>
      <?php endif ?>
      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="<?= theme_url('images/favicon.ico', 'Ntheme') ?>">
      <!-- Include CSS -->
      <?php
      Assets::css(array(
         'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
         theme_url('css/materialdesignicons.min.css', 'Ntheme'),
         theme_url('css/bootstrap.min.css', 'Ntheme'),
         theme_url('css/ntheme.css', 'Ntheme'),
         theme_url('css/style.css', 'Ntheme')
      ));
      ?>
      <?php if ($logged): ?>
         <!-- Include members CSS -->
         <?php
         Assets::css(array(
            theme_url('editor/ui/trumbowyg.min.css', 'Ntheme')
         ));
         ?>
      <?php endif ?>
      <!--  Shared CSS -->
      <?= isset($css) ? $css : '' ?>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="default<?= in_array($currentUri, ['', '/']) ? ' front' : '' ?><?= isset($bodyClass) ? ' ' . $bodyClass : '' ?>" id="top" data-spy="scroll" data-target="#navbar">
      <header class="header">
         <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                     <span class="sr-only"><?= __("Toggle navigation") ?></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?= site_url() ?>"><span class="mdi mdi-36px mdi-responsive"></span> <?= __(Config::get('app.name')) ?></a>
               </div>
               <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <?php if ($logged && $usr->admin()): ?>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="mdi mdi-settings"></span><span class="show-s"> <?= __('Administration') ?></span> <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                               <?= Menu::render($menuMainAdmin) ?>
                              <!--                              
                                                            <li<?= Bs::a($baseUri, 'pages') ?>><a href="<?= site_url('pages') ?>"><span class="<?= Config::get('pages::config.iconMultiple') ?>"></span> <?= __('Pages') ?></a></li>
                                                            <li<?= Bs::a($baseUri, 'users') ?>><a href="<?= site_url('users') ?>"><span class="<?= Config::get('users::config.iconMultiple') ?>"></span> <?= __('Users') ?></a></li>
                              -->
                              <?php if ($usr->hasRole('root')): ?>
                                 <li class="divider"></li>
                                 <?= Menu::render($menuMainRoot) ?>
                                 <!--                                 
                                                                  <li<?= Bs::a($baseUri, 'roles') ?>><a href="<?= site_url('roles') ?>"><span class="<?= Config::get('users::roles.iconMultiple') ?>"></span> <?= __('Roles') ?></a></li>
                                                                  <li<?= Bs::a($baseUri, 'settings') ?>><a href="<?= site_url('settings') ?>"><span class="<?= Config::get('system::config.iconMultiple') ?>"></span> <?= __('Settings') ?></a></li>
                                 -->
                              <?php endif ?>
                           </ul>
                        </li>
                     <?php endif ?>
                     <?php if (!$logged && in_array($currentUri, ['', '/'])): ?>
                        <?= Menu::render($menuMainOnePage) ?>
                     <?php else: ?>
                        <?= Menu::render($menuMain) ?>
                     <?php endif ?>

                     <!--                        
                                          <li><a href="#about" class="s"><span class="mdi mdi-help-circle"></span> <?= __("About") ?></a></li>
                                          <li><a href="#pages" class="s"><span class="mdi mdi-view-list"></span> <?= __("Pages") ?></a></li>
                                          <li><a href="#contact" class="s"><span class="mdi mdi-email"></span> <?= __("Contact") ?></a></li>
                                          <li class="dropdown">
                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="mdi mdi-dots-horizontal"></span><span class="show-s"> <?= __("More") ?></span> <span class="caret"></span></a>
                                             <ul class="dropdown-menu">
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Page Module</li>
                                                <li><a href="<?= site_url('pages/product/latest') ?>">Page : Front List</a></li>
                                                <li><a href="<?= site_url('pages') ?>">Page : Back List</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Examples</li>
                                                <li><a href="<?= site_url('theme-demos') ?>">UI Demos</a></li> 
                                                <li><a href="<?= site_url('material-design-icons') ?>">Material Design Icons</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="<?= site_url('about-app') ?>">About Ntheme</a></li> 
                                             </ul>
                                          </li>-->

                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <?php if ($logged): ?>
                        <li class="dropdown show-m<?= Bs::aMin($currentUri, 'profile') ?>">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="<?= assets_url($usr->image) ?>" class="user-img dp-1" alt="">
                              <span class="show-l u-name"><?= $usr->username ?></span>
                           </a>
                           <ul class="dropdown-menu user">
                              <li class="bg-primary m">
                                 <img src="<?= assets_url($usr->image) ?>" class="user-img dp-1" alt="">
                              </li>
                              <li class="text-center m">
                                 <p><?= $usr->realname ?> - <?= __($usr->role->name) ?></p>
                                 <p><small><?= __('Member since {0}', $usr->created_at->formatLocalized('%d %B %Y, %R')) ?></small></p>
                              </li>
                              <li class="divider"></li>
                              <li class="m clearfix">
                                 <div class="pull-left">
                                    <a href="<?= site_url('profile') ?>" class="btn btn-sm btn-default"><?= __('Profile') ?></a>
                                 </div>
                                 <div class="pull-right">
                                    <a href="<?= site_url('logout') ?>" class="btn btn-sm btn-default"><?= __('Sign out') ?></a>
                                 </div>
                              </li>
                           </ul>
                        </li>
                        <li class="hide-m<?= Bs::aMin($currentUri, 'profile') ?>">
                           <a href="<?= site_url('profile') ?>"><span class="mdi mdi-account"></span><span class="show-s"> <?= __('Profile') ?></span></a>
                        </li>
                     <?php else: ?>
                        <li<?= Bs::a($currentUri, 'login') ?>>
                           <a href="<?= site_url('login') ?>"><span class="mdi mdi-account"></span><span class="hidden-sm"> <?= __('Sign In') ?></span></a>
                        </li>
                     <?php endif ?>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $languageCode ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?= $languageLinks ?>
                        </ul>
                     </li>                     
                     <li<?= Bs::a($currentUri, 'search') ?>>
                        <a href="#" type="button" data-toggle="modal" data-target="#search-modal">
                           <span class="mdi mdi-magnify"></span><span class="show-s"> <?= __('Search') ?></span>
                        </a>
                     </li>
                  </ul>
               </div><!--/.nav-collapse -->
            </div>
         </nav>
      </header>
      <main class="main">
          <?= isset($content) ? $content : __('Empty content!') ?>
      </main>
      <hr class="margin-big">
      <footer class="footer">
         <div class="container">
            <div class="row">
               <div class="col-sm-8 margin-big-b center-s">
                  <strong><?= __("Copyright") ?> &copy; <?= date('Y') ?> <a href="<?= site_url() ?>"><?= __(Config::get('app.name')) ?></a> - </strong> <?= __("All rights reserved.") ?>
               </div>
               <div class="col-sm-4 margin-big-b text-right center-s">
                  <a href="<?= site_url() ?>"><span class="mdi mdi-24px mdi-home"></span></a>
                  <a href="#!"><span class="mdi mdi-24px mdi-facebook"></span></a>
                  <a href="#!"><span class="mdi mdi-24px mdi-twitter"></span></a>
                  <span class="space-h"></span>
                  <a href="#top" class="s"><span class="mdi mdi-24px mdi-arrow-up-bold-circle"></span></a>
               </div>
            </div>
         </div>
      </footer>
      <!-- Search Modal -->
      <div id="search-modal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><span class="mdi mdi-magnify"></span> <?= __('Search') ?></h4>
               </div>
               <div class="modal-body">
                  <form action="<?= site_url('search') ?>" method="get" class="form-horizontal">
                     <div class="form-group has-feedback has-clear">
                        <label class="col-sm-3 control-label" for="q"><?= __('Search') ?></label>
                        <div class="col-sm-9">
                           <input class="form-control" id="q" name="q" placeholder="<?= __('Search') ?>" <?php if (isset($q)) : ?> value="<?= $q ?>"<?php endif ?> type="text">
                           <a class="mdi mdi-close form-control-feedback form-control-clear hidden"></a>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-9 col-sm-push-3 margin">
                           <button class="btn btn-primary" type="submit"><span class="mdi mdi-magnify"></span> <?= __('Search') ?></button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="mdi mdi-close"></span> <?= __('Close') ?></button>
               </div>
            </div>
         </div>
      </div>
      <?php if ($logged): ?>
         <!-- Modal Delete Handler -->
         <div id="modal-delete-handler" class="modal fade" role="dialog">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                        <span aria-hidden="true">&times;</span></button>
                     <h4><span class="mdi mdi-delete"></span> <?= __('Delete') ?></h4>
                  </div>
                  <div class="modal-body">
                     <p class="text-center margin"><?= __('Are you sure you want to delete this content?') ?></p>
                  </div>
                  <div class="modal-footer">
                     <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button"><?= __('Cancel') ?></button>
                     <form action="" method="POST">
                        <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>" />
                        <input type="submit" name="button" class="btn btn-danger" value="<?= __('Delete') ?>">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      <?php endif ?>
      <!-- Passe Site URL to JS -->
      <script type="text/javascript"> var siteUrl = '<?= site_url() ?>';</script>
      <?php if (isset($csrfToken)): ?>
         <!-- Passe csrfToken to JS -->
         <script type="text/javascript"> var csrfToken = '<?= $csrfToken ?>';</script>
      <?php endif ?>
      <!-- Include JS -->
      <?php
      Assets::js(array(
         theme_url('js/jquery.min.js', 'Ntheme'),
         theme_url('js/bootstrap.min.js', 'Ntheme'),
         theme_url('js/ntheme.js', 'Ntheme'),
         theme_url('js/script.js', 'Ntheme')
      ));
      ?>
      <?php if ($logged): ?>
         <!-- Include members JS -->
         <?php
         Assets::js(array(
            theme_url('editor/trumbowyg.min.js', 'Ntheme'),
            theme_url('editor/plugins/upload/trumbowyg.upload.min.js', 'Ntheme')
         ));
         ?>
         <script type="text/javascript">
            $('textarea.editor').trumbowyg({
                btnsDef: {
                    image: {
                        dropdown: ['insertImage', 'upload'],
                        ico: 'insertImage'
                    }
                },
                btns: ['viewHTML',
                    '|', 'formatting',
                    '|', 'btnGrp-semantic',
                    '|', 'link',
                    '|', 'image',
                    '|', 'btnGrp-justify',
                    '|', 'btnGrp-lists',
                    '|', 'horizontalRule'],
                plugins: {
                    upload: {
                        serverPath: siteUrl + '/upload', // TODO
                        fileFieldName: 'upload',
                        urlPropertyName: 'data.link'
                    }
                }
            });
         </script>
      <?php endif ?>
      <!--Shared JS -->
      <?= isset($js) ? $js : '' ?>
      <!--Profiler -->
      <?php if (Config::get('app.debug')) : ?>
         <!-- DO NOT DELETE! - Forensics Profiler -->
      <?php endif ?>
   </body>
</html>
