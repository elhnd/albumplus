<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
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
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->admin;
        });

        if (request ()->server ("SCRIPT_NAME") !== 'artisan') {
            view ()->share ('categories', resolve(CategoryRepository::class)->getAll());
        }
    
    }
}
