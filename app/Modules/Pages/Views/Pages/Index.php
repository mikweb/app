<div class="title">
   <div class="container">
      <h1><span class="<?= Config::get('pages::config.iconMultiple') ?>"></span> <?= $title ?></h1>
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
            <form class="form-inline form-filter margin-t" action="<?= site_url("pages") ?>" method="get">
               <div class="form-group">
                  <label for="title"><?= __('Title') ?></label><br>
                  <div class="dp-1 iw">
                     <input type="text" class="form-control<?= Bs::e(Input::get("title")) ?>" id="title" name="title" placeholder="<?= __('Search') ?>" value="<?= Input::get('title') ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="type"><?= __('Type') ?></label><br>
                  <div class="dp-1 iw">
                     <select name="type" id="type" class="form-control<?= Bs::e(Input::get("type")) ?>">
                        <option value=""<?= Bs::s('', Input::get("type")) ?>><?= __('- Any -') ?></option>
                        <?php foreach (Config::get('pages::types') as $key => $row): ?>
                           <option value="<?= $key ?>"<?= Bs::s($key, Input::get("type")) ?>><?= __d('pages', $row['single']) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="visible"><?= __('Published') ?></label><br>
                  <div class="dp-1 iw">
                     <select name="visible" id="visible" class="form-control<?= Bs::e(Input::get("visible")) ?>">
                        <option value=""<?= Bs::s('', Input::get("visible")) ?>><?= __('- Any -') ?></option>
                        <?php foreach (["Yes", "No"] as $row): ?>
                           <option value="<?= $row ?>"<?= Bs::s($row, Input::get("visible")) ?>><?= __d('pages', $row) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="language"><?= __('Language') ?></label><br>
                  <div class="dp-1 iw">
                     <select name="language" id="language" class="form-control<?= Bs::e(Input::get("language")) ?>">
                        <option value=""<?= Bs::s('', Input::get("language")) ?>><?= __d('pages', '- Any -') ?></option>
                        <?php foreach (Config::get('languages') as $code => $info): ?>
                           <option value="<?= $code ?>"<?= Bs::s($code, Input::get("language")) ?>><?= $info ['name'] ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="hide-s">&nbsp;</label><br class="hide-s">
                  <button type="submit" class="btn btn-primary"><span class="mdi mdi-filter"></span> <?= __('Filter') ?></button>
                  <?php if ($reset) : ?>
                     <a href="<?= site_url("pages") ?>" class="btn btn-primary"><span class="mdi mdi-filter-remove"></span> <?= __('Reset') ?></a>
                  <?php endif ?>
               </div>
            </form>
            <?php if (!$pages->isEmpty()) : ?>
               <div class="table-responsive padding">
                  <table class="table table-striped table-hover">
                     <tr class="bg-navy disabled">
                        <th>
                           <a href="<?= Sorting::link('title,asc') ?>">
                               <?= __('Title') ?><?= Sorting::icon('title') ?>
                           </a>
                        </th>
                        <th class="hide-s">
                           <a href="<?= Sorting::link('type,asc') ?>">
                               <?= __('Type') ?><?= Sorting::icon('type') ?>
                           </a>       
                        </th>
                        <th class="show-m">
                           <a href="<?= Sorting::link('user_id,asc') ?>">
                               <?= __('Author') ?><?= Sorting::icon('user_id') ?>
                           </a>
                        </th>
                        <th class="show-m">
                           <a href="<?= Sorting::link('visible,asc') ?>">
                               <?= __('Visible') ?><?= Sorting::icon('visible') ?>
                           </a>
                        </th>
                        <th class="th-updated">
                           <a href="<?= Sorting::link('updated_at,desc') ?>">
                               <?= __('Updated') ?><?= Sorting::icon('updated_at') ?>
                           </a>

                        </th>
                        <th><?= __('Actions') ?></th>
                     </tr>
                     <?php foreach ($pages->getItems() as $row): ?>   
                        <tr>
                           <td><a href="<?= site_url("page/" . $row->slug) ?>" title="<?= __("Open") ?>" target="_blank"><?= __d('pages', $row->title) ?></a></td>
                           <td class="hide-s"><?= __($row->type) ?></td>
                           <td class="show-m"><a href="#!"><?= $row->user->username ?></a></td>
                           <td class="show-m"><?= __($row->visible) ?></td>
                           <td><?= $row->updated_at->formatLocalized('%d/%m/%y %R') ?></td>
                           <td>
                              <div class="btn-group controls dropdown-swap">
                                 <a href="<?= site_url('pages/' . $row->id . '/edit') ?>" class="btn btn-sm btn-default"><span class="mdi mdi-pencil"></span> <?= __("Edit") ?></a>
                                 <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                 </button>
                                 <ul class="dropdown-menu">
                                    <li><a href="<?= site_url("page/" . $row->slug) ?>" target="_blank"><span class="mdi mdi-link-variant"></span> <?= __("Open") ?></a></li>
                                    <li><a href="<?= site_url('pages/' . $row->id) ?>"><span class="mdi mdi-eye"></span> <?= __("Show") ?></a></li>
                                    <li><a href="<?= site_url('pages/' . $row->id . '/destroy') ?>" class="modal-delete"><span class="mdi mdi-delete"></span> <?= __("Delete") ?></a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </table>
               </div>
               <div class="text-center margin"><?= $pages->links() ?></div>
            <?php else: ?>
               <div class="alert alert-warning margin">
                  <h4><span class="mdi mdi-alert"></span><?php print strftime("%d %b %Y, %R", time()) ?></h4>
                  <p class="margin"><span class="mdi mdi-information"></span> <?= __d('pages', 'There are no Pages') ?>.</p>
               </div>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>