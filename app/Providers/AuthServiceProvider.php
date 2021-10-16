<?php

namespace App\Providers;

use App\Models\Admin;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function (Admin $admin){
            return $admin->role === 'admin';
        });

        Gate::define('isEditor', function (Admin $admin){
            return $admin->role === 'editor';
        });

        Gate::define('isModerator', function (Admin $admin){
            return $admin->role === 'moderator';
        });
    }
}
