<div class="container main-content">
   <div class="row">
      <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 margin-big">
          <?= Session::getMessages() ?>
         <div class="bloc m dp-2">
            <h3 class="text-center">
               <span class="mdi mdi-24px mdi-responsive text-primary"></span> <?= __d('system', 'User Registration') ?>
            </h3>
            <div class="space-v"></div>
            <form action="<?= site_url("register") ?>" method="post">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>" />
               <div class="form-group has-feedback">
                  <input  type="text" name="realname" id="realname" class="form-control" placeholder="<?= __('Name and Surname') ?>">
                  <span class="mdi mdi-account form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="text" name="username" id="username" class="form-control" placeholder="<?= __('Username') ?>">
                  <span class="mdi mdi-account form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="text" name="email" id="email" class="form-control" placeholder="<?= __('E-mail') ?>">
                  <span class="mdi mdi-email-outline form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="password" name="password" id="password" class="form-control" placeholder="<?= __('Password') ?>">
                  <span class="mdi mdi-lock form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="<?= __('Password Confirmation') ?>">
                  <span class="mdi mdi-lock form-control-feedback"></span>
               </div>
               <?php if (Config::get('reCaptcha.active') === true) : ?>
                  <div class="form-group margin-t oh">
                     <div id="captcha"></div>
                  </div>
               <?php endif ?>
               <div class="row">
                  <div class="col-xs-8">
                     <div class="checkbox icheck">
                        <label>
                           <input type="checkbox"> <?= __('I agree to the') ?> <a href="<?= site_url("terms") ?>"><?= __('Terms') ?></a>
                        </label>
                     </div>
                  </div>
                  <div class="col-xs-4">
                     <button type="submit" name="submit" class="btn btn-primary btn-block"><?= __('Sign Up') ?></button>
                  </div>
               </div>
            </form>
            <?php if (Config::get('reCaptcha.active') === true) : ?>
               <script type="text/javascript">
                  var captchaCallback = function () {
                      grecaptcha.render('captcha', {'sitekey': '<?= Config::get('reCaptcha.siteKey') ?>'});
                  };
               </script>
               <script src="//www.google.com/recaptcha/api.js?onload=captchaCallback&render=explicit&hl=<?php print LANGUAGE_CODE ?>" async defer></script>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>
