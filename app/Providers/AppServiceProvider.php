<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Since configureRootUrl does not exist on the UrlGenerator instance,
        // use forcedRoot converts to enforce the subdirectory prefix on generated URLs
        URL::forceRootUrl(config('app.url'));
    }
}