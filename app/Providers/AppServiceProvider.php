<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('userHasAccess', function ($expression) {
            return "<?php if(app()->make('accessHelper')->userHasAccess($expression)): ?>";
        });
        Blade::directive('endUserHasAccess', function () {
            return "<?php endif; ?>";
        });

        Blade::if('userHasAccess', function ($fitur, $privilege) {
            return userHasAccess($fitur, $privilege);
        });
    }
}
