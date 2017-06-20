<div class="title">
   <div class="container">
      <h1><span class="<?= Config::get('users::config.iconMultiple') ?>"></span> <?= $title ?></h1>
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
            <form class="form-inline form-filter margin-t" action="<?= site_url("users") ?>" method="get">
               <div class="form-group">
                  <label for="username"><?= __('Username') ?></label><br>
                  <div class="dp-1 iw">
                     <input type="text" class="form-control<?= Bs::e(Input::get("username")) ?>" id="username" name="username" placeholder="<?= __('Search') ?>" value="<?= Input::get('username') ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="role_id"><?= __d('users', 'Role') ?></label><br>
                  <div class="dp-1 iw">
                     <select name="role_id" id="role_id" class="form-control<?= Bs::e(Input::get("role_id")) ?>">
                        <option value=""<?= Bs::s('', Input::old('role')) ?>><?= __('- Any -') ?></option>
                        <?php foreach ($roles as $role): ?>
                           <option value="<?= $role->id ?>"<?= Bs::s($role->id, Input::old('role')) ?>><?= __d('users', $role->name) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="activated"><?= __('Active') ?></label><br>
                  <div class="dp-1 iw">
                     <select name="activated" id="activated" class="form-control<?= Bs::e(Input::get("activated")) ?>">
                        <option value=""<?= Bs::s('', Input::old("activated")) ?>><?= __('- Any -') ?></option>
                        <?php foreach (['1' => "Yes", '0' => "No"] as $key => $row): ?>
                           <option value="<?= $key ?>"<?= Bs::s($key, Input::old("activated")) ?>><?= __($row) ?></option>
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="hide-s">&nbsp;</label><br class="hide-s">
                  <button type="submit" class="btn btn-primary"><span class="mdi mdi-filter"></span><?= __('Filter') ?></button>
                  <?php if ($reset) : ?>
                     <a href="<?= site_url("users") ?>" class="btn btn-primary"><span class="mdi mdi-filter-remove"></span><?= __('Reset') ?></a>
                  <?php endif ?>
               </div>
            </form>
            <?php if (!$users->isEmpty()) : ?>
               <div class="table-responsive padding">
                  <table class="table table-striped table-hover">
                     <tr class="bg-navy disabled">
                        <th>
                           <a href="<?= Sorting::link('id,asc') ?>">
                               <?= __('ID') ?><?= Sorting::icon('id') ?>
                           </a>
                        </th>
                        <th class="hide-s">
                           <a href="<?= Sorting::link('username,asc') ?>">
                               <?= __('Username') ?><?= Sorting::icon('username') ?>
                           </a>       
                        </th>
                        <th class="show-m">
                           <a href="<?= Sorting::link('role_id,asc') ?>">
                               <?= __('Role') ?><?= Sorting::icon('role_id') ?>
                           </a>
                        </th>

                        <th>
                           <a href="<?= Sorting::link('realname,asc') ?>">
                               <?= __('Name and Surname') ?><?= Sorting::icon('realname') ?>
                           </a>       
                        </th>

                        <th class="hide-s">
                           <a href="<?= Sorting::link('email,asc') ?>">
                               <?= __('E-mail') ?><?= Sorting::icon('email') ?>
                           </a>       
                        </th>
                        <th class="th-updated">
                           <a href="<?= Sorting::link('created_at,desc', 'created_at,desc') ?>">
                               <?= __('Created At') ?><?= Sorting::icon('created_at', 'created_at,desc') ?>
                           </a>
                        </th>
                        <th><?= __('Actions') ?></th>
                     </tr>
                     <?php foreach ($users->getItems() as $row): ?>   
                        <tr>
                           <td><?= $row->id ?></td>
                           <td class="hide-s"><?= $row->username ?></td>
                           <td class="show-m"><?= __($row->role->name) ?></td>
                           <td><?= $row->realname ?></td>
                           <td class="hide-s"><?= $row->email ?></td>
                           <td><?= $row->created_at->formatLocalized('%d/%m/%y %R') ?></td>
                           <td>
                              <div class="btn-group controls dropdown-swap">
                                 <a href="<?= site_url('users/' . $row->id . '/edit') ?>" class="btn btn-sm btn-default"><span class="mdi mdi-pencil"></span> <?= __("Edit") ?></a>
                                 <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                 </button>
                                 <ul class="dropdown-menu">
                                    <li><a href="<?= site_url("user/" . $row->id) ?>" target="_blank"><span class="mdi mdi-link-variant"></span> <?= __("Open") ?></a></li>
                                    <li><a href="<?= site_url('users/' . $row->id) ?>"><span class="mdi mdi-eye"></span> <?= __("Show") ?></a></li>
                                    <li><a href="<?= site_url('users/' . $row->id . '/destroy') ?>" class="modal-delete"><span class="mdi mdi-delete"></span> <?= __("Delete") ?></a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </table>
               </div>
               <div class="text-center margin"><?= $users->links() ?></div>
            <?php else: ?>
               <div class="alert alert-warning margin">
                  <h4><span class="mdi mdi-alert"></span><?php print strftime("%d %b %Y, %R", time()) ?></h4>
                  <p><span class="mdi mdi-information"></span> <?= __('There are no registered Users.') ?></p>
               </div>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>
