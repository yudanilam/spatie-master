<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Table_setting;


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
        Paginator::useBootstrapFive();
        
        view()->composer('*', function ($view) {
            if(Auth::check()){
                view()->share([
                    'userGlobal'=> User::find(Auth::user()->id),
                    'identitas' => Table_setting::find('1'),
                    'footer'=>"E-Kantor Production",
                    'version'=>'1.0'
                ]);
            }else{
                $view->with('userGlobal', null);
            }
            
        });

    }
}
