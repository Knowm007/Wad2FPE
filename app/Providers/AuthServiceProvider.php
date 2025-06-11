<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Note;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Models\Note => App\Policies\NotesPolicy,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-note', function (User $user, Note $note) {
            return $user->id === $note->user_id;
        });


        Gate::define('delete-note', function (User $user, Note $note) {
            return $user->id === $note->user_id;
        });

        
    }
    
}
