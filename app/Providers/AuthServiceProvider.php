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

        Gate::resource('posts', 'App\Policies\PostPolicy');
        Gate::define('posts.publish', 'App\Policies\PostPolicy@publish');
        Gate::define('posts.tag', 'App\Policies\PostPolicy@tag');
        Gate::define('posts.category', 'App\Policies\PostPolicy@category');

        Gate::resource('users', 'App\Policies\AdminUserPolicy');
        Gate::define('users.role', 'App\Policies\AdminUserPolicy@role');
        Gate::define('users.permission', 'App\Policies\AdminUserPolicy@permission');
    }
}
