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


        // check if user can edit and delete posts
        Gate::define('edit-dude', function ($user, $dude)
        {
            return $user->id == $dude->user_id;
        });

        // check if user can edit and delete comments
        Gate::define('edit-comment', function ($user, $comment)
        {
            return $user->id == $comment->user_id;
        });
    }
}