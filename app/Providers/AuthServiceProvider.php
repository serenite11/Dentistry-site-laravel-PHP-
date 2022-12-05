<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * 
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     *
     */
    public function boot()
    {
        $this->registerPolicies();

        \Illuminate\Support\Facades\Auth::provider('pdo',function($app,$config){
            return $app->make(\App\Providers\PDOUserProvider::class);
        });
        //
    }
}
