<div class="title">
   <div class="container">
      <h1><span class="<?= Config::get('system::Dashboard.iconMultiple') ?>"></span> <?= $title ?></h1>
   </div>
</div>
<div class="container main-content">
    <?= Session::getMessages() ?>
   <div class="bloc m">
      <br>
      <h4><strong><?= __d('system', 'Yup. This is the Dashboard.') ?></strong></h4>
      <p><?= __d('system', 'Someday, we\'ll have widgets and stuff on here...') ?></p>
      <br>
      <br>
   </div>
</div>

