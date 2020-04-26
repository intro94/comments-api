<?php

namespace App\Providers;

use App\Contracts\Services\CommentServiceContract;
use App\Services\CommentService;
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
        // load helpers
        require_once $this->app->path('Helpers'.DIRECTORY_SEPARATOR.'System.php');

        // load services
        $this->app->singleton(CommentServiceContract::class, function () {
            return new CommentService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
