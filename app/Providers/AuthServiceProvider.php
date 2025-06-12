<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Note;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Add model-to-policy mappings here if you're using policies
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-note', function ($user, Note $note) {
            return $user->id === $note->user_id;
        });

        Gate::define('delete-note', function ($user, Note $note) {
            return $user->id === $note->user_id;
        });
    }
}