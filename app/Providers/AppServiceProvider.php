<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
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
        
         // Assurez-vous que `$count` est disponible dans toutes les vues
        View::composer('*', function ($view) {
            $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
            $view->with('count', $count);
        });
    }
}
