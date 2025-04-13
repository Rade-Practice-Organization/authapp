<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class RateLimiterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by(
                Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip())
            );
        });

        RateLimiter::for('register', function (Request $request) {
            return Limit::perMinute(15)->by($request->ip());
        });

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(
                app()->isProduction() ? 120 : 1000
            )->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('public-api', function (Request $request) {
            return Limit::perMinute(100)->by($request->ip());
        });
    }
}
