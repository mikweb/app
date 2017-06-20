<div class="title">
   <div class="container">
      <h1><span class="mdi mdi-eye"></span> <?= $title ?><small> : <?= $user->username ?></small></h1>
   </div>
</div>
<div class="container">
    <?= Menu::breadcrumb($breadcrumb) ?>
</div>
<div class="container main-content">
    <?= Session::getMessages() ?>
   <div class="bloc">
       <?= Menu::tab($menu, ['id' => $user->id]) ?> 
      <div class="tab-content m">
         <div class="tab-pane fade active in" id="tab-x">
            <dl class="dl-horizontal margin">
               <dt><?= __('ID') ?></dt>
               <dd><?= $user->id ?></dd>
               <dt><?= __('Username') ?></dt>
               <dd><?= $user->username ?></dd>
               <dt><?= __d('users', 'Role') ?></dt>
               <dd><?= __d('users', $user->role->name) ?></dd>
               <dt><?= __('Name and Surname') ?></dt>
               <dd><?= $user->realname ?></dd>
               <dt><?= __('E-mail') ?></dt>
               <dd><?= $user->email ?></dd>
               <dt><?= __('Created At') ?></dt>
               <dd><?= $user->created_at->formatLocalized('%d %B %Y, %R') ?></dd>
               <dt><?= __('Updated At') ?></dt>
               <dd><?= $user->updated_at->formatLocalized('%d %B %Y, %R') ?></dd>   
            </dl>
            <p class="margin-b">
               <a class="btn" href="<?= site_url("users") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __('Back') ?></a>
            </p>
         </div>
      </div>
   </div>
</div>
