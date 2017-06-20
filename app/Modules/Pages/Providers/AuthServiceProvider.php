<?php

namespace App\Modules\Pages\Providers;

use Nova\Auth\Access\GateInterface as Gate;
use Nova\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

   /**
    * The policy mappings for the application.
    *
    * @var array
    */
   protected $policies = array(
      'App\Modules\Pages\Models\SomeModel' => 'App\Modules\Pages\Policies\ModelPolicy',
   );

   /**
    * Register any application authentication / authorization services.
    *
    * @param  Nova\Auth\Access\GateInterface  $gate
    * @return void
    */
   public function boot(Gate $gate) {
      $this->registerPolicies($gate);

      //
   }

}
