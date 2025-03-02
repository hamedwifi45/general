<?php

namespace App\Providers;

use App\Http\ViewComposer\CategoryComposer ;
use App\Http\ViewComposer\CommentComposer;
use App\Http\ViewComposer\RolesComposer;
use Illuminate\Support\Facades\View;
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
        View::composer(['partiaks.sidebar','lists.categories'] , CategoryComposer::class);
        View::composer('partiaks.sidebar' , CommentComposer::class);
        View::composer('lists.roles' , RolesComposer::class);
    }
}
