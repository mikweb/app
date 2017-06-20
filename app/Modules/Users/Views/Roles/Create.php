<div class="title">
   <div class="container">
      <h1><span class="mdi mdi-plus-circle"></span> <?= $title ?></h1>
   </div>
</div>
<div class="container">
    <?= Menu::breadcrumb($breadcrumb) ?>
</div>
<div class="container main-content">
    <?= Session::getMessages() ?>
   <div class="bloc">
       <?= Menu::tab($menu) ?>
      <div class="tab-content m">
         <div class="tab-pane fade active in" id="tab-x">
            <form class="form-horizontal margin" action="<?= site_url("roles") ?>" method="post">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="name"><?= __('Name') ?> <font class="red-dark">*</font></label>
                  <div class="col-sm-9">
                     <input name="name" id="name" type="text" class="form-control" value="<?= Input::old('name') ?>" placeholder="<?= __('Name') ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="slug"><?= __('Slug') ?> <font class="red-dark">*</font></label>
                  <div class="col-sm-9">
                     <input name="slug" id="slug" type="text" class="form-control" value="<?= Input::old('slug') ?>" placeholder="<?= __('Slug') ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="description"><?= __('Description') ?> <font class="red-dark">*</font></label>
                  <div class="col-sm-9">
                     <input name="description" id="description" type="text" class="form-control" value="<?= Input::old('description') ?>" placeholder="<?= __('Description') ?>">
                  </div>
               </div>
               <p class="clearfix">
                  <font class="red-dark">*</font><?= __('Required field') ?>
               </p>
               <p class="margin-t">
                  <button type="submit" class="btn btn-primary" name="submit"><span class="mdi mdi-check"></span> <?= __('Submit') ?></button>
                  <a class="btn" href="<?= site_url("roles") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __('Back') ?></a>
               </p>
            </form>
         </div>
      </div>
   </div>
</div>
