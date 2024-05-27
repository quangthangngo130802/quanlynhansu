<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('hasRole', function ($role) {
            $admin = Auth::guard('admin')->user();
            $adminId = Admin::where('id', $admin->id)->first();
            if ($admin && $adminId->hasRole($role)) {
                return true;
            }
            return false;
        });
    }
}
