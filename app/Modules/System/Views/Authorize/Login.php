<div class="container main-content">
   <div class="row">
      <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 margin-big">
          <?= Session::getMessages() ?>
         <div class="bloc m dp-2">
            <h3 class="text-center">
               <span class="mdi mdi-24px mdi-responsive text-primary"></span> <?= __d('system', 'Login to <b>{0}</b>', SITETITLE) ?>
            </h3>
            <div class="space-v"></div>
            <form action="<?= site_url("login") ?>" method="post">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>" />
               <div class="form-group has-feedback">
                  <input type="text" name="username" id="username" class="form-control" placeholder="<?= __d('system', 'Username') ?>">
                  <span class="mdi mdi-account form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="password" name="password" id="password" class="form-control" placeholder="<?= __d('system', 'Password') ?>">
                  <span class="mdi mdi-lock form-control-feedback"></span>
               </div>
               <?php if (Config::get('reCaptcha.active') === true) : ?>
                  <div class="form-group margin-t oh">
                     <div id="captcha"></div>
                  </div>
               <?php endif ?>
               <div class="row">
                  <div class="col-xs-7">
                     <div class="checkbox icheck">
                        <label><input name="remember" type="checkbox"> <?= __d('system', 'Remember me') ?></label>
                     </div>
                  </div>
                  <div class="col-xs-5">
                     <button type="submit" class="btn btn-primary btn-block"><?= __d('system', 'Login') ?></button>
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
            <div class="text-center margin">
               <p>- <?= __d('system', 'OR') ?> -</p>
               <a href="#!" class="btn btn-block btn-social btn-facebook"><span class="mdi mdi-facebook"></span><?= __d('system', 'Sign in using Facebook') ?></a>
               <a href="#!" class="btn btn-block btn-social btn-google"><span class="mdi mdi-google-plus"></span><?= __d('system', 'Sign in using Google+') ?></a>
            </div>
            <p><a href="<?= site_url('password/remind') ?>"><span class="mdi mdi-help-circle"></span> <?= __d('system', 'Forgot Password?') ?></a></p>
            <p><a href="<?= site_url('register') ?>"><span class="mdi mdi-account-plus"></span> <?= __d('system', 'Register a new membership') ?></a></p>
         </div>
      </div>
   </div>
</div>
