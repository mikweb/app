<div class="container main-content">
   <div class="row">
      <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 margin-big">
          <?php print Session::getMessages() ?>
         <div class="bloc m dp-2">
            <h3 class="text-center">
               <span class="mdi mdi-24px mdi-responsive text-primary"></span> <?= __d('system', 'Reset your password for <b>{0}</b>', SITETITLE) ?>
            </h3>
            <div class="space-v"></div>
            <form method="post" role="form">
               <fieldset>
                  <p><?= __d('system', 'Please enter your e-mail address to be sent a link to reset your password.') ?></p>
                  <div class="form-group">
                     <p><input type="email" name="email" id="email" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('system', 'E-mail') ?>"></p>
                  </div>
                  <?php if (Config::get('reCaptcha.active') === true) : ?>
                     <div class="form-group margin-t oh">
                        <div id="captcha"></div>
                     </div>
                  <?php endif ?>
                  <div class="row margin">
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="submit" class="btn btn-success col-sm-10" value="<?= __d('system', 'Send Reset Link') ?>">
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="<?= site_url('login') ?>" class="btn btn-link pull-right"><?= __d('system', 'Login') ?></a>
                     </div>
                  </div>
               </fieldset>
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>" />
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