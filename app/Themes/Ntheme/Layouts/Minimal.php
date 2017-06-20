<?php
/*
 * Ntheme Minimal template
 */
?><!DOCTYPE html>
<html lang="<?= Language::code() ?>">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="<?= Config::get('app.name') ?>">
      <meta name="author" content="<?= Config::get('app.name') ?>">
      <link rel="icon" href="<?= theme_url('images/favicon.ico', 'Ntheme') ?>">
      <title><?= isset($title) ? $title . " | " : '' ?><?= __(Config::get('app.name')) ?></title>
      <?php
      Assets::css(array(
         'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
         theme_url('css/materialdesignicons.min.css', 'Ntheme'),
         theme_url('css/bootstrap.min.css', 'Ntheme'),
         theme_url('css/ntheme.css', 'Ntheme'),
         theme_url('css/style.css', 'Ntheme')
      ));
      ?>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" href="<?= site_url() ?>"><span class="mdi mdi-36px mdi-responsive"></span> <?= __(Config::get('app.name')) ?></a>
            </div>
         </div>
      </nav>
      <main class="main">
          <?= isset($content) ? $content : __('Empty content!') ?>
      </main>
      <hr class="margin-big">
      <footer class="footer">
         <div class="container">
            <div class="margin-big-b center-s">
               <strong><?= __("Copyright") ?> &copy; <?= date('Y') ?> <a href="<?= site_url() ?>"><?= __(Config::get('app.name')) ?></a> - </strong> <?= __("All rights reserved.") ?>
            </div>
         </div>
      </footer>
      <?php if (isset($csrfToken)): ?>
         <script type="text/javascript"> var csrfToken = '<?= $csrfToken ?>';</script>
      <?php endif ?>
      <?php
      Assets::js(array(
         theme_url('js/jquery.min.js', 'Ntheme'),
         theme_url('js/bootstrap.min.js', 'Ntheme'),
         theme_url('js/ntheme.js', 'Ntheme'),
         theme_url('js/script.js', 'Ntheme')
      ));
      ?>
   </body>
</html>
