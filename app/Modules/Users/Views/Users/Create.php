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
            <form class="form-horizontal margin" action="<?= site_url("users") ?>" method="post">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label" for="username"><?= __('Username') ?> <font class="red-dark">*</font></label>
                     <input name="username" id="username" type="text" class="form-control" value="<?= Input::old('username') ?>" placeholder="<?= __('Username') ?>">
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="role"><?= __d('users', 'Role') ?> <font class="red-dark">*</font></label>
                     <select name="role" id="role" class="form-control select2">
                        <option value="" <?php if (empty(Input::old('role'))) print 'selected' ?>><?= __('- Any -') ?></option>
                        <?php foreach ($roles as $role): ?>
                           <option value="<?= $role->id ?>"<?= Bs::s($role->id, Input::old('role')) ?>><?= __d('users', $role->name) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="realname"><?= __('Name and Surname') ?> <font class="red-dark">*</font></label>
                     <input name="realname" id="realname" type="text" class="form-control" value="<?= Input::old('realname') ?>" placeholder="<?= __('Name and Surname') ?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label" for="password"><?= __('Password') ?> <font class="red-dark">*</font></label>
                     <input name="password" id="password" type="password" class="form-control" value="" placeholder="<?= __('Password') ?>">
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="password_confirmation"><?= __('Confirm Password') ?> <font class="red-dark">*</font></label>
                     <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" value="" placeholder="<?= __('Password Confirmation') ?>">
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="email"><?= __('E-mail') ?> <font class="red-dark">*</font></label>
                     <input name="email" id="email" type="text" class="form-control" value="<?= Input::old('email') ?>" placeholder="<?= __('E-mail') ?>">
                  </div>
               </div>
               <p class="clearfix">
                  <font class="red-dark">*</font><?= __('Required field') ?>
               </p>
               <p class="margin-t">
                  <button type="submit" class="btn btn-primary" name="submit"><span class="mdi mdi-check"></span> <?= __('Submit') ?></button>
                  <a class="btn" href="<?= site_url("users") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __('Back') ?></a>
               </p>	
            </form>
         </div>
      </div>
   </div>
</div>
