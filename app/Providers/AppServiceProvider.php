<?php

namespace App\Providers;

use App\Data;
use App\Content;
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
        
        $array = [
            'data' => Data::first(), 
            'address' => Content::where('section_id', 8)->orderBy('order', 'ASC')->get()
        ];
        
        View::share($array);    
        
    }
}
