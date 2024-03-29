<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Paginator::useBootstrap();
    }
}
