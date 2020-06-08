<?php

namespace App\Providers;

use DB;
use Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        DB::statement("SET lc_time_names = 'es_ES'");
        
        Gate::define('actionsAdmin', function($user)
        {
            return $user->role === 'admin';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ( app()->environment('production') )
        {
            include base_path('demo.php');
        }
    }
}
