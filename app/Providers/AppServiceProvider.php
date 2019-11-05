<?php

namespace App\Providers;

use App\Services\CurrentUser;
use App\Services\NumberUser;
use App\Services\TestFacade;
use Illuminate\Support\Facades\Schema;
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->singleton(NumberUser::class,function($app){
            return new CurrentUser('hello boys');
        });
        $this->app->bind('TestFacade',function ($app){
            return new TestFacade();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
