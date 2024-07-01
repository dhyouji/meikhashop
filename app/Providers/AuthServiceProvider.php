<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('Manager', function ($user) {
            if ($user->type == '2') {
                return true;
            }
            return false;
        });

        Gate::define('Admin', function ($user) {
            if ($user->type == '1') {
                return true;
            }
            return false;
        });

        Gate::define('User', function ($user) {
            if ($user->type == '0') {
                return true;
            }
            return false;
        });
    }
}