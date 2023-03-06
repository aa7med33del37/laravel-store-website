<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();
        $websiteSittings = Setting::first();
        $categories = Category::where('status', '1')->latest()->get();
        View::share([
            'appSetting' => $websiteSittings,
            'categories' => $categories,
        ]);
    }
}
