<div class="container main-content">
   <div class="row">
      <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 margin-big">
          <?php print Session::getMessages() ?>
         <div class="bloc m dp-2">
            <h3 class="text-center">
               <span class="mdi mdi-24px mdi-responsive text-primary"></span> <?= __d('system', 'Reset your password for <b>{0}</b>', SITETITLE) ?>
            </h3>
            <div class="space-v"></div>
            <form method="post" action="<?= site_url('password/reset') ?>" role="form">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
               <input type="hidden" name="token" value="<?= e($token) ?>">
               <div class="form-group">
                  <p class="margin"><input type="text" name="email" id="email" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('system', 'Insert the current E-Mail') ?>"></p>
               </div>
               <div class="form-group">
                  <p class="margin"><input type="password" name="password" id="password" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('system', 'Insert the new Password') ?>"></p>
               </div>
               <div class="form-group">
                  <p class="margin"><input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('system', 'Verify the new Password') ?>"></p>
               </div>
               <?php if (Config::get('reCaptcha.active') === true) : ?>
                  <div class="form-group margin-t oh">
                     <div id="captcha"></div>
                  </div>
               <?php endif ?>
               <div class="row margin">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <input type="submit" name="submit" class="btn btn-success col-sm-4 pull-right" value="<?= __d('system', 'Send') ?>">
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