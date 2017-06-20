<div class="title">
   <div class="container">
      <h1><span class="mdi mdi-eye"></span> <?= $title ?><small> : <?= $page->title ?></small></h1>
   </div>
</div>
<div class="container">
    <?= Menu::breadcrumb($breadcrumb) ?>
</div>
<div class="container main-content">
    <?= Session::getMessages() ?>
   <div class="bloc">
       <?= Menu::tab($menu, ['id' => $page->id]) ?> 
      <div class="tab-content m">
         <div class="tab-pane fade active in" id="tab-x">
            <p class="text-center margin">
               <a href="<?= site_url("page/" . $page->slug) ?>" target="_blank"><span class="mdi mdi-link-variant"></span> <?= __('Open') ?></a>
            </p>
            <dl class="dl-horizontal margin">
               <dt><?= __('ID') ?></dt>
               <dd><?= $page->id ?></dd>               
               <dt><?= __('Author') ?></dt>
               <dd><?= $page->user->username ?></dd>
               <dt><?= __('Type') ?></dt>
               <dd><?= __d('pages', $page->type) ?></dd>
               <dt><?= __d('pages', 'Page Title') ?></dt>
               <dd><?= __($page->title) ?></dd>
               <dt><?= __('Slug') ?></dt>
               <dd><?= $page->slug ?></dd>
               <dt><?= __('Content') ?></dt>
               <dd><?= $page->content ?></dd>
               <dt><?= __('Image') ?></dt>
               <dd><?= $page->image ?></dd>
               <dt><?= __('Language') ?></dt>
               <dd><?= $page->language ?></dd>
               <dt><?= __('Published Date') ?></dt>
               <dd><?= $page->published_date ?></dd>
               <dt><?= __('Visible') ?></dt>
               <dd><?= $page->visible ?></dd>
               <dt><?= __d('pages', 'Front page') ?></dt>
               <dd><?= $page->front ?></dd>
               <dt><?= __('Page Head Title') ?></dt>
               <dd><?= $page->head_title ?></dd>
               <dt><?= __('Page Head Description') ?></dt>
               <dd><?= $page->head_description ?></dd>              
               <dt><?= __('Page Head Image') ?></dt>
               <dd><?= $page->head_image ?></dd>
               <dt><?= __('Created At') ?></dt>
               <dd><?= $page->created_at->formatLocalized('%d %B %Y, %R') ?></dd>
               <dt><?= __('Updated At') ?></dt>
               <dd><?= $page->updated_at->formatLocalized('%d %B %Y, %R') ?></dd> 
            </dl>
            <p class="margin-b">
               <a class="btn" href="<?= site_url("pages") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __('Back') ?></a>
            </p>
         </div>
      </div>
   </div>
</div>
