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
            <form class="form-horizontal margin" action="<?= site_url("pages") ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="type"><?= __d('pages', 'Page Type') ?></label>
                  <div class="col-sm-9">
                     <select name="type" id="type" class="form-control">
                        <option value=""<?= Bs::s('', Input::old("type")) ?>><?= __('- Any -') ?></option>
                        <?php foreach (Config::get('pages::types') as $key => $row): ?>
                           <option value="<?= $key ?>"<?= Bs::s($key, Input::old("type")) ?>><?= __d('pages', $row['single']) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="title"><?= __d('pages', 'Page Title') ?></label>
                  <div class="col-sm-9">
                     <input class="form-control" id="title" type="text" name="title" value="<?= Input::old('title') ?>" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="content"><?= __('Content') ?></label>
                  <div class="col-sm-9">
                     <textarea class="form-control editor" id="content" name="content" rows="2"><?= Input::old('content') ?></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="image"><?= __('Image') ?></label>
                  <div class="col-sm-9">
                     <input class="form-control" id="image" type="file" name="image" value="" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="language"><?= __('Language') ?></label>
                  <div class="col-sm-9">
                     <select name="language" id="language" class="form-control">
                        <option value=""<?= Bs::s('', Input::old("language")) ?>><?= __('- Any -') ?></option>
                        <?php foreach (Config::get('languages') as $code => $info): ?>
                           <option value="<?= $code ?>"<?= Bs::s($code, Input::old("language")) ?>><?= $info ['name'] ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="visible"><?= __('Visible') ?></label>
                  <div class="col-sm-9">
                     <select name="visible" id="visible" class="form-control">
                         <?php foreach (["Yes", "No"] as $row): ?>
                           <option value="<?= $row ?>"<?= Bs::s($row, Input::old("visible")) ?>><?= __d('pages', $row) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="front"><?= __d('pages', 'Front page') ?></label>
                  <div class="col-sm-9">
                     <select name="front" id="front" class="form-control">
                         <?php foreach (["Yes", "No"] as $row): ?>
                           <option value="<?= $row ?>"<?= Bs::s($row, Input::old("front")) ?>><?= __d('pages', $row) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="published_date"><?= __('Published Date') ?></label>
                  <div class="col-sm-9">
                     <input class="form-control" id="published_date" type="text" name="published_date" value="<?= Input::old('published_date', date('Y-m-d H:i:s')) ?> " />
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-3 control-label" for="advanced"></label>
                  <div class="col-sm-9">
                     <a data-toggle="collapse" data-target="#advanced" class="btn btn-info"><?= __d('pages', 'Advanced page fields') ?></a>
                  </div>
               </div>
               <div id="advanced" class="collapse">
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="head_title"><?= __('Page Head Title') ?></label>
                     <div class="col-sm-9">
                        <input class="form-control" id="head_title" type="text" name="head_title" value="<?= Input::old('head_title') ?>" />
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="head_description"><?= __('Page Head Description') ?></label>
                     <div class="col-sm-9">
                        <textarea class="form-control editor" id="head_description" name="head_description" rows="2"><?= Input::old('head_description') ?></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="head_image"><?= __('Page Head Image') ?></label>
                     <div class="col-sm-9">
                        <input class="form-control" id="head_image" type="file" name="head_image" value="" />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-9 col-sm-push-3  margin-t">
                     <button type="submit" class="btn btn-primary" name="submit"><span class="mdi mdi-check"></span> <?= __('Submit') ?></button>
                     <a class="btn" href="<?= site_url("pages") ?>"><span class="mdi mdi-keyboard-backspace"></span> <?= __('Back') ?> </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
