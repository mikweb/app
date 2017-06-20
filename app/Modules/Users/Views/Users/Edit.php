<div class="title">
   <div class="container">
      <h1><span class="mdi mdi-pencil"></span> <?= $title ?><small> : <?= $user->username ?></small></h1>
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
            <form class="form-horizontal margin" action="<?= site_url('users/' . $user->id) ?>" method="post">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>" />
               <input type="hidden" name="userId" value="<?= $user->id ?>" />
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label" for="username"><?= __d('users', 'Username') ?> <font class="red-dark">*</font></label>
                     <input name="username" id="username" type="text" class="form-control" value="<?= Input::old('username', $user->username) ?>" placeholder="<?= __d('users', 'Username') ?>">
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="role"><?= __('Role') ?> <font class="red-dark">*</font></label>
                     <select name="role" id="role" class="form-control select2">
                         <?php foreach ($roles as $role): ?>
                           <option value="<?= $role->id ?>"<?= Bs::s($role->id, Input::old('role')) ?>><?= __($role->name) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="realname"><?= __d('users', 'Name and Surname') ?> <font class="red-dark">*</font></label>
                     <input name="realname" id="realname" type="text" class="form-control" value="<?= Input::old('realname', $user->realname) ?>" placeholder="<?= __d('users', 'Name and Surname') ?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label" for="password"><?= __d('users', 'Password') ?> <font class="red-dark">*</font></label>
                     <input name="password" id="password" type="password" class="form-control" value="" placeholder="<?= __d('users', 'Password') ?>">
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="password_confirmation"><?= __d('users', 'Confirm Password') ?> <font class="red-dark">*</font></label>
                     <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" value="" placeholder="<?= __d('users', 'Password Confirmation') ?>">
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="email"><?= __d('users', 'E-mail') ?> <font class="red-dark">*</font></label>
                     <input name="email" id="email" type="text" class="form-control" value="<?= Input::old('email', $user->email) ?>" placeholder="<?= __d('users', 'E-mail') ?>">
                  </div>
               </div>
               <p class="clearfix">
                  <font class="red-dark">*</font><?= __d('users', 'Required field') ?>
               </p>
               <p class="margin-t">
                  <button type="submit" class="btn btn-primary" name="submit"><span class="mdi mdi-check"></span> <?= __d('users', 'Save') ?></button>
                  <a class="btn btn-danger modal-delete" href="<?= site_url('users/' . $user->id . '/destroy') ?>"><span class="mdi mdi-delete"></span> <?= __d('users', "Delete User") ?></a>
                  <a class="btn" href="<?= site_url("users") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __d('users', 'Back') ?></a>
               </p>	
            </form>
         </div>
      </div>
   </div>
</div>
