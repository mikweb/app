<div class="title">
   <div class="container">
      <h1><span class="<?= $page->icon() ?>"></span> <?= $title ?></h1>
   </div>
</div>
<div class="container">
   <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>"><span class="mdi mdi-<?= $logged ? 'gauge' : 'home' ?>"></span></a></li>
      <li><a href="<?= site_url('pages/' . $type . '/latest') ?>"><span class="i <?= $page->icon() ?>"></span><?= __d('pages', Str::title($type . 's')) ?></a></li>
      <li class="active"><a href="<?= site_url('page/' . $page->slug) ?>"><?= $title ?></a></li>
   </ol>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-8 main-content page <?= str_replace(' ', '-', $type) ?>">
          <?= Session::getMessages() ?>
         <div class="bloc">
            <img class="full-width" src="<?= assets_url($page->image) ?>" alt="-">
            <div class="m  margin clearfix">
                <?= $page->content ?>
               <p class=emargin-t"><strong><?= $page->updated_at->formatLocalized('%d %B %Y') ?></strong></p>
            </div>
         </div>
      </div>
      <div class="col-md-4 hidden-xs sidebar">
         <div class="bloc m">
            <img class="margin" src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/><br><hr>
            <img class="margin" src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/><br><hr>
            <img class="margin" src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/><br><hr>
         </div>
      </div>
   </div>
</div>