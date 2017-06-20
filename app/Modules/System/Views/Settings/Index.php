<div class="title">
   <div class="container">
      <h1><span class="<?= Config::get('system::config.iconMultiple') ?>"></span> <?= $title ?></h1>
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
             <?php if (CONFIG_STORE == 'database'): ?>
               <form name='myForm' class="form-horizontal margin" action="<?= site_url('settings') ?>" method="post">
                  <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>" />
                  <h3><?= __d('system', 'Site Settings') ?></h3>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="sitename"><?= __d('system', 'Site Name') ?></label>
                     <div class="col-sm-9">
                        <input name="siteName" id="siteName" type="text" class="form-control" value="<?= $options['siteName'] ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="site_skin"><?= __d('system', 'Backend Skin') ?></label>
                     <div class="col-sm-9">
                        <select name="siteSkin" id="siteSkin" class="form-control clearfix">
                           <option value="blue"<?= Bs::s($options['siteSkin'], "blue") ?>><?= __d('system', 'Blue') ?></option>
                           <option value="blue-light"<?= Bs::s($options['siteSkin'], "blue-light") ?>><?= __d('system', 'Blue Light') ?></option>
                           <option value="black"<?= Bs::s($options['siteSkin'], "black") ?>><?= __d('system', 'Black') ?></option>
                           <option value="black-light"<?= Bs::s($options['siteSkin'], "black-light") ?>><?= __d('system', 'Black Light') ?></option>
                           <option value="purple"<?= Bs::s($options['siteSkin'], "purple") ?>><?= __d('system', 'Purple') ?></option>
                           <option value="purple-light"<?= Bs::s($options['siteSkin'], "purple-light") ?>><?= __d('system', 'Purple Light') ?></option>
                           <option value="yellow"<?= Bs::s($options['siteSkin'], "yellow") ?>><?= __d('system', 'Yellow') ?></option>
                           <option value="yellow-light"<?= Bs::s($options['siteSkin'], "yellow-light") ?>><?= __d('system', 'Yellow Light') ?></option>
                           <option value="red"<?= Bs::s($options['siteSkin'], "red") ?>><?= __d('system', 'Red') ?></option>
                           <option value="red-light"<?= Bs::s($options['siteSkin'], "red-light") ?>><?= __d('system', 'Red Light') ?></option>
                           <option value="green"<?= Bs::s($options['siteSkin'], "green") ?>><?= __d('system', 'Green') ?></option>
                           <option value="green-light"<?= Bs::s($options['siteSkin'], "green-light") ?>><?= __d('system', 'Green Light') ?></option>
                        </select>
                        <small><?= __d('system', 'The Skin used by the Site\'s Template.') ?></small>
                     </div>
                  </div>
                  <hr>
                  <h3><?= __d('system', 'Mailer Settings') ?></h3>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailDriver"><?= __d('system', 'Mail Driver') ?></label>
                     <div class="col-sm-9">
                        <select name="mailDriver" id="mailDriver" class="form-control clearfix">
                           <option value="smtp"<?= Bs::s($options['mailDriver'], "green") ?>><?= __d('system', 'SMTP') ?></option>
                           <option value="mail"<?= Bs::s($options['mailDriver'], "mail") ?>><?= __d('system', 'Mail') ?></option>
                           <option value="sendmail"<?= Bs::s($options['mailDriver'], "sendmail") ?>><?= __d('system', 'Sendmail') ?></option>
                        </select>
                        <small><?= __d('system', 'Whether or not is used a external SMTP Server to send the E-mails.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailFromAddress"><?= __d('system', 'E-mail From Address') ?></label>
                     <div class="col-sm-9">
                        <input name="mailFromAddress" id="mailFromAddress" type="text" class="form-control clearfix" value="<?= $options['mailFromAddress'] ?>">
                        <small><?= __d('system', 'The outgoing E-mail address.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailFromName"><?= __d('system', 'E-mail From Name') ?></label>
                     <div class="col-sm-9">
                        <input name="mailFromName" id="mailFromName" type="text" class="form-control clearfix" value="<?= $options['mailFromName'] ?>">
                        <small><?= __d('system', 'The From Field of any outgoing e-mails.') ?></small>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailHost"><?= __d('system', 'Server Name') ?></label>
                     <div class="col-sm-9">
                        <input name="mailHost" id="mailHost" type="text" class="form-control clearfix" value="<?= $options['mailHost'] ?>">
                        <small><?= __d('system', 'The name of the external SMTP Server.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailPort"><?= __d('system', 'Server Port') ?></label>
                     <div class="col-sm-9">
                        <input name="mailPort" id="mailPort" type="text" class="form-control clearfix" value="<?= $options['mailPort'] ?>">
                        <small><?= __d('system', 'The Port used for connecting to the external SMTP Server.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailEncryption"><?= __d('system', 'Use the Cryptography') ?></label>
                     <div class="col-sm-9">
                        <select name="mailEncryption" id="mailEncryption" class="form-control clearfix">
                           <option value="ssl"<?= Bs::s($options['mailEncryption'], "ssl") ?>>SSL</option>
                           <option value="tls"<?= Bs::s($options['mailEncryption'], "tls") ?>>TLS</option>
                           <option value=""<?= Bs::s($options['mailEncryption'], "") ?>><?= __d('system', 'NONE') ?></option>
                        </select>
                        <small><?= __d('system', 'Whether or not is used the Cryptography for connecting to the external SMTP Server.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailUsername"><?= __d('system', 'Server Username') ?></label>
                     <div class="col-sm-9">
                        <input name="mailUsername" id="mailUsername" type="text" class="form-control clearfix" value="<?= $options['mailUsername'] ?>">
                        <small><?= __d('system', 'The Username used to connect to the external SMTP Server.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label" for="mailPassword"><?= __d('system', 'Server Password') ?></label>
                     <div class="col-sm-9">
                        <input name="mailPassword" id="mailPassword" type="password" class="form-control clearfix" value="<?= $options['mailPassword'] ?>">
                        <small><?= __d('system', 'The Password used to connect to the external SMTP Server.') ?></small>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-9 col-sm-push-3 margin-t">
                        <input class="btn btn-success col-sm-3 pull-right" type="submit" id="submit" name="submit" value="<?= __d('system', 'Apply the changes') ?>" />&nbsp;
                     </div>
                  </div>
               </form>
            <?php else: ?>
               <div class="alert alert-warning margin">
                  <span class="mdi mdi-information"></span> <?= __d('system', 'The Settings are not available while the Config Store is on Files Mode.') ?>
               </div>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>

