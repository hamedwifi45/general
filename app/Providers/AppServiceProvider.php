<?php

namespace App\Providers;

use App\Http\ViewComposer\CategoryComposer ;
use App\Http\ViewComposer\CommentComposer;
use App\Http\ViewComposer\PageComposer;
use App\Http\ViewComposer\RolesComposer;
use App\Models\Permisstion;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        View::composer('partiaks.navbar' , PageComposer::class);

        Blade::if('admin' , function(){
            return auth()->check() && auth()->user()->isAdmin();
        });

        // Gate::define('delete-post' , function($user , $post){
        //     return $user->hasAllow('delete-post')&& ($user->id == $post->user->id || $user->isAdmin());
        // });
        // Gate::define('edit-post' , function($user , $post){
        //     return $user->hasAllow('edit-post')&& ($user->id == $post->user->id || $user->isAdmin());
        // });
        // Permission::get(['name'])->map(function($per) {
        //     Gate::define($per->name, function($user, $post) use ($per) {
        //         return $user->hasAllow($per->name) && ($user->id == $post->user_id || $user->isAdmin());
        //      });
        // });

        Permisstion::whereIn('name', ['edit-post', 'delete-post', 'add-post'])->get()->map(function($per) {
            Gate::define($per->name, function($user, $post) use ($per) {
                return $user->hasAllow($per->name) || ($user->id == $post->user_id || $user->isAdmin());
             });
        });

        Permisstion::whereIn('name', ['edit-user', 'delete-user', 'add-user'])->get()->map(function($per) {
            Gate::define($per->name, function($user) use ($per) {
                return $user->hasAllow($per->name) || $user->isAdmin();
             });
        });
    }

}
