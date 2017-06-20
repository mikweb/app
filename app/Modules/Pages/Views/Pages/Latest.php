<div class="title">
   <div class="container">
      <h1><span class="<?= $icon ?>"></span> <?= $title ?></h1>
   </div>
</div>
<div class="container">
   <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>"><span class="mdi mdi-<?= $logged ? 'gauge' : 'home' ?>"></span></a></li>
      <li class="active"><a href="<?= site_url('pages/' . $type . '/latest') ?>"><span class="i <?= $icon ?>"></span><?= __d('pages', $type . 's') ?></a></li>
   </ol>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-8 main-content page <?= $type ?>">
          <?= Session::getMessages() ?>

         <div class="nlist dp-1 m">
             <?php foreach ($pages as $row): ?>
               <div class="item clearfix">
                  <a href="<?= site_url("page/" . $row->slug) ?>" class="img dp-1">
                     <img src="<?= Preset::get($row->image, 'thumbnail') ?>" alt="-">
                     <div class="img-date"><?= $row->updated_at->formatLocalized('%d %B %Y') ?></div>
                  </a>
                  <div class="item-content">
                     <h4><a href="<?= site_url("page/" . $row->slug) ?>"><?= Str::title($row->title) ?></a></h4>
                     <p><?= Str::limit(strip_tags($row->content), 120) ?> <a class="more" href="<?= site_url("page/" . $row->slug) ?>"><span class="mdi mdi-plus-circle-outline"></span> <?= __('Read more') ?></a></p>
                  </div>
               </div>
            <?php endforeach ?>
         </div>


      </div>
      <div class="col-md-4 hidden-xs sidebar">

         <div class="bloc">
            <h4 class="bloc-title"><span class="<?= App\Modules\Pages\Models\Page::pageIcon('article') ?>"></span> <?= __('articles') ?></h4>
            <div class="nbloc">
               <div class="m">
                   <?php foreach ($articles as $row): ?>
                     <div class="item clearfix">
                        <a href="<?= site_url("page/" . $row->slug) ?>" class="img dp-1">
                           <img src="<?= Preset::get($row->image, 'thumbnail') ?>" alt="-">
                        </a>
                        <div class="item-content">
                           <a class="ttl" href="<?= site_url("page/" . $row->slug) ?>"><?= Str::limit(Str::title($row->title), 44) ?></a>
                           <p><?= $row->updated_at->formatLocalized('%d %B %Y') ?></p>
                        </div>
                     </div>
                  <?php endforeach ?>
                  <div class="more"><a href="<?= site_url("pages/article/latest") ?>"><span class="mdi mdi-plus-circle-outline"></span> <?= __('More') ?></a></div>
               </div>
            </div>
         </div>

         <div class="bloc m">
            <img class="margin" src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/><br><hr>
            <img class="margin" src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/><br><hr>
            <img class="margin" src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/><br><hr>
         </div>
      </div>
   </div>
</div>