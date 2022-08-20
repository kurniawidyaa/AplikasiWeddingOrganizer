<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


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
        //paginate untuk bootstrap
        Paginator::useBootstrap();

        // number format
        Blade::directive('currency', function ($expression) {
            return "IDR. <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
