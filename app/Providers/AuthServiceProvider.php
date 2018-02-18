<?php

namespace App\Providers;

use App\ForumUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('allow-post-thread-in-forum', function ($user, $forumId) {

            return ForumUser::where(['user_id' => $user->id, 'forum_id' => $forumId])->get()->isNotEmpty();
        });
    }
}
