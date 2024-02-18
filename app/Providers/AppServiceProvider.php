<?php

namespace App\Providers;

use App\Models\Classes;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Providers\NavComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.sidebar', NavComposer::class);
    }
}
