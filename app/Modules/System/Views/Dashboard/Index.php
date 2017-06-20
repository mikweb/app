<?php
/**
 * Front page
 */
?>
<div class="container"><?= Session::getMessages() ?></div>
<div class="slider jumbotron dp-1 r">
   <div id="slider"></div>
   <div class="container">
      <h1><?= __d('system', 'Hello, world!') ?></h1>
      <p><?= __d('system', 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and many supporting pieces of content. Use it as a starting point to create something more unique.') ?></p>
      <p><a class="btn btn-primary btn-lg s" href="#about" role="button"><span class="mdi mdi-plus-circle-outline"></span> <?= __('Learn more') ?></a></p>
   </div>
</div>
<div class="about margin-big-t dp-1 r">
   <div id="about" class="anchor"></div>
   <div class="container">
      <h1 class="max text-center"><?= __d('system', 'About') ?></h1>
      <div class="row">
         <div class="col-sm-6 text-center margin-big-b wow fadeIn" data-wow-delay="0.3s">
            <img src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-" class="margin"/>
         </div>
         <div class="col-sm-6 margin-big-b wow fadeInUp">
            <h1><?= __d('system', 'Nullam eget ante malesua') ?></h1>
            <p class="lead"><?= __d('system', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lectus purus, lobortis at metus eu, condimentum ornare erat. Vivamus vel turpis aliquet, auctor risus at, ultrices diam. Sed euismod turpis eu diam iaculis.') ?></p>
            <p class="lead"><?= __d('system', 'Maecenas vestibulum vitae eros eu ultricies. Nunc ultrices orci finibus augue bibendum vestibulum. Sed fermentum nisl vel urna lobortis') ?></p>
         </div>
      </div>
   </div>
</div>
<div class="pages margin-big-t dp-1 r">
   <div id="pages" class="anchor"></div>
   <div class="container">
      <h1 class="max text-center"><?= __d('system', 'Pages') ?></h1>
      <div class="row">
         <div class="col-sm-4 margin-big-b wow fadeInUp" data-wow-delay="0.0s">
            <div class="text-center margin"><img src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/></div>
            <h2 class="text-center margin-b"><?= __d('system', 'Morbi rutrum arcu consectetur') ?></h2>
            <p class="lead text-justify"><?= __d('system', 'Fusce fringilla consectetur augue, nec maximus erat molestie et. Proin quis ligula scelerisque, tristique arcu sed, lobortis ante.') ?></p>
            <p class="text-center"><a class="btn btn-primary" href="#!" role="button"><span class="mdi mdi-plus-circle-outline"></span> <?= __('View details') ?></a></p>
         </div>
         <div class="col-sm-4 margin-big-b wow fadeInUp" data-wow-delay="0.2s">
            <div class="text-center margin"><img src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/></div>
            <h2 class="text-center margin-b"><?= __d('system', 'Amet lobortis tortor vehicula') ?></h2>
            <p class="lead text-justify"><?= __d('system', 'Quisque fermentum eleifend dolor, et sodales ante porta non. Cras sodales risus arcu, sit amet lobortis tortor vehicula id.') ?></p>
            <p class="text-center"><a class="btn btn-primary" href="#!" role="button"><span class="mdi mdi-plus-circle-outline"></span> <?= __('View details') ?></a></p>
         </div>
         <div class="col-sm-4 margin-big-b wow fadeInUp" data-wow-delay="0.4s">
            <div class="text-center margin"><img src="<?= theme_url('images/nova.png', 'Ntheme') ?>" alt="-"/></div>
            <h2 class="text-center margin-b"><?= __d('system', 'Suspendisse quis mi libero') ?></h2>
            <p class="lead text-justify "><?= __d('system', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes.') ?></p>
            <p class="text-center"><a class="btn btn-primary" href="#!" role="button"><span class="mdi mdi-plus-circle-outline"></span> <?= __('View details') ?></a></p>
         </div>
      </div>
   </div>
</div>
<div class="contact margin-big dp-1 r">
   <div id="contact" class="anchor"></div>
   <div class="container">
      <h1 class="max text-center"><?= __d('system', 'Contact') ?></h1>
      <div class="row">
         <div class="col-sm-4 hide-s text-center">
            <span class="mdi mdi-email-variant max"></span>
         </div>
         <div class="col-sm-8 margin-big-b">
            <form action="<?= site_url("contact") ?>" method="post">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
               <div class="form-group">
                  <input class="form-control" id="name" type="text" name="name" placeholder="<?= __('Name') ?>" value="<?= Input::old('name') ?>" />
               </div>
               <div class="form-group">
                  <input class="form-control" id="email" type="text" name="email" placeholder="<?= __('E-mail') ?>" value="<?= Input::old('email') ?>" />
               </div>
               <div class="form-group">
                  <textarea class="form-control" id="message" name="message" placeholder="<?= __('Message') ?>" rows="3"><?= Input::old('message') ?></textarea>
               </div>
               <?php if (Config::get('reCaptcha.active') === true) : ?>
                  <div class="form-group margin-t oh clearfix">
                     <div id="captcha"></div>
                  </div>
               <?php endif ?>
               <div class="form-group margin">
                  <button type="submit" class="btn btn-lg btn-primary" name="submit"><span class="mdi mdi-send"></span> <?= __('Send') ?></button>
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