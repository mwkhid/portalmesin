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
            return $user->hasRoles('Mahasiswa');
        });

        Gate::define('koordinatorkp', function($user){
            return $user->hasRoles('Koordinator KP');
        });

        Gate::define('koordinatorta', function($user){
            // return $user->hasAnyRoles(['Kaprodi','Koordinator TA']);
            return $user->hasRoles('Koordinator TA');
        });

        Gate::define('koordinatorkonversi', function($user){
            return $user->hasRoles('Koordinator KEN');
        });

        Gate::define('dosen', function($user){
            return $user->hasRoles('Dosen');
        });

        Gate::define('koordinatorkonstruksi', function($user){
            return $user->hasRoles('Koordinator KPE');
        });

        Gate::define('koordinatormanufaktur', function($user){
            return $user->hasRoles('Koordinator MAN');
        });

        Gate::define('koordinatormaterial', function($user){
            return $user->hasRoles('Koordinator MAT');
        });

        Gate::define('operatorta', function($user){
            return $user->hasRoles('Operator TA');
        });

        Gate::define('kaprodi', function($user){
            return $user->hasRoles('Kaprodi');
        });

        Gate::define('kalab', function($user){
            return $user->hasAnyRoles(['Kalab GPM','Laboran GPM','Kalab PK','Kalab MF','Laboran MF',
            'Kalab MBO','Laboran MBO','Kalab PPT','Laboran PPT','Kalab PP','Laboran PP','Kalab OR',
            'Laboran OR','Kalab MT','Laboran MT','Kalab TPP','Kalab NB','Kalab ES','Laboran ES']);
        });

        Gate::define('kalabgetaran', function($user){
            return $user->hasRoles('Kalab GPM');
        });

        Gate::define('laborangetaran', function($user){
            return $user->hasRoles('Laboran GPM');
        });

        Gate::define('kalabperancangan', function($user){
            return $user->hasRoles('Kalab PK');
        });

        Gate::define('kalabmekanika', function($user){
            return $user->hasRoles('Kalab MF');
        });

        Gate::define('laboranmekanika', function($user){
            return $user->hasRoles('Laboran MF');
        });

        Gate::define('kalabmotor', function($user){
            return $user->hasRoles('Kalab MBO');
        });

        Gate::define('laboranmotor', function($user){
            return $user->hasRoles('Laboran MBO');
        });

        Gate::define('kalabpanas', function($user){
            return $user->hasRoles('Kalab PPT');
        });

        Gate::define('laboranpanas', function($user){
            return $user->hasRoles('Laboran PPT');
        });

        Gate::define('kalabproduksi', function($user){
            return $user->hasRoles('Kalab PP');
        });

        Gate::define('laboranproduksi', function($user){
            return $user->hasRoles('Laboran PP');
        });

        Gate::define('kalabotomasi', function($user){
            return $user->hasRoles('Kalab OR');
        });

        Gate::define('laboranotomasi', function($user){
            return $user->hasRoles('Laboran OR');
        });

        Gate::define('kalabmaterial', function($user){
            return $user->hasRoles('Kalab MT');
        });

        Gate::define('laboranmaterial', function($user){
            return $user->hasRoles('Laboran MT');
        });

        Gate::define('kalabpengecoran', function($user){
            return $user->hasRoles('Kalab TPP');
        });

        Gate::define('kalabnano', function($user){
            return $user->hasRoles('Kalab NB');
        });

        Gate::define('kalabenergi', function($user){
            return $user->hasRoles('Kalab ES');
        });

        Gate::define('laboranenergi', function($user){
            return $user->hasRoles('Laboran ES');
        });
    }
}
