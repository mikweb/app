<div class="title">
   <div class="container">
      <h1><span class="mdi mdi-eye"></span>  <?= $title ?></h1>
   </div>
</div>
<div class="container">
    <?= Menu::breadcrumb($breadcrumb) ?>
</div>
<div class="container main-content">
    <?= Session::getMessages() ?>
   <div class="bloc">
       <?= Menu::tab($menu, ['id' => $role->id]) ?> 
      <div class="tab-content m">
         <div class="tab-pane fade active in" id="tab-x">
            <dl class="dl-horizontal margin">
               <dt><?= __('ID') ?></dt>
               <dd><?= $role->id ?></dd>
               <dt><?= __('Name') ?></dt>
               <dd><?= __($role->name) ?></dd>
               <dt><?= __('Slug') ?></dt>
               <dd><?= $role->slug ?></dd>
               <dt><?= __('Description') ?></dt>
               <dd><?= $role->description ?></dd>
               <dt><?= __('Created At') ?></dt>
               <dd><?= $role->created_at->formatLocalized('%d %B %Y, %R') ?></dd>
               <dt><?= __('Updated At') ?></dt>
               <dd><?= $role->updated_at->formatLocalized('%d %B %Y, %R') ?></dd>
            </dl>
            <p class="margin-b">
               <a class="btn" href="<?= site_url("roles") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __('Back') ?></a>
            </p>
         </div>
      </div>
   </div>
</div>
