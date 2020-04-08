<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasRoles('Admin');
        });

        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['Admin','Koordinator TA']);
        });

        Gate::define('delete-users', function($user){
            return $user->hasRoles('Admin');
        });

        Gate::define('mahasiswa', function($user){
            return $user->hasRoles('User');
        });

        Gate::define('koordinatorkp', function($user){
            return $user->hasRoles('Koordinator KP');
        });

        Gate::define('koordinatorta', function($user){
            return $user->hasRoles('Koordinator TA');
        });

        Gate::define('koordinatorsel', function($user){
            return $user->hasRoles('Koordinator SEL');
        });

        Gate::define('dosen', function($user){
            return $user->hasRoles('Dosen');
        });

        Gate::define('koordinatorsm', function($user){
            return $user->hasRoles('Koordinator SM');
        });

        Gate::define('koordinatorict', function($user){
            return $user->hasRoles('Koordinator ICT');
        });

        Gate::define('operatorta', function($user){
            return $user->hasRoles('Operator TA');
        });
    }
}
