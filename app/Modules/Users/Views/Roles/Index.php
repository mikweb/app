<div class="title">
   <div class="container">
      <h1><span class="<?= Config::get('users::roles.iconMultiple') ?>"></span> <?= $title ?></h1>
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
             <?php if (!$roles->isEmpty()) : ?>
               <div class="table-responsive padding">
                  <table class="table table-striped table-hover">
                     <tr class="bg-navy disabled">
                        <th><?= __('ID') ?></th>
                        <th><?= __('Name') ?></th>
                        <th><?= __('Slug') ?></th>
                        <th><?= __('Description') ?></th>
                        <th><?= __('Users') ?></th>
                        <th><?= __('Actions') ?></th>
                     </tr>
                     <?php foreach ($roles as $row): ?>
                        <tr>
                           <td><?= $row->id ?></td>
                           <td><?= __($row->name) ?></td>
                           <td><?= $row->slug ?></td>
                           <td><?= $row->description ?></td>
                           <td><?= $row->users->count() ?></td>
                           <td>
                              <div class="btn-group controls dropdown-swap">
                                 <a href="<?= site_url('roles/' . $row->id . '/edit') ?>" class="btn btn-sm btn-default"><span class="mdi mdi-pencil"></span> <?= __("Edit") ?></a>
                                 <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                 </button>
                                 <ul class="dropdown-menu">
                                    <li><a href="<?= site_url('roles/' . $row->id) ?>"><span class="mdi mdi-eye"></span> <?= __("Show") ?></a></li>
                                    <li><a href="<?= site_url('roles/' . $row->id . '/destroy') ?>" class="modal-delete"><span class="mdi mdi-delete"></span> <?= __("Delete") ?></a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </table>
               </div>
               <div class="text-center margin"><?= $roles->links() ?></div>
            <?php else: ?>
               <div class="alert alert-warning margin">
                  <h4><span class="mdi mdi-alert"></span><?php print strftime("%d %b %Y, %R", time()) ?></h4>
                  <p><span class="mdi mdi-information"></span> <?= __d('users', 'There are no Roles.') ?></p>
               </div>
            <?php endif ?> 
         </div>
      </div>
   </div>
</div>



