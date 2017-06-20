<div class="container main-content">
   <div class="row">
      <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 margin-big">
          <?= Session::getMessages() ?>
         <div class="bloc m dp-2">
            <h3 class="text-center">
               <span class="mdi mdi-24px mdi-responsive text-primary"></span> <?= __d('system', 'Registration Status') ?>
            </h3>
            <div class="space-v"></div>
            <?= Session::getMessages() ?>
         </div>
      </div>
   </div>
</div>
