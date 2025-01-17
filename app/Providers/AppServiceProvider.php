<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
         //  Share data with the 'admin.header' view
    View::composer('admin.header', function ($view) {
        $user = Auth::user();
        $view->with('user', $user);
    });

    // Share data with the 'student.header' view
    View::composer('user.header', function ($view) {
        $user = Auth::user();
        $view->with('user', $user); // Share the user object with the view
    });
    }
}
