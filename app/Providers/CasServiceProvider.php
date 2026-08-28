<?php

namespace App\Providers;

use App\Guards\CasGuard;
use App\Services\CasService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class CasServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CasService::class);

        Auth::extend('cas', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider'] ?? 'cas');
            return new CasGuard($provider, $app);
        });
    }

    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/cas.php', 'cas');
    }
}
